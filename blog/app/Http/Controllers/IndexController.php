<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Task;
use App\User;
class IndexController extends Controller
{
    public function index()
    {
        
        $task = Task::all();
        $users = User::all();
        return view('index')->with('users',$users)->with('task',$task);
    }

    public function taskstore(Request $request)
    {

        $this->validate($request,[
            'title' => 'required'
      
            

        ]);


        $task = new Task();
        $task-> user_id = Auth::id();
        $task->title = $request->input('title');
        $task->save();

        return redirect('/')->with('status','New Task Created...');
    }

    public function taskdelete($id)
    {

        $tasks = Task::find($id);
        $tasks->delete();

        return redirect('/')->with('status','Task Deleted...');

    }

     public function taskcomplete(Request $request,$id){
        

        $task = Task::find($id);
        $task->is_complete = $request->input('is_complete');
        $task->save();
        return redirect('/')->with('status','Task Completed');

    }
}
