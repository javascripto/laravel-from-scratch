<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        // $tasks = DB::table('tasks')->get();
        // $tasks = Task::incompleted(); // custom static metod with query
        // $tasks = Task::completed(false)->get(); // query scope
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        // Route::get('/tasks/{id}', function(int $id) {
        // $task = DB::table('tasks')->find($id);
        // $task = Task::find($id);
        return view('tasks.show')->with(compact('task'));
    }
}
