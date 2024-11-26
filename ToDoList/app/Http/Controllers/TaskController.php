<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Task;
use App\Models\Category;




class TaskController extends Controller
{
    
    public function index($id){
        $tasks=Task::where('category_id','=',$id)
        ->orderBy('completed','asc')
        ->orderBy('id','desc')->get();
        return view('/tasks/index',['tasks'=>$tasks]);
    }
   
    public function create(){
        $categories=Category::all();
        return view('/tasks/create',['categories'=>$categories]);    
    }
   
   
    public function store(){
        $tasks=request()->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'category_id' => 'required',
        ]);
       $tasks=Task::create([
           'user_id' =>request('user_id'),
           'title' => request('title'),
           'description' => request('description'),
           'due_date' => request('due_date'),
           'category_id' => request('category_id'),

       ]);

        return redirect('/tasks/index/'.$tasks->category_id);

    }  

    public function update($id){
       $tasks=Task::where('id','=',$id)->first();
       $tasks->completed=1;
       $tasks->save();
       

        return redirect('/tasks/index/');
    }

    public function delete($id){
        $task=Task::where('id','=',$id)->first();
         $task->delete();
        
        return redirect('/tasks/index');
    }
   
   
    public function logout(Request $request): RedirectResponse
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
    }
}
