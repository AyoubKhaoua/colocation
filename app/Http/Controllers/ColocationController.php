<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    public function create()
    {
        dd('ayyayay');
    }
    /* 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:80'],
        ]);

        $colocation = Colocation::create([
            'name' => $validated['name'],

        ]);

        // attach owner as member with role owner
        $colocation->members()->attach(Auth::id(), ['role' => 'owner']);

        return redirect()->route('colocations.show', $colocation);
    }

    public function show(Colocation $colocation)
    {
        // security: only members can open
        abort_unless($colocation->members()->where('users.id', Auth::id())->exists(), 403);

        $colocation->load('members');

        return view('colocations.show', compact('colocation'));
    } */
}
