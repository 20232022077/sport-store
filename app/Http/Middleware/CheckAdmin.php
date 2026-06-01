<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Please login to access the admin panel.');
        }

        $user  = Auth::user();
        $roles = $user->roles;

        foreach ($roles as $role) {
            if ($role->title === 'Admin') {
                return $next($request);
            }
        }

        Auth::logout();

        return redirect()->route('admin.login')->with('error', 'You do not have permission to access this area.');
    }
}
