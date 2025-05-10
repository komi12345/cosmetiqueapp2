<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            // For regular users, redirect to the Breeze default dashboard or a specific user dashboard route
            // Assuming 'dashboard' is the name of the Breeze default dashboard route
            return redirect()->route('dashboard'); // This will be the Breeze dashboard
        }
        // If not authenticated, redirect to login
        return redirect()->route('login');
    }
}