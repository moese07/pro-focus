<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subtask;
use App\Models\Task;

class SubtaskController extends Controller
{
    //Subtasks
    public function index()
    {
        $subtasks = Subtask::all();
        return view('tasks.edit')->with('subtasks', $subtasks);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subtask = new Subtask();
        $subtask->name = $request->name;
        $subtask->description = $request->description;
        $subtask->task_id = Task::find($id)->id;
        $subtask->user_id = auth()->id();
        $subtask->save();

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $subtask = Subtask::find($id);
        return view('tasks.edit')->with('subtask', $subtask);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subtask = Subtask::find($id);

        $subtask->name = $request->name;
        $subtask->description = $request->description;
        $subtask->save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $subtask = Subtask::find($id);
        $subtask->delete();
        return redirect()->route('tasks.index');
    }

    public function status(Request $request, $id)
    {
        $subtask = Subtask::find($id);
        $subtask->status = $request->status == 'on' ? 1 : 0;
        $subtask->save();

        return redirect()->route('tasks.index');
    }
}

