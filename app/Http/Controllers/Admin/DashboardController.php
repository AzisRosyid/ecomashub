<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Models\Asset;
use App\Models\Entrust;
use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
use App\Models\Collaboration;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Waste;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $route = 'adminDashboard';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $route = $this->route;
        $acc = Auth::user();
        $storeId = session('store_id');

        $currentDate = Carbon::now()->format('Y-m-d');
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $month = $request->input('month', $currentMonth);

        if ($request->has('api')) {
            $profit = Transaction::when($storeId, function ($query) use ($storeId) {
                $query->where('store_id', $storeId);
            })->where('type', 'Untung')->where('status', 'Selesai')
                ->whereYear('date', $currentYear)
                ->selectRaw('MONTH(date) as month, SUM(value) as total')
                ->groupBy('month')
                ->get();

            $loss = Transaction::when($storeId, function ($query) use ($storeId) {
                $query->where('store_id', $storeId);
            })->where('type', 'Rugi')->where('status', 'Selesai')
                ->whereYear('date', $currentYear)
                ->selectRaw('MONTH(date) as month, SUM(value) as total')
                ->groupBy('month')
                ->get();

            $order = Order::when($storeId, function ($query) use ($storeId) {
                $query->where('store_id', $storeId);
            })->whereYear('date_start', $currentYear)
                ->selectRaw('MONTH(date_start) as month, COUNT(id) as total')
                ->groupBy('month')
                ->get();

            $event = Event::where('organization_id', User::find($acc->id)->organization()->id)->whereYear('date_start', $currentYear)
                ->whereMonth('date_start', $month)
                ->orWhereMonth('date_end', $month)
                ->orderBy('date_start')
                ->get();

            $netIncome = Transaction::when($storeId, function ($query) use ($storeId) {
                $query->where('store_id', $storeId);
            })->where('status', 'Selesai')
                ->selectRaw('SUM(CASE WHEN MONTH(date) = ? THEN CASE WHEN type = "Rugi" THEN -value ELSE value END ELSE 0 END) as current_month_total', [$month])
                ->selectRaw('SUM(CASE WHEN MONTH(date) = ? THEN CASE WHEN type = "Rugi" THEN -value ELSE value END ELSE 0 END) as previous_month_total', [$month - 1])
                ->whereYear('date', $currentYear)
                ->first();

            $percentageNetIncome = 0;
            if ($netIncome->previous_month_total > 0) {
                if ($netIncome->current_month_total >= $netIncome->previous_month_total) {
                    $percentageNetIncome = ($netIncome->current_month_total / $netIncome->previous_month_total) * 100;
                } else {
                    $percentageNetIncome = ($netIncome->previous_month_total / $netIncome->current_month_total) * 100;
                }
            }

            $moneyFlow = Transaction::when($storeId, function ($query) use ($storeId) {
                $query->where('store_id', $storeId);
            })->where('status', 'Selesai')
                ->selectRaw('SUM(CASE WHEN MONTH(date) = ? THEN CASE WHEN type = "Rugi" THEN (value * 0.3) ELSE (value * 0.7 ) END ELSE 0 END) as current_month_total', [$month])
                ->selectRaw('SUM(CASE WHEN MONTH(date) = ? THEN CASE WHEN type = "Rugi" THEN (value * 0.3) ELSE (value * 0.7) END ELSE 0 END) as previous_month_total', [$month - 1])
                ->whereYear('date', $currentYear)
                ->first();

            $percentageMoneyFlow = 0;
            if ($moneyFlow->previous_month_total > 0) {
                $percentageMoneyFlow = ($moneyFlow->current_month_total / $moneyFlow->previous_month_total) * 100;
            }

            $orders = Order::when($storeId, function ($query) use ($storeId) {
                $query->where('store_id', $storeId);
            })
                ->selectRaw('SUM(CASE WHEN MONTH(date_start) = ? THEN 1 ELSE 0 END) as current_month_total', [$month])
                ->selectRaw('SUM(CASE WHEN MONTH(date_start) = ? THEN 1 ELSE 0 END) as previous_month_total', [$month - 1])
                ->whereYear('date_start', $currentYear)
                ->first();

            $percentageOrders = 0;
            if ($orders->previous_month_total != 0) {
                $percentageOrders = (($orders->current_month_total - $orders->previous_month_total) / $orders->previous_month_total) * 100;
            }

            return response()->json([
                'money_flow' => [
                    'percentage' => number_format($percentageMoneyFlow, 2),
                    'comparison' => Method::comparisonStatus($moneyFlow->current_month_total, $moneyFlow->previous_month_total),
                ],
                'net_income' => [
                    'percentage' => number_format(abs($percentageNetIncome), 2),
                    'comparison' => Method::comparisonStatus($netIncome->current_month_total, $netIncome->previous_month_total),
                    'profit_data' => $profit,
                    'loss_data' => $loss
                ],
                'orders' => [
                    'percentage' => number_format($percentageOrders, 2),
                    'comparison' => Method::comparisonStatus($orders->current_month_total, $orders->previous_month_date),
                    'data' => $order
                ],
                'events' => [
                    'data' => $event
                ]
            ], 200);
        }

        $events = Event::where('date_end', '>=', $currentDate)
            ->whereYear('date_end', $currentYear)
            ->get();

        $total = [
            'users' => User::count(),
            'assets' => Asset::count(),
            'products' => Product::count(),
            'collaborations' => Collaboration::count(),
            'entrusts' => Entrust::count(),
            'wastes' => Waste::count()
        ];

        return Method::view('admin.dashboard.index', compact('route', 'acc', 'events', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
