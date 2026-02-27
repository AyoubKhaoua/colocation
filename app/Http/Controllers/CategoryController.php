<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $colocation = Auth::user()->colocations->first();
        if (!$colocation) {
            return redirect()->route('user.dashboard')
                ->with('error', 'You need to create a colocation first');
        }

        $categories = $colocation->categories;

        return view('categories.index', compact('colocation', 'categories'));
    }
    public function create(Colocation $colocation)
    {


        return view('categories.index', compact('colocation'));
    }

    public function store(StoreCategoryRequest $req, Colocation $colocation)
    {

        $colocation->categories()->create($req->validated());

        return redirect()->route('index.categorie', $colocation)
            ->with('success', 'Category created successfully');
    }

    public function destroy(Category $category)
    {
        $colocation = $category->colocation;
        $category->delete();

        return redirect()->route('index.categorie', $colocation)
            ->with('success', 'Category deleted successfully');
    }
}
