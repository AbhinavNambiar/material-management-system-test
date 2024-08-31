<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialTransaction;
use Illuminate\Http\Request;

class MaterialTransactionController extends Controller
{
    //Show the form for creating a new material transaction.
    public function create()
    {
        $materials = Material::all();
        return view('material_transactions.create', compact('materials'));
    }


    //Store a newly created material transaction in the database.
    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'date' => 'required|date',
            'quantity' => 'required|numeric',
        ]);

        MaterialTransaction::create($request->all());

        return redirect()->route('materials.index');
    }
}