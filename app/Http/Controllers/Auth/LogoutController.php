<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Logout a User
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('message', 'Logout telah berhasil!');
    }
}
