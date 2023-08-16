<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create() {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function index(Request $request) {
        $searchQuery = $request->get('search');
        
        if ($searchQuery) {
            $users = User::where('name', 'like', '%' . $searchQuery . '%')
                         ->paginate(5)
                         ->appends(['search' => $searchQuery]);
        } else {
            $users = User::paginate(5);
        }
        
        return view('users.index', compact('users'));
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('user.index')->with('success', 'User information updated successfully.');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user -> delete();

        return redirect()->route('user.index')->with('success', 'User information updated successfully.');
    }
}
