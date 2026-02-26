<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;

class ColocationController extends Controller
{
    public function create()
    {
        return redirect()->route('show.form');
    }
    public function store(Request $req) {}
}
