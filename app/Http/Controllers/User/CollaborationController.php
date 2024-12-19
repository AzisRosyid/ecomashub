<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Http\Requests\CustomRequest;
use App\Models\Collaboration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CollaborationController extends Controller
{
    private $route = 'userCollaboration';
    private $types = ['Mitra', 'Pemasok', 'Konsumen'];
    private $status = ['Aktif', 'Nonaktif'];

    /**
     * Display a listing of the resource.
     */
    public function index(CustomRequest $request)
    {
        $route = $this->route;
        $acc = Auth::user();
        $search = '%' . $request->input('search', '') . '%';
        $pick = $request->input('pick', 10);
        $page = $request->input('page', 1);
        $order = $request->input('order', 'id');
        $method = $request->input('method', 'desc');
        $storeId = Session::get('store_id');

        $query = Collaboration::when($storeId, function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        })->where(function ($query) use ($search) {
            $query->where('name', 'like', $search)
                ->orWhere('type', 'like', $search)
                ->orWhere('email', 'like', $search)
                ->orWhere('phone_number', 'like', $search)
                ->orWhere('address', 'like', $search)
                ->orWhere('status', 'like', $search)
                ->orWhere('description', 'like', $search);
        })
            ->orderBy($order, $method);

        $total = $query->count();

        $collaborations = $query->paginate($pick, ['*'], 'page', $page);
        $collaborations->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        return view('user.collaboration.index', compact('route', 'acc', 'collaborations', 'pick', 'page', 'total', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $types = $this->types;
        $status = $this->status;
        $acc = Auth::user();

        return view('user.collaboration.create', compact('route', 'acc', 'status', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomRequest $request)
    {
        $rules = [
            'name' => 'required|string',
            'type' => 'required|in:Mitra,Pemasok,Konsumen',
            'email' => 'required|string|email|unique:collaborations',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif',
            'description' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['collaboration' => $validator->errors()->first()]);
        }

        Collaboration::create([
            'store_id' => Session::get('store_id'),
            'name' => $request->name,
            'type' => $request->type,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('userCollaboration')->with('message', 'Kolaborasi telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collaboration $collaboration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collaboration $collaboration)
    {
        $route = $this->route;
        $types = $this->types;
        $status = $this->status;
        $acc = Auth::user();

        return view('user.collaboration.edit', compact('route', 'acc', 'status', 'collaboration', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomRequest $request, Collaboration $collaboration)
    {
        $rules = [
            'name' => 'required|string',
            'type' => 'required|in:Mitra,Pemasok,Konsumen',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('collaborations')->ignore($collaboration->id),
            ],
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif',
            'description' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['collaboration' => $validator->errors()->first()]);
        }

        $collaboration->update([
            // 'store_id' => Session::get('store_id'),
            'name' => $request->name,
            'type' => $request->type,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('userCollaboration')->with('message', 'Kolaborasi telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collaboration $collaboration)
    {
        $collaboration->delete();

        return redirect()->route('userCollaboration')->with('message', 'Kolaborasi telah berhasil dihapus!');
    }
}
