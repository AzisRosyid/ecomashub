<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Http\Requests\CustomRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private $route = 'adminOrder';
    private $status = ['Pengajuan', 'Proses', 'Selesai'];
    /**
     * Display a listing of the resource.
     */
    public function index(CustomRequest $request)
    {
        $route = $this->route;
        $status = $this->status;
        $acc = Auth::user();
        $search = '%' . $request->input('search', '') . '%';
        $pick = $request->input('pick', 10);
        $page = $request->input('page', 1);
        $order = $request->input('order', 'id');
        $method = $request->input('method', 'desc');
        $storeId = session('store_id');

        $productIds = Product::where('name', 'like', $search)->pluck('id');

        $detailIds = OrderDetail::where('quantity', 'like', $search)->when($productIds->isNotEmpty(), function ($query) use ($productIds) {
            $query->whereIn('product_id', $productIds);
        })->pluck('order_id');

        $query = Order::when($storeId, function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        })
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
            ->orderBy($order, $method);

        $total = $query->count();

        $orders = $query->paginate($pick, ['*'], 'page', $page);
        $orders->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        return Method::view('admin.order.index', compact('route', 'acc', 'status', 'orders', 'pick', 'page', 'total', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $status = $this->status;
        $acc = Auth::user();
        $products = Product::where('store_id', null);

        return Method::view('admin.order.create', compact('route', 'acc', 'status', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomRequest $request)
    {
        $rules = [
            'name' => 'required|string',
            'down_payment' => 'required|numeric',
            'description' => 'nullable|string',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
            'status' => 'required|in:Pengajuan,Proses,Selesai',
            'product_id.*' => 'required|exists:products,id',
            'product_quantity.*' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['order' => $validator->errors()->first()]);
        }

        $total = 0;
        foreach ($request->product_id as $key => $id) {
            $product = Product::find($id);
            if ($product->stock - $request->product_quantity[$key] < 0) {
                return back()->withInput($request->all())->withErrors(['order' => 'Jumlah produk tidak bisa melebihi stok (produk: ' . $product->name . ')']);
            }
            $total += $product->price * $request->product_quantity[$key];
        }

        if ($total < $request->down_payment) {
            return back()->withInput($request->all())->withErrors(['order' => 'Nilai Uang Muka harus lebih rendah dibanding jumlah harga pemesanan!']);
        }

        $order = Order::create([
            'store_id' => Session::get('store_id'),
            'name' => $request->name,
            'down_payment' => $request->down_payment,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status
        ]);

        Transaction::create([
            'store_id' => $order->store_id,
            'category_id' => $order->id,
            'category' => 'Pesanan',
            'value' => $order->down_payment ?? 0,
            'type' => 'Untung',
            'date' => $order->date_start,
            'status' => 'Selesai'
        ]);

        Transaction::create([
            'store_id' => $order->store_id,
            'category_id' => $order->id,
            'category' => 'Pesanan',
            'value' => $total - $order->down_payment ?? 0,
            'type' => 'Untung',
            'date' => $order->date_end,
            'status' => 'Menunggu'
        ]);

        $orderDetails = [];

        foreach ($request->product_id as $key => $id) {
            $product = Product::find($id);
            $product->update(['stock' => $product->stock - $request->product_quantity[$key]]);

            $orderDetails[] = [
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $request->product_quantity[$key]
            ];
        }

        OrderDetail::insert($orderDetails);

        return redirect()->route('adminOrder')->with('message', 'Pesanan telah berhasil dibuat!');
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
        $status = $this->status;
        $acc = Auth::user();
        $products = Product::where('store_id', null)->get();
        $details = OrderDetail::where('order_id', $order->id)->get();

        return Method::view('admin.order.edit', compact('route', 'acc', 'status', 'products', 'order', 'details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomRequest $request, Order $order)
    {
        $rules = [
            'name' => 'required|string',
            'down_payment' => 'required|numeric',
            'description' => 'nullable|string',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
            'status' => 'required|in:Pengajuan,Proses,Selesai',
            // 'product_id.*' => 'required|exists:products,id',
            // 'product_quantity.*' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['order' => $validator->errors()->first()]);
        }

        $total = 0;
        foreach ($request->product_id as $key => $id) {
            $product = Product::find($id);
            $total += $product->price * $request->product_quantity[$key];
        }

        if ($total < $request->down_payment) {
            return back()->withInput($request->all())->withErrors(['order' => 'Nilai Uang Muka harus lebih rendah dibanding jumlah harga pemesanan!']);
        }

        $order->update([
            //  'store_id' => Session::get('store_id'),
            'name' => $request->name,
            'down_payment' => $request->down_payment,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status
        ]);

        $transaction = Transaction::where('category_id', $order->id)->orderBy('date')->get();
        $downPayment = $transaction[0];

        $downPayment->update([
            'value' => $order->down_payment ?? 0,
            'date' => $order->date_start
        ]);

        // $order->details()->delete();

        // $orderDetails = [];

        // foreach ($request->product_id as $key => $id) {
        //     $orderDetails[] = [
        //         'order_id' => $order->id,
        //         'product_id' => $id,
        //         'quantity' => $request->product_quantity[$key]
        //     ];
        // }

        // OrderDetail::insert($orderDetails);

        return redirect()->route('adminOrder')->with('message', 'Pesanan telah berhasil diperbarui!');
    }

    /**
     * Update Status
     */
    public function updateStatus(CustomRequest $request)
    {
        $rules = [
            'id' => 'required|integer|exists:orders,id',
            'status' => 'required|in:Pengajuan,Proses,Selesai',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['order' => $validator->errors()->first()]);
        }

        Order::find($request->id)->update([
            'status' => $request->status
        ]);

        return back()->with('message', 'Status Pesanan telah berhasil diperbarui!');
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
