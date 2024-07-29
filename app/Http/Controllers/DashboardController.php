<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{    
    /**
     * dashboard
     *
     * Show the application dashboard.
     * @return void
     */
    function dashboard()
    {
        $users = User::count();
        return view('dashboard', compact('users'));
    }
}
