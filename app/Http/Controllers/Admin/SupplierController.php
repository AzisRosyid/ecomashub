<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    private static $types = ['Rutin', 'Sekali'];

    public function __construct()
    {
        $this->middleware('auth.role:pengurus');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $acc = Auth::user();

        $search = isset($request->search) ? '%' . $request->search . '%' : '%%';

        $suppliers = Supplier::where('store_id', null)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('item', 'like', $search)
                    ->orWhere('quantity', 'like', $search)
                    ->orWhere('cost', 'like', $search)
                    ->orWhere('type', 'like', $search);
            })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'))
            ->get();

        return view('admin.supplier.index', compact('acc', 'suppliers', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acc = Auth::user();

        return view('admin.supplier.create', compact('acc', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'item' => 'required|string',
            'quantity' => 'required|integer',
            'cost' => 'required|numeric',
            'type' => 'required|in:Rutin,Sekali',
            'date' => 'required|date',
            'interval' => 'required|integer',
            'description' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['supplier' => $validator->errors()->first()]);
        }

        Supplier::create([
            'store_id' => null,
            'name' => $request->name,
            'item' => $request->item,
            'quantity' => $request->quantity,
            'cost' => $request->cost,
            'type' => $request->type,
            'date' => $request->date,
            'interval' => $request->interval,
            'description' => $request->description
        ]);

        return redirect($request->url)->with('message', 'Pemasok telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $acc = Auth::user();

        return view('admin.product.create', compact('acc', 'types', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'name' => 'required|string',
            'item' => 'required|string',
            'quantity' => 'required|integer',
            'cost' => 'required|numeric',
            'type' => 'required|in:Rutin,Sekali',
            'date' => 'required|date',
            'interval' => 'required|integer',
            'description' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['supplier' => $validator->errors()->first()]);
        }

        $supplier->update([
            'store_id' => null,
            'name' => $request->name,
            'item' => $request->item,
            'quantity' => $request->quantity,
            'cost' => $request->cost,
            'type' => $request->type,
            'date' => $request->date,
            'interval' => $request->interval,
            'description' => $request->description
        ]);

        return redirect($request->url)->with('message', 'Pemasok telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('admin.product.index')->with('message', 'Pemasok telah berhasil dihapus!');
    }
}
