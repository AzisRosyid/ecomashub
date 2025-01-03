<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    private $route = 'userProfile';
    private $types = ['Internal', 'External'];
    private $genders = ['Laki-Laki', 'Perempuan'];
    private $status =  ['Aktif', 'Menunggu', 'Blok'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = $this->route;
        $acc = Auth::user();
        $image = "https://drive.usercontent.google.com/download?id=1Ez08HPljQWbw6XHkZ8t-bEUlxrQeuOrB&export=view";


        return view('user.profile.index', compact('route', 'acc', 'image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $route = $this->route;
        $types = $this->types;
        $status = $this->status;
        $genders = $this->genders;
        $acc = Auth::user();
        $roles = UserRole::all();

        return view('user.profile.edit', compact('route', 'acc', 'types', 'status', 'genders', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword()
    {
        $route = $this->route;
        $acc = Auth::user();

        return view('user.profile.password', compact('route', 'acc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $acc = Auth::user();
        $user = User::find($acc->id);

        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => [
                'required',
                'string',
                'regex:/^[a-z0-9]{16}$/',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'source_type' => 'required|in:Internal,External',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['profile' => $validator->errors()->first()]);
        }

        $password = $request->filled('password') ? Hash::make($request->password) : $user->password;

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
            'source_type' => $request->source_type,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'image' => $image
        ]);

        return redirect()->route('userProfile')->with('message', 'Profil telah berhasil diperbarui!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $acc = Auth::user();
        $user = User::find($acc->id);

        $rules = [
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'new_password_confirmation' => 'required|string|same:new_password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['profile' => $validator->errors()->first()]);
        }

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['profile' => 'The provided old password does not match your current password.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('userProfile')->with('message', 'Password telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
