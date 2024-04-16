<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private $route = 'adminUser';
    private $types = ['Internal', 'External'];
    private $genders = ['Laki-Laki', 'Perempuan'];
    private $status =  ['Aktif', 'Menunggu', 'Blok'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $route = $this->route;
        $types = $this->types;
        $genders = $this->genders;
        $status = $this->status;
        $acc = Auth::user();

        $search = '%' . $request->input('search', '') . '%';
        $pick = $request->input('pick', 10);
        $page = $request->input('page', 1);
        $order = $request->input('order', 'id');
        $method = $request->input('method', 'desc');

        $roleIds = UserRole::where('organization_id', User::find($acc->id)->organization()->id)->where('name', 'like', $search)->orWhere('type', 'like', $search)->pluck('id');

        $query = User::where(function ($query) use ($search) {
            $query->where('first_name', 'like', $search)
                ->orWhere('last_name', 'like', $search)
                ->orWhere('username', 'like', $search)
                ->orWhere('email', 'like', $search)
                ->orWhere('gender', 'like', $search)
                ->orWhere('date_of_birth', 'like', $search)
                ->orWhere('phone_number', 'like', $search)
                ->orWhere('address', 'like', $search)
                ->orWhere('status', 'like', $search);
        })
            ->when($roleIds->isNotEmpty(), function ($query) use ($roleIds) {
                $query->whereIn('role_id', $roleIds);
            })
            ->orderBy($order, $method);

        $total = $query->count();

        $users = $query->paginate($pick, ['*'], 'page', $page);
        $users->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        // Unit
        $pickUnit = 5;
        $pageUnit = $request->input('pageUnit', 1);

        $queryUnit = UserRole::where('organization_id', User::find($acc->id)->organization()->id);

        $totalUnit = $queryUnit->count();

        $units = $queryUnit->paginate($pickUnit, ['*'], 'pageUnit', $pageUnit);
        $units->appends(['pickUnit' => $pickUnit]);

        $pageUnits = ceil($totalUnit / $pickUnit);

        return view('admin.user.index', compact('route', 'acc', 'types', 'genders', 'status', 'users', 'pick', 'page', 'total', 'pages', 'units', 'pickUnit', 'pageUnit', 'totalUnit', 'pageUnits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $types = $this->types;
        $genders = $this->genders;
        $status = $this->status;
        $acc = Auth::user();
        $roles = UserRole::where('organization_id', User::find($acc->id)->organization()->id)->get();

        return view('admin.user.create', compact('route', 'acc', 'types', 'status', 'genders', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|unique:users',
            'email' => 'required|string|email|unique:users',
            'role_id' => 'required|string|exists:user_roles,id',
            'source_type' => 'required|in:Internal,External',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Menunggu,Blok',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['user' => $validator->errors()->first()]);
        }

        $password = Hash::make($request->first_name . '_' . Carbon::parse($request->date_of_birth)->format('Y'));

        $image = null;
        if ($request->file('image')) {
            $image = Method::uploadFile($request->store_id . 'user', $request->file('image'), $request->name);
        }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
            'role_id' => $request->role_id,
            'source_type' => $request->source_type,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'image' => $image,
        ]);

        return redirect()->route('adminUser')->with('message', 'Pengguna telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $route = $this->route;
        $types = $this->types;
        $status = $this->status;
        $genders = $this->genders;
        $acc = Auth::user();
        $roles = UserRole::where('organization_id', User::find($acc->id)->organization()->id)->get();

        return view('admin.user.edit', compact('route', 'acc', 'types', 'status', 'genders', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'role_id' => 'required|string|exists:user_roles,id',
            'source_type' => 'required|in:Internal,External',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Menunggu,Blok',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['user' => $validator->errors()->first()]);
        }

        $password = $request->has('reset_password') ? Hash::make($request->first_name . '_' . Carbon::parse($request->date_of_birth)->format('Y')) : $user->password;

        $image = null;
        if ($request->file('image')) {
            $image = Method::uploadFile($request->store_id . 'user', $request->file('image'), $request->name);
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
            'role_id' => $request->role_id,
            'source_type' => $request->source_type,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'image' => $image,
        ]);

        return redirect()->route('adminUser')->with('message', 'Pengguna telah berhasil diperbarui!');
    }

    /**
     * Update Status
     */
    public function updateStatus(Request $request)
    {
        $rules = [
            'id' => 'required|integer|exists:users,id',
            'status' => 'required|in:Aktif,Menunggu,Blok'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['user' => $validator->errors()->first()]);
        }

        User::find($request->id)->update([
            'status' => $request->status
        ]);

        return back()->with('message', 'Status Pengguna telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('adminUser')->with('message', 'Pengguna telah berhasil dihapus!');
    }
}
