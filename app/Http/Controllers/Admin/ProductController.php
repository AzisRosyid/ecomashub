<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Http\Requests\IndexRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private $route = 'adminProduct';
    private $units = ['Milligram', 'Gram', 'Kilogram'];
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $route = $this->route;
        $acc = Auth::user();
        $search = '%' . $request->input('search', '') . '%';
        $pick = $request->input('pick', 10);
        $page = $request->input('page', 1);
        $order = $request->input('order', 'id');
        $method = $request->input('method', 'desc');
        $storeId = session('store_id');
        $categoryIds = ProductCategory::where('name', 'like', $search)->pluck('id');

        $query = Product::when($storeId, function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        })
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('weight', 'like', $search)
                    ->orWhere('unit', 'like', $search)
                    ->orWhere('stock', 'like', $search)
                    ->orWhere('price', 'like', $search)
                    ->orWhere('description', 'like', $search);
            })
            ->when($categoryIds->isNotEmpty(), function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })
            ->orderBy($order, $method);

        $total = $query->count();

        $products = $query->paginate($pick, ['*'], 'page', $page);
        $products->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        if ($request->has('api')) {
            return response()->json(compact('total', 'products'), 200);
        }

        // Unit
        $pickUnit = 5;
        $pageUnit = $request->input('pageUnit', 1);

        $queryUnit = ProductCategory::query();

        $totalUnit = $queryUnit->count();

        $units = $queryUnit->paginate($pickUnit, ['*'], 'pageUnit', $pageUnit);
        $units->appends(['pickUnit' => $pickUnit]);

        $pageUnits = ceil($totalUnit / $pickUnit);

        return view('admin.product.index', compact('route', 'acc', 'products', 'pick', 'page', 'total', 'pages', 'units', 'pickUnit', 'pageUnit', 'totalUnit', 'pageUnits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $units = $this->units;
        $acc = Auth::user();
        $categories = ProductCategory::all();

        return view('admin.product.create', compact('route', 'acc', 'units', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|integer|exists:product_categories,id',
            'weight' => 'required|numeric',
            'unit' => 'required|in:Milligram,Gram,Kilogram,Mililiter,Liter',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['product' => $validator->errors()->first()]);
        }

        $image = null;
        if ($request->file('image') != null) {
            $image = Method::uploadFile($request->store_id . '/product', $request->file('image'), $request->name);
        }

        Product::create([
            'store_id' => $request->store_id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'weight' => $request->weight,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('adminProduct')->with('message', 'Produk telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $route = $this->route;
        $units = $this->units;
        $acc = Auth::user();
        $categories = ProductCategory::all();

        return view('admin.product.edit', compact('route', 'acc', 'units', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|string',
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|integer|exists:product_categories,id',
            'weight' => 'required|numeric',
            'unit' => 'required|in:Milligram,Gram,Kilogram,Mililiter,Liter',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['product' => $validator->errors()->first()]);
        }

        $product->update($request->all());

        return redirect()->route('adminProduct')->with('message', 'Produk telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('adminProduct')->with('message', 'Produk telah berhasil dihapus!');
    }
}
