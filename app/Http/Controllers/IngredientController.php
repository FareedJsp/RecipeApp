<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ingredient;
use App\Models\Measurement;
use Illuminate\Http\Request;
use App\Models\IngredientType;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');
        $ingredientType = $request->input('ingredientType');

        $ingredients = Ingredient::when($search, function ($query, $search) {

            return $query->where('name', 'like', "%$search%")
            ->orWhereHas('measurements', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
                });
            })
            ->when($ingredientType, function ($query, $ingredientType) {
                return $query->where('ingredient_type_id', $ingredientType);
            })->paginate(10);

        $ingredientTypes = IngredientType::get();

        return view('ingredient.index', compact('ingredients', 'ingredientTypes'));
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
        $data['user_id'] = Auth::id();

        $ingredient = Ingredient::create($data);

        if ($request->has('measurement')) {
            $ingredient->measurements()->sync($request->measurement);
        }

        return redirect()->route('ingredient')->with('success', 'Ingredient created successfully.');
    }

    public function edit(Ingredient $ingredient)
    {   
        $this->authorize('edit', $ingredient);

        $ingredientType = IngredientType::get();
        $measurement = Measurement::get();
        return view('ingredient.edit', compact('ingredient', 'ingredientType', 'measurement'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $this->authorize('update', $ingredient);

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
        $this->authorize('delete', $ingredient);

        $ingredient->delete();

        return redirect()->route('ingredient')->with('success', 'Ingredient deleted successfully.');
    }
}
