<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password']
        ]);

        Auth()->user()->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->route ('user.show', Auth()->user())->with('success', 'Password has been updated successfully.');
    }
}
