<?php

namespace App\Http\Controllers\Admin\Common\Unit;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductCategoryController extends Controller
{
    private $route = 'adminProductCategory';
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $route = $this->route;
    //     $acc = Auth::user();

    //     $pickUnit = 5;
    //     $pageUnit = $request->input('pageUnit', 1);

    //     $query = ProductCategory::all();

    //     $totalUnit = $query->count();

    //     $units = $query->paginate($pickUnit, ['*'], 'pageUnit', $pageUnit);
    //     $units->appends(['pick2' => $pickUnit]);

    //     $pageUnits = ceil($totalUnit / $pickUnit);

    //     return view('admin.product.index', compact('route', 'acc', 'units', 'pickUnit', 'pageUnit', 'totalUnit', 'pageUnits'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $acc = Auth::user();

        return view('admin.product.unit.create', compact('route', 'acc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:product_categories',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['unit' => $validator->errors()->first()]);
        }

        ProductCategory::create($request->all());

        return redirect()->route('adminProduct')->with('message', 'Kategori Produk telah berhasil dibuat!');
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
    public function edit(ProductCategory $category)
    {
        $route = $this->route;
        $acc = Auth::user();

        return view('admin.product.unit.edit', compact('route', 'acc', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $category)
    {
        $rules = [
            'name' => [
                'required',
                'string',
                Rule::unique('product_categories')->ignore($category->id),
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['product' => $validator->errors()->first()]);
        }

        $category->update($request->all());

        return redirect()->route('adminProduct')->with('message', 'Kategori Produk telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $category)
    {
        $category->delete();

        return redirect()->route('adminProduct')->with('message', 'Kategori Produk telah berhasil dihapus!');
    }
}
