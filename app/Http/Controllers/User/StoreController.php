<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StoreController extends Controller
{
    private $route = 'userStore';
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
        $order = $request->input('order', 'id');
        $method = $request->input('method', 'desc');

        $query = Store::where(function ($query) use ($acc) {
            if ($acc->role == 'Pengurus') {
                $query->where('user.organization', $acc->organization);
            } else {
                $query->where('user_id', $acc->id);
            }
        })->where(function ($query) use ($search) {
            $query->where('name', 'like', $search)
                ->orWhere('email', 'like', $search)
                ->orWhere('phone_number', 'like', $search)
                ->orWhere('address', 'like', $search)
                ->orWhere('status', 'like', $search)
                ->orWhere('description', 'like', $search);
        })
            ->orderBy($order, $method);

        $total = $query->count();

        $stores = $query->paginate($pick, ['*'], 'page', $page);
        $stores->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        if ($request->has('api')) {
            if ($request->has('select')) {
                $store = $query->where('id', $request->input('select'))->first();

                if ($store) {
                    Session::put('store_id', $request->input('select'));
                }
            }

            return response()->json(compact('total', 'stores'), 200);
        }

        return Method::view('user.store.index', compact('route', 'acc', 'stores', 'pick', 'page', 'total', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $status = $this->status;
        $acc = Auth::user();

        return Method::view('user.store.create', compact('route', 'acc', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:stores',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif',
            'description' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['store' => $validator->errors()->first()]);
        }

        $acc = Auth::user();

        Store::create([
            'user_id' => $acc->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('userStore')->with('message', 'Toko telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        $route = $this->route;
        $status = $this->status;
        $acc = Auth::user();

        return Method::view('user.store.edit', compact('route', 'acc', 'status', 'store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $rules = [
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('stores')->ignore($store->id),
            ],
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif',
            'description' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['store' => $validator->errors()->first()]);
        }

        $store->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('userStore')->with('message', 'Toko telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('userStore')->with('message', 'Toko telah berhasil dihapus!');
    }
}
