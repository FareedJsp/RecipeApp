<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function viewDashboard(){

        $userCount = User::count();
        $ingredientCount = Ingredient::count();

        return view('dashboard', compact('userCount', 'ingredientCount'));
    }
}
