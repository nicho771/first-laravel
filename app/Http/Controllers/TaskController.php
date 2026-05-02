<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // READ (tampilkan semua data)
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // FORM CREATE
    public function create()
    {
        return view('tasks.create');
    }

    // SIMPAN DATA (CREATE)
    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('/tasks');
    }

    // FORM EDIT
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('/tasks');
    }

    // DELETE DATA
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks');
    }
}