<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $usersCount = User::count();
        $colocationsCount = Colocation::count();
        $expensesCount = Expense::count();

        return view('admin.dashboard', compact(
            'usersCount',
            'colocationsCount',
            'expensesCount'
        ));
    }
}
