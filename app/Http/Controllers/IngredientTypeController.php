<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngredientType;

class IngredientTypeController extends Controller
{
    public function index(){

        $ingredientType = IngredientType::get();
        return view('ingredientType.index',compact('ingredientType'));
    }

    public function create(){

        return view('ingredientType.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();

        IngredientType::create($data);

        return redirect()->route('ingredientType')->with('success', 'Ingredient Type has been created successfully.');
    }

    public function edit(IngredientType $ingredientType)
    {
        return view('ingredientType.edit', compact('ingredientType'));
    }

    public function update(Request $request, IngredientType $ingredientType)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
    
        $ingredientType->update($request->all());

        return redirect()->route('ingredientType')->with('success', 'Ingredient Type updated successfully.');
    }

    public function destroy(IngredientType $ingredientType)
    {
        $ingredientType->delete();

        return redirect()->route('ingredientType')->with('success', 'Ingredient Type deleted successfully.');
    }

}
