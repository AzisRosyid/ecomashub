<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private $route = 'adminOrder';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $route = $this->route;
        $acc = Auth::user();

        $search = isset($request->search) ? '%' . $request->search . '%' : '%%';

        $productIds = Product::where('name', 'like', $search)->pluck('id');

        $detailIds = OrderDetail::where('quantity', 'like', $search)->when($productIds->isNotEmpty(), function ($query) use ($productIds) {
            $query->whereIn('product_id', $productIds);
        })->pluck('order_id');

        $orders = Order::where('store_id', null)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('down_payment', 'like', $search)
                    ->orWhere('description', 'like', $search)
                    ->orWhere('date_start', 'like', $search)
                    ->orWhere('date_end', 'like', $search)
                    ->orWhere('status', 'like', $search);
            })
            ->when($detailIds->isNotEmpty(), function ($query) use ($detailIds) {
                $query->whereIn('id', $detailIds);
            })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'))
            ->get();

        return view('admin.order.index', compact('route', 'acc', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $acc = Auth::user();
        $products = Product::where('store_id', null);

        return view('admin.order.create', compact('route', 'acc', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'down_payment' => 'required|numeric',
            'description' => 'string',
            'date_start' => 'date',
            'date_end' => 'date',
            'description' => 'string',
            'status' => 'required|in:Pengajuan,Proses,Selesai',
            'product_ids.*' => 'required|integer|exists:products,id',
            'quantity.*' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['order' => $validator->errors()->first()]);
        }

        $order = Order::create([
            'store_id' => null,
            'name' => $request->name,
            'down_payment' => $request->down_payment,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status
        ]);

        $orderDetails = [];

        foreach ($request->product_ids as $key => $id) {
            $orderDetails[] = [
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $request->quantity[$key]
            ];
        }

        OrderDetail::insert($orderDetails);

        return redirect($request->url)->with('message', 'Pesanan telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $route = $this->route;
        $acc = Auth::user();
        $products = Product::where('store_id', null)->get();
        $details = OrderDetail::where('order_id', $order->id)->get();

        return view('admin.order.edit', compact('route', 'acc', 'products', 'order', 'details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $rules = [
            'name' => 'required|string',
            'description' => 'string',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'description' => 'string',
            'status' => 'required|in:Pengajuan,Proses,Selesai',
            'product_ids.*' => 'required|integer|exists:products,id',
            'quantity.*' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['order' => $validator->errors()->first()]);
        }

        $order->update([
            'store_id' => null,
            'name' => $request->name,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status
        ]);

        $order->orderDetails()->delete();

        $orderDetails = [];

        // foreach (OrderDetail::where('order_id', $order->id) as $id) {
        //     Product::find($id)->delete();
        // }

        foreach ($request->product_ids as $key => $id) {
            $orderDetails[] = [
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $request->quantity[$key]
            ];
        }

        OrderDetail::insert($orderDetails);

        return redirect($request->url)->with('message', 'Pesanan telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('adminOrder')->with('message', 'Pesanan telah berhasil dihapus!');
    }
}
