<?php

namespace App\Http\Middleware;

use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserRoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $requiredRole): Response
    {
        if (Auth::check()) {
            $requiredRole = ucfirst(strtolower($requiredRole));
            $user = Auth::user()->fresh();
            Auth::setUser($user);

            if (isset($user)) {
                $userRole = UserRole::find($user->role_id)->first()->type;
            } else {
                $userRole = 'Tamu';
            }

            if ($user->status != 'Aktif') {
                return redirect()->route('home')->with('error', 'Unauthorized action.')->setStatusCode(403);
            }

            if ($userRole == $requiredRole) {
                return $next($request);
            }

            return $this->handleUnauthorizedRole($userRole);
        }
        return redirect()->route('home')->with('error', 'Unauthorized action.')->setStatusCode(403);
    }

    /**
     * Redirect to appropriate route based on the role.
     *
     * @param  string  $requiredRole
     * @return \Illuminate\Http\Response
     */
    private function handleUnauthorizedRole($requiredRole): Response
    {
        switch ($requiredRole) {
            case 'Pengurus':
                return redirect()->route('adminDashboard')->with('error', 'Unauthorized action.')->setStatusCode(403);
            case 'Anggota':
                return redirect()->route('userDashboard')->with('error', 'Unauthorized action.')->setStatusCode(403);
            default:
                return redirect()->route('home')->with('error', 'Unauthorized action.')->setStatusCode(403);
        }
    }
}
