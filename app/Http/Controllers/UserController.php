<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $colocations = $user->colocations;

        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard', compact('user'));
        }
        return view('user.dashboard', compact('user', 'colocations'));
    }
}
