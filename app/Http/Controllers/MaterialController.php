<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    //Display a listing of the materials.
    public function index()
    {
        $materials = Material::with('category')->get();
        return view('materials.index', compact('materials'));
    }


    //Show the form for creating a new material.
    public function create()
    {
        $categories = Category::all();
        return view('materials.create', compact('categories'));
    }


    //Store a newly created material in the database.
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|unique:materials,name',
            'opening_balance' => 'required|numeric',
        ]);

        Material::create($request->all());

        return redirect()->route('materials.index');
    }

    //Show the form for editing the specified material.
    public function edit(Material $material)
    {
        $categories = Category::all();
        return view('materials.edit', compact('material', 'categories'));
    }


    //Update the specified material in the database.
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|unique:materials,name,' . $material->id,
            'opening_balance' => 'required|numeric',
        ]);

        $material->update($request->all());

        return redirect()->route('materials.index');
    }

    //Remove the specified material from the database.
    public function destroy(Material $material)
    {
        // Delete related transactions first
        $material->transactions()->delete();

        // Then delete the material
        $material->delete();

        return redirect()->route('materials.index');
    }
}
