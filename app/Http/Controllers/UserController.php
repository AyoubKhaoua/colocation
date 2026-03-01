<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $colocations = $user->colocations;

        if (Auth::user()->role == 'admin') {
            $usersCount = User::count();
            $colocationsCount = Colocation::count();
            $expensesCount = Expense::count();
            $q = $request->query('q', '');

            $users = User::query();
            if ($q) {
                $users->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            }
            $users = $users->get();

            return view('admin.dashboard', compact('user', 'usersCount', 'colocationsCount', 'expensesCount', 'q', 'users'));
        }
        return view('user.dashboard', compact('user', 'colocations'));
    }
}
