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
    public function toggleBlock(User $user)
    {


        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        // prevent admins from blocking themselves
        if (Auth::id() === $user->id) {
            return back()->with('error', "You can't change your own status.");
        }

        // disallow blocking another admin for safety
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot block another admin.');
        }

        $user->update(['is_blocked' => !$user->is_blocked]);

        return back()->with('success', 'User status updated');
    }
}
