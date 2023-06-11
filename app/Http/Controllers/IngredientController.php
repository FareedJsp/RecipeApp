<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\IngredientType;

class IngredientController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $ingredient = Ingredient::when($search, function ($query, $search) {

            return $query->where('name', 'like', "%$search%")
                ->orWhere('code', 'like', "%$search%");

        })->paginate(10);

        return view('ingredient.index', compact('ingredient'));
    }

    public function create()
    {
        $ingredientType = IngredientType::get();
        return view('ingredient.create', compact('ingredientType'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ingredient_type_id' => 'required'
        ]);

        $data = $request->all();

        Ingredient::create($data);

        return redirect()->route('ingredient')->with('success', 'Ingredient created successfully.');
    }

    public function edit(Ingredient $ingredient)
    {   
        $ingredientType = IngredientType::get();
        return view('ingredient.edit', compact('ingredient', 'ingredientType'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required',
            'ingredient_type_id' => 'required'
        ]);
    
        $ingredient->update($request->all());

        return redirect()->route('ingredient')->with('success', 'Ingredient updated successfully.');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredient')->with('success', 'Ingredient deleted successfully.');
    }
}
