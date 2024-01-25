<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $route = 'authRegister';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'user_role_id' => 'required|string|exists:user_roles,id',
            'source_type' => 'required|in:Internal,External',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits_between:1,15',
            'address' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
            'status' => 'required|in:Aktif,Menunggu,Blok'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->first()], 422);
        }

        if ($request->password != $request->password_confirmation) {
            return response(['errors' => "Konfirmasi Password tidak benar"], 422);
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
            'user_role_id' => $request->user_role_id,
            'source_type' => $request->source_type,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            //    'image' => $request->image
        ]);

        return response()->json(['message' => 'Registrasi telah berhasil!'], 201);
    }
}
