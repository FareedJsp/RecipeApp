<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

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
        return view('ingredient.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->all();

        Ingredient::create($data);

        return redirect()->route('ingredient')->with('success', 'Ingredient created successfully.');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredient.edit', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required'
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
