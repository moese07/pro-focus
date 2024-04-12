<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Add the missing import statement
use App\Models\Subtask; // Add the missing import statement
use App\Models\User; // Add the missing import statement

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'due_date' => 'required',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_id = auth()->id();
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'due_date' => 'required',
        ]);

        $task = Task::find($id);

        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function status(Request $request, $id)
    {


        $task = Task::find($id);
        $task->status = $request->status == 'on' ? 1 : 0;
        $task->save();

        return redirect()->route('tasks.index');
    }
}
