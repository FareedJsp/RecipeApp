<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Measurement;
use Illuminate\Http\Request;
use App\Models\IngredientType;

class IngredientController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $ingredient = Ingredient::when($search, function ($query, $search) {

            return $query->where('name', 'like', "%$search%");

        })->paginate(10);

        return view('ingredient.index', compact('ingredient'));
    }

    public function create()
    {
        $ingredientType = IngredientType::get();
        $measurement = Measurement::get();
        return view('ingredient.create', compact('ingredientType', 'measurement'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ingredient_type_id' => 'required'
        ]);

        $data = $request->all();

        $ingredient = Ingredient::create($data);

        if ($request->has('measurement')) {
            $ingredient->measurements()->sync($request->measurement);
        }

        return redirect()->route('ingredient')->with('success', 'Ingredient created successfully.');
    }

    public function edit(Ingredient $ingredient)
    {   
        $ingredientType = IngredientType::get();
        $measurement = Measurement::get();
        return view('ingredient.edit', compact('ingredient', 'ingredientType', 'measurement'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required',
            'ingredient_type_id' => 'required'
        ]);
    
        $ingredient->update($request->all());

        if ($request->has('measurement')) {
            $ingredient->measurements()->sync($request->measurement);
        }

        return redirect()->route('ingredient')->with('success', 'Ingredient updated successfully.');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredient')->with('success', 'Ingredient deleted successfully.');
    }
}
