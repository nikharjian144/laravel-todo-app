<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * @return [type]
     */
    public function index() {
        $tasks = Task::where("iscompleted", false)->orderBy("id", "DESC")->get();
        $completed_tasks = Task::where("iscompleted", true)->get();
        return view("tasks", compact("tasks", "completed_tasks"));
    }

    /**
     * @param Request $request
     * 
     * @return [type]
     */
    public function store(Request $request) {
        $input = $request->all();
        $task = new Task();
        $task->task = request("task");
        $task->iscompleted = false;
        $task->save();
        return Redirect::back()->with("message", "Task has been added");
    }
    
    /**
     * @param int $id
     * 
     * @return [type]
     */
    public function complete(int $id) {
        $task = Task::find($id);
        $task->toggleComplete();
        $task->save();
        return Redirect::back()->with("message", "Task has been added to completed list");
    }

    /**
     * @param int $id
     * 
     * @return [type]
     */
    public function inComplete(int $id) {
        $task = Task::find($id);
        $task->toggleComplete();
        $task->save();
        return Redirect::back()->with("message", "Task has been removed to completed list");
    }
        
    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public function destroy(int $id) {
        $task = Task::find($id);
        $task->delete();
        return Redirect::back()->with('message', "Task has been deleted");
    }
}
