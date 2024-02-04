<?php

namespace App\Http\Controllers\Admin\Unit;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\AssetUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AssetUnitController extends Controller
{
    private $route = 'adminAssetUnit';
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $route = $this->route;
    //     $acc = Auth::user();

    //     $pickUnit = 5;
    //     $pageUnit = $request->input('pageUnit', 1);

    //     $query = AssetUnit::all();

    //     $totalUnit = $query->count();

    //     $units = $query->paginate($pickUnit, ['*'], 'pageUnit', $pageUnit);
    //     $units->appends(['pick2' => $pickUnit]);

    //     $pageUnits = ceil($totalUnit / $pickUnit);

    //     return view('admin.assets.index', compact('route', 'acc', 'units', 'pickUnit', 'pageUnit', 'totalUnit', 'pageUnits'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $acc = Auth::user();

        return view('admin.asset.unit.create', compact('route', 'acc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:asset_units,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['unit' => $validator->errors()->first()]);
        }

        AssetUnit::create($request->all());

        return redirect()->route('adminAsset')->with('message', 'Satuan Aset telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $assets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetUnit $unit)
    {
        $route = $this->route;
        $acc = Auth::user();

        return view('admin.asset.unit.edit', compact('route', 'acc', 'unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssetUnit $category)
    {
        $rules = [
            'name' => [
                'required',
                'string',
                Rule::unique('asset_units', 'id')->ignore($category->id),
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['unit' => $validator->errors()->first()]);
        }

        $category->update($request->all());

        return redirect()->route('adminAsset')->with('message', 'Satuan Aset telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetUnit $category)
    {
        $category->delete();

        return redirect()->route('adminAsset')->with('message', 'Satuan Aset telah berhasil dihapus!');
    }
}
