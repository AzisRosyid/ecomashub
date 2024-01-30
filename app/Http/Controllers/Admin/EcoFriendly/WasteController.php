<?php

namespace App\Http\Controllers\Admin\EcoFriendly;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Waste;
use App\Models\WasteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WasteController extends Controller
{
    private $route = 'adminWaste';
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $route = $this->route;
        $acc = Auth::user();

        $search = isset($request->search) ? '%' . $request->search . '%' : '%%';

        $productIds = Product::where('name', 'like', $search)->pluck('id');
        $typesIds = WasteType::where('name', 'like', $search)->pluck('id');

        $wastes = Waste::where(function ($query) use ($search) {
            $query->where('weight', 'like', $search)
                ->orWhere('unit', 'like', $search)
                ->orWhere('description', 'like', $search);
        })
            ->when($productIds->isNotEmpty(), function ($query) use ($productIds) {
                $query->whereIn('product_id', $productIds);
            })
            ->when($typesIds->isNotEmpty(), function ($query) use ($typesIds) {
                $query->whereIn('type_id', $typesIds);
            })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'))
            ->get();

        return view('admin.eco-friendly.waste.index', compact('route', 'acc', 'wastes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $acc = Auth::user();
        $types = WasteType::all();

        return view('admin.eco-friendly.waste.create', compact('route', 'acc', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string',
            'type_id' => 'required|exists:waste_types,id',
            'weight' => 'required|numeric',
            'unit' => 'required|in:Milligram,Gram,Kilogram',
            'description' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['waste' => $validator->errors()->first()]);
        }

        Waste::create($request->all());

        return redirect($request->url)->with('message', 'Sampah telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Waste $waste)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Waste $waste)
    {
        $route = $this->route;
        $acc = Auth::user();
        $types = WasteType::all();

        return view('admin.eco-friendly.waste.edit', compact('route', 'acc', 'types', 'waste'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Waste $waste)
    {
        $rules = [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string',
            'type_id' => 'required|exists:waste_types,id',
            'weight' => 'required|numeric',
            'unit' => 'required|in:Milligram,Gram,Kilogram',
            'description' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['waste' => $validator->errors()->first()]);
        }

        $waste->update($request->all());

        return redirect($request->url)->with('message', 'Sampah telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Waste $waste)
    {
        $waste->delete();

        return redirect()->route('adminWaste')->with('message', 'Sampah telah berhasil dihapus!');
    }
}
