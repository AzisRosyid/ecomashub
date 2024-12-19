<?php

namespace App\Http\Controllers\Admin\Unit;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserRoleController extends Controller
{
    private $route = 'adminUserRole';
    private $types = ['Pengurus', 'Anggota'];

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();

        return Method::view('admin.user.unit.create', compact('route', 'acc', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'type' => 'required|in:Pengurus,Anggota',
            'name_type_combination' => Rule::unique('user_roles')->where(function ($query) {
                return $query->where('name', request()->input('name'))->where('type', request()->input('type'));
            })
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['unit' => $validator->errors()->first()]);
        }

        UserRole::create([
            'organization_id' => Auth::user()->userRole->organization->id,
            'name' => $request->name,
            'type' => $request->type
        ]);

        return redirect()->route('adminUser')->with('message', 'Peran Anggota telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRole $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRole $role)
    {
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();

        return Method::view('admin.user.unit.edit', compact('route', 'acc', 'types', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRole $role)
    {
        $rules = [
            'name' => 'required|string',
            'type' => 'required|in:Pengurus,Anggota',
            'name_type_combination' => Rule::unique('user_roles')->where(function ($query) use ($role) {
                return $query->where('name', request()->input('name'))->where('type', request()->input('type'))
                    ->whereNotIn('id', [$role->id]);
            })
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['unit' => $validator->errors()->first()]);
        }

        $role->update($request->all());

        return redirect()->route('adminUser')->with('message', 'Peran Anggota telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRole $role)
    {
        $role->delete();

        return redirect()->route('adminUser')->with('message', 'Peran Anggota telah berhasil dihapus!');
    }
}
