<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $acc = Auth::user();

        $search = isset($request->search) ? '%' . $request->search . '%' : '%%';

        $categoryIds = ProductCategory::where('name', 'like', $search)->pluck('id');

        $products = Product::where('store_id', null)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('stock', 'like', $search)
                    ->orWhere('price', 'like', $search)
                    ->orWhere('description', 'like', $search);
            })
            ->when($categoryIds->isNotEmpty(), function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'))
            ->get();

        return view('admin.product.index', compact('acc', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acc = Auth::user();
        $categories = ProductCategory::all();

        return view('admin.product.create', compact('acc', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'category_id' => 'required|integer|exists:product_categories,id',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'string',
            'image' => 'mimes:jpg,png,jpeg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['product' => $validator->errors()->first()]);
        }

        Product::create([
            'store_id' => null,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect($request->url)->with('message', 'Produk telah berhasil dibuat!');
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
        $acc = Auth::user();
        $categories = ProductCategory::all();

        return view('admin.product.edit', compact('acc', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|string',
            'category_id' => 'required|integer|exists:product_categories,id',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'string',
            'image' => 'mimes:jpg,png,jpeg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['product' => $validator->errors()->first()]);
        }

        $product->update([
            'store_id' => null,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect($request->url)->with('message', 'Produk telah berhasil diperbarui!');
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
