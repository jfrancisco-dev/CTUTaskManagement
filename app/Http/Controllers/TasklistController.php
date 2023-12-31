<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tasklist;

class TasklistController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        $searchQuery = $request->get('search');
        
        if ($searchQuery) {
            $tasklists = Tasklist::where('user_id', $user->id)
                         ->where('name', 'like', '%' . $searchQuery . '%')
                         ->whereNull('deleted_at') 
                         ->paginate(5)
                         ->appends(['search' => $searchQuery]);
        } else {
            $tasklists = $user->tasklists()
                              ->whereNull('deleted_at')
                              ->paginate(5);
        }
        
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

        return redirect()->route('tasklist.index')->with('success', 'Tasklist information updated successfully.');
    }

    public function update(Request $request, $id) {
        $tasklist = Tasklist::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255' . $id,
        ]);

        $tasklist->name = $request->input('name');
        $tasklist->desc = $request->input('desc');

        $tasklist->save();

        return redirect()->route('tasklist.index')->with('success', 'Tasklist information updated successfully.');
    }

    public function softDeleteTasklist($user_id)
    {
        $tasklist = Tasklist::find($user_id);
        $tasklist->delete();
    }
}
