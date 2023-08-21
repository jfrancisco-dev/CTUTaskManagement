<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show() {
        return view("profiles.show");
    }

    public function edit() {
        return view("profiles.edit");
    }

    public function update(Request $request) { 
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'User information updated successfully.');
    }     
}
