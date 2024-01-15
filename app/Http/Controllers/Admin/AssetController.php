<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $acc = Auth::user();

        $search = isset($request->search) ? '%' . $request->search . '%' : '%%';

        $unitIds = AssetUnit::where('name', 'like', $search)->pluck('id');

        $assets = Asset::where('user_id', null)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('category', 'like', $search)
                    ->orWhere('quantity', 'like', $search)
                    ->orWhere('location', 'like', $search)
                    ->orWhere('status', 'like', $search)
                    ->orWhere('description', 'like', $search);
            })
            ->when($unitIds->isNotEmpty(), function ($query) use ($unitIds) {
                $query->whereIn('unit_id', $unitIds);
            })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'))
            ->get();

        return view('admin.asset.index', compact('acc', 'assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acc = Auth::user();
        $units = AssetUnit::all();

        return view('admin.asset.create', compact('acc', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'category' => 'required|in:Alat,Bahan,Properti',
            'quantity' => 'required|integer',
            'unit_id' => 'required|integer|exists:asset_units,id',
            'location' => 'required|string',
            'description' => 'string',
            'status' => 'required|in:Tersedia,Dipinjam,Digunakan',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['asset' => $validator->errors()->first()]);
        }

        Asset::create([
            'user_id' => null,
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit_id' => $request->unit_id,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect($request->url)->with('message', 'Aset telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $acc = Auth::user();
        $units = AssetUnit::all();

        return view('admin.asset.edit', compact('acc', 'units', 'asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $rules = [
            'name' => 'required|string',
            'category' => 'required|in:Alat,Bahan,Properti',
            'quantity' => 'required|integer',
            'unit_id' => 'required|integer|exists:asset_units,id',
            'location' => 'required|string',
            'description' => 'string',
            'status' => 'required|in:Tersedia,Dipinjam,Digunakan',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['asset' => $validator->errors()->first()]);
        }

        $asset->update([
            'user_id' => null,
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit_id' => $request->unit_id,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect($request->url)->with('message', 'Aset telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('adminAsset')->with('message', 'Aset telah berhasil dihapus!');
    }
}
