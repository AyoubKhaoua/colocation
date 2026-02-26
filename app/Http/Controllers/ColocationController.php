<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColocationRequest;
use App\Models\Colocation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class ColocationController extends Controller
{
    public function create()
    {
        return view('colocation.form');
    }
    public function store(StoreColocationRequest $req)
    {
        $colocation = Colocation::create([
            'name' => $req->name,
            'status' => 'active',
        ]);

        $colocation->members()->attach(Auth::id(), [
            'role' => 'owner',
            'joined_at' => now(),
        ]);
        $id = Auth::id();
        $user = User::find($id);
        dd(auth()->user());

        return redirect()->route('user.dashboard');
    }
}
