<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tasklist;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        $searchQuery = $request->get('search');
    
        if ($searchQuery) {
            $tasks = Task::whereHas('tasklist', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('name', 'like', '%' . $searchQuery . '%')
            ->whereNull('deleted_at')
            ->paginate(5)
            ->appends(['search' => $searchQuery]);
        } else {
            $tasks = Task::whereHas('tasklist', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->whereNull('deleted_at')
            ->paginate(5);
        }
    
        return view('tasks.index', compact('tasks'));
    }    
    
    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:225',
        ]);
    
        // Assuming you have a one-to-many relationship between User and Tasklist
        $tasklist = auth()->user()->tasklists->first(); // Use first() to get the first tasklist
    
        $task = new Task([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
        ]);
    
        $tasklist->tasks()->save($task);
    
        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }    

    public function show($id) {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id) {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Task information updated successfully.');
    }

    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
        ]);

        $task->name = $request->input('name');
        $task->desc = $request->input('desc');

        $task->save();

        return redirect()->route('task.index')->with('success', 'Task information updated successfully.');
    }

    public function softDeleteTasklist($tasklist_id)
    {
        $tasklist = Tasklist::find($tasklist_id);
        $tasklist->delete();
    }
}