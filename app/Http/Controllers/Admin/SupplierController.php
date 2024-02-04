<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    private $route = 'adminSupplier';
    private $status = ['Aktif', 'Nonaktif'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $route = $this->route;
        $acc = Auth::user();
        $search = '%' . $request->input('search', '') . '%';
        $pick = $request->input('pick', 10);
        $page = $request->input('page', 1);

        $query = Supplier::where(function ($query) use ($search) {
            $query->where('name', 'like', $search)
                ->orWhere('email', 'like', $search)
                ->orWhere('phone_number', 'like', $search)
                ->orWhere('address', 'like', $search)
                ->orWhere('status', 'like', $search)
                ->orWhere('description', 'like', $search);
        })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'));

        $total = $query->count();

        $suppliers = $query->paginate($pick, ['*'], 'page', $page);
        $suppliers->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        return view('admin.supplier.index', compact('route', 'acc', 'suppliers', 'pick', 'page', 'total', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $status = $this->status;
        $acc = Auth::user();

        return view('admin.supplier.create', compact('route', 'acc', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif',
            'description' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['supplier' => $validator->errors()->first()]);
        }

        Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('adminSupplier')->with('message', 'Pemasok telah berhasil dibuat!');
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
        $route = $this->route;
        $status = $this->status;
        $acc = Auth::user();

        return view('admin.supplier.edit', compact('route', 'acc', 'status', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('suppliers')->ignore($supplier->id),
            ],
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif',
            'description' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['supplier' => $validator->errors()->first()]);
        }

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('adminSupplier')->with('message', 'Pemasok telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('adminSupplier')->with('message', 'Pemasok telah berhasil dihapus!');
    }
}
