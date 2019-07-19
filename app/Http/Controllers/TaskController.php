<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth() ->user()->id;
        $tasks = Task::where('author_id' , $user_id)->paginate(5);
        return view('task.index' , [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => auth()->user()->id,
            'status' => 0
        ]);
        return redirect()-> route('task.index');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index');
    }

    public function update($id) 
    {
        $task = Task::findOrFail($id);
        $task->status = $task->status === 0 ? 1 : 0;
        $task->save();
        return [
            'status' => $task->status
        ];
    }
}
