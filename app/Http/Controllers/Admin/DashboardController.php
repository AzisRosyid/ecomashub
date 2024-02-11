<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Models\Asset;
use App\Models\Entrust;
use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
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

        $currentDate = Carbon::now()->format('Y-m-d');
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        if ($request->has('api')) {
            $profit = Transaction::where('store_id', 'null')->where('value_type', 'Untung')
                ->whereYear('date', $currentYear)
                ->selectRaw('MONTH(date) as month, SUM(value) as total')
                ->groupBy('month')
                ->get();

            $loss = Transaction::where('value_type', 'Rugi')
                ->whereYear('date', $currentYear)
                ->selectRaw('MONTH(date) as month, SUM(value) as total')
                ->groupBy('month')
                ->get();

            $order = Order::whereYear('date_start', $currentYear)
                ->selectRaw('MONTH(date_start) as month, COUNT(id) as total')
                ->groupBy('month')
                ->get();

            $netIncome = Transaction::whereNull('store_id')
                ->selectRaw('SUM(CASE WHEN MONTH(date) = ? THEN CASE WHEN value_type = "Rugi" THEN -value ELSE value END ELSE 0 END) as current_month_total', [$currentMonth])
                ->selectRaw('SUM(CASE WHEN MONTH(date) = ? THEN CASE WHEN value_type = "Rugi" THEN -value ELSE value END ELSE 0 END) as previous_month_total', [$currentMonth - 1])
                ->whereYear('date', $currentYear)
                ->first();

            $percentageNetIncome = 0;
            if ($netIncome->previous_month_total != 0) {
                $percentageNetIncome = ($netIncome->current_month_total / $netIncome->previous_month_total) * 100;
            }

            $currentMonthMoneyFlow = 0;

            $lastMonthMoneyFlow = 0;

            $percentageChangeMoneyFlow = 0;
            if ($lastMonthMoneyFlow != 0) {
                $percentageChangeMoneyFlow = (($currentMonthMoneyFlow - $lastMonthMoneyFlow) / $lastMonthMoneyFlow) * 100;
            }

            $orders = Order::whereNull('store_id')
                ->selectRaw('SUM(CASE WHEN MONTH(date_start) = ? THEN 1 ELSE 0 END) as current_month_total', [$currentMonth])
                ->selectRaw('SUM(CASE WHEN MONTH(date_start) = ? THEN 1 ELSE 0 END) as previous_month_total', [$currentMonth - 1])
                ->whereYear('date_start', $currentYear)
                ->first();

            // Calculate the percentage change in orders
            $percentageOrders = 0;
            if ($orders->previous_month_total != 0) {
                $percentageOrders = (($orders->current_month_total - $orders->previous_month_total) / $orders->previous_month_total) * 100;
            }

            // Return JSON response with the calculated values
            return response()->json([
                'money_flow' => [
                    'percentage' => $percentageChangeMoneyFlow,
                    'comparison' => Method::comparisonStatus($currentMonthMoneyFlow, $lastMonthMoneyFlow),
                ],
                'net_income' => [
                    'percentage' => $percentageNetIncome,
                    'comparison' => Method::comparisonStatus($netIncome->current_month_total, $netIncome->previous_month_total),
                    'profit_data' => $profit,
                    'loss_data' => $loss
                ],
                'orders' => [
                    'percentage' => $percentageOrders,
                    'comparison' => Method::comparisonStatus($orders->current_month_total, $orders->previous_month_date),
                    'data' => $order
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
            'suppliers' => Supplier::count(),
            'entrusts' => Entrust::count(),
            'wastes' => Waste::count()
        ];

        return view('admin.dashboard.index', compact('route', 'acc', 'events', 'total'));
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
