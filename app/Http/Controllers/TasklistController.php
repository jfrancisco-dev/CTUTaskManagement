<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasklist;

class TasklistController extends Controller
{
    public function index() {
        $tasklists = Tasklist::all();
        return view('tasklists.index', compact('tasklists'));
    }

    public function create() {
        return view('tasklists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:225',
        ]);

        $user = auth()->user(); // Assuming you're using Laravel's built-in authentication
        
        $tasklist = new Tasklist([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
        ]);

        $user->tasklists()->save($tasklist); // Assuming you have a relationship named 'tasklists' in User model

        return redirect()->route('tasklist.index')->with('success', 'Tasklist created successfully.');
    }

    public function show($id) {
        $tasklist = Tasklist::findOrFail($id);
        return view('tasklists.show', compact('tasklist'));
    }

    public function edit($id) {
        $tasklist = Tasklist::findOrFail($id);
        return view('tasklists.edit', compact('tasklist'));
    }

    public function destroy($id) {
        $tasklist = Tasklist::findOrFail($id);
        $tasklist -> delete();

        return redirect()->route('tasklist.index')->with('success', 'User information updated successfully.');
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
}
