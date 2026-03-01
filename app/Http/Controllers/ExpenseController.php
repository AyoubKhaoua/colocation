<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Colocation;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{

    public function index(Colocation $colocation)
    {
        // security: user must be member
        abort_unless($colocation->members()->where('users.id', Auth::id())->exists(), 403);

        $expenses = $colocation->expenses()
            ->with(['payer', 'category'])
            ->latest()
            ->get();

        $members = $colocation->members()->get();
        $categories = $colocation->categories()->latest()->get();

        return view('expenses.index', compact('colocation', 'expenses', 'members', 'categories'));
    }

    public function store(StoreExpenseRequest $req, Colocation $colocation)
    {
        abort_unless($colocation->members()->where('users.id', Auth::id())->exists(), 403);

        Expense::create([
            'colocation_id' => $colocation->id,
            'title' => $req->title,
            'amount' => $req->amount,
            'category_id' => $req->category_id,
            'payer_colocationuser_id' => $req->payer_colocationuser_id,

        ]);

        return redirect()
            ->route('expenses.index', $colocation)
            ->with('success', 'expense added');
    }
}
