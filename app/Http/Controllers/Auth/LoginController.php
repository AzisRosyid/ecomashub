<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $route = 'authLogin';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $route = $this->route;

        return view('auth.login', compact('route'));
    }

    /**
     * Login a User
     */
    public function login(Request $request)
    {
        $rules = [
            'user' => 'required|string',
            'password' => 'required|string',
            'remember' => 'nullable',
        ];

        $messages = [
            'user.required' => 'Username/Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput($request->except('password'))->withErrors(['login' => $validator->errors()->first()]);
        }

        $remember = $request->has('remember') ? true : false;

        $valid = User::where('username', $request->user)->orWhere('email', $request->user)->first();

        if (!$valid || !Hash::check($request->password, $valid->password)) {
            return back()->withInput($request->except('password'))->withErrors(['login' => 'Username, Email, atau Password tidak benar.']);
        }

        if ($valid->status != 'Aktif') {
            return redirect()->route('home')->with('error', 'Unauthorized action.')->setStatusCode(403);
        }

        Auth::login($valid, $remember);

        return redirect()->route('login')->with('message', 'Login telah berhasil!');
    }
}
