<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //Display a listing of the categories.
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    //Show the form for creating a new category.
    public function create()
    {
        return view('categories.create');
    }


    //Store a newly created category in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index');
    }

    //Show the form for editing the specified category.
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }


    //Update the specified category in the database.
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    // Remove the specified category from the database.
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}