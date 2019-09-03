<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('done', '<>', '1')->get();

        return response()->json($tasks, 200);
    }

    public function create(Request $request)
    {
        if (!$request->has('description')) {
            return response()->json('Field description doesn\'t have a default value', 400);
        }

        $tarefa = new Task();

        $tarefa->description = $request->input('description');
        $tarefa->done = false;

        $tarefa->save();

        return response()->json($tarefa, 200);
    }

    public function done($id)
    {
        $tarefa = Task::find($id);

        $tarefa->done = true;

        $tarefa->save();

        return response()->json($tarefa, 200);
    }

    public function delete($id)
    {
        $tarefa = Task::find($id);

        $tarefa->delete();

        return response()->json($tarefa, 200);
    }
}
