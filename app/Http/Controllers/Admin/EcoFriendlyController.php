<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Waste;
use App\Models\WasteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcoFriendlyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $acc = Auth::user();

        $search = isset($request->search) ? '%' . $request->search . '%' : '%%';

        $typesIds = WasteType::where('name', 'like', $search)->pluck('id');

        $wastes = Waste::where('store_id', null)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('stock', 'like', $search)
                    ->orWhere('price', 'like', $search)
                    ->orWhere('profit', 'like', $search)
                    ->orWhere('description', 'like', $search);
            })
            ->when($typesIds->isNotEmpty(), function ($query) use ($typesIds) {
                $query->whereIn('type_id', $typesIds);
            })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'))
            ->get();

        return view('admin.product.index', compact('acc', 'wastes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Waste $waste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Waste $waste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Waste $waste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Waste $waste)
    {
        //
    }
}
