<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
class PagesController extends Controller
{
    public function index(){
        $tasks = Task::all();
        foreach($tasks as $task){
          if($task->deadline < Carbon::today()&& $task->status === "ongoing"){
              $task->status = "Deadline not met";
              $task->save();
          }elseif($task->deadline >= Carbon::today()&& $task->status === "Deadline not met"){
              $task->status = "ongoing";
              $task->save();
          }

        }

        return view('index')->with('tasks' , $tasks);
    }

    public function filterTasks($id){
     
        switch($id){
          case 'all':
               $tasks = Task::all();
               break;
         case 'ongoing':
               $tasks = Task::all()->where('status', 'ongoing');
               break;
         case 'completed':
               $tasks = Task::all()->where('status','completed');              
               break;
        case 'deadlineNotMet' :
              $tasks = Task::all()->where('status','Deadline not met');
              break;
        }

        return view('index')->with('tasks',$tasks);

    }

    public function search(Request $request){
        $search = $request->input('task');
        $tasks = Task::where('taskname','LIKE','%'.$search.'%')->orWhere('taskassignedto','LIKE','%'.$search.'%')->orWhere('taskassignedby','LIKE','%'.$search.'%')->get();
        if(count($tasks)>0)
        return view('index')->with('tasks',$tasks);
        else
        return view('tasks.search');
    }

    public function addTask(){
        return view('tasks.addtask');
    }

    public function storetask(Request $request){
        $task = new Task;
        $task->taskname = $request->input('taskname');
        $task->taskdesc = $request->input('taskdesc');
        $task->taskassignedto = $request->input('taskassignedto');
        $task->taskassignedby = $request->input('taskassignedby');
        $task->deadline = $request->input('deadline');
        $task->status = "ongoing";
        $task->subtasks = $request->input('subtasks');
        $task->taskassignedon = Carbon::now();
        $task->save();
        return redirect('/')->with('Success','Task Successfully Added');
    }

    public function showTask($id){
        $task = Task::find($id);
        return view('tasks.showtask')->with('task',$task);
    }
     
    public function changestatus($id,$status){
        $task = Task::find($id);
        $task->status = $status;
        $task->save();
        return redirect('/')->with('Success', 'Task Status Updated');
    }

    public function editTask($id){
       $task = Task::find($id);
       return view('tasks.edittask')->with('task',$task);

    }

    public function updateTask(Request $request,$id){
        $task = Task::find($id);
        $task->deadline = $request->input('deadline');
        $task->save();
        return redirect('/')->with('Success', 'Task Timeline Updated');
 
     }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/')->with('Success', 'Task Deleted');
    }
}
