<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $route = 'authRegister';
    private $genders = ['Laki-Laki', 'Perempuan'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $route = $this->route;
        $genders = $this->genders;

        return view('auth.register', compact('route', 'genders'));
    }

    /**
     * Register a new User
     */
    public function register(Request $request)
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['register' => $validator->errors()->first()]);
        }

        if ($request->password != $request->password_confirmation) {
            return back()->withInput($request->all())->withErrors(['register' => "Konfirmasi Password tidak benar"]);
        }

        // $file = null;
        // if ($request->file('photo') != null) {
        //     $photo = $request->file('photo')->getClientOriginalExtension();
        //     $file = Carbon::now()->format('Y_m_d_His') . '_' . $request->name . '.' . $photo;
        //     $request->file('photo')->move('images', $file);
        // }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'source_type' => 'External',
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => 'Menunggu'
            //    'image' => $request->image
        ]);

        return redirect()->route('login')->with('message', 'Registrasi telah berhasil!');
    }
}
