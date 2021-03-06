<?php

namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //public function __construct(){
    //    $this->middleware('auth');
   // } inside the resource controller we can make a authentication like this
    public function index(){
        $todos = Todo::orderBy('completed')->get();
        return view('todos.index')->with(['todos'=>$todos]);
    }
    public function create(){
        return view('todos.create');
    }
    public function edit(Todo $todo){
       // we have used route model binding !!
        return view('todos.edit',compact('todo'));
    }
    public function store(Request $request){

       $request->validate([
          'title' =>'required|max:255',
       ]);
        Todo::create($request->all());
        return redirect()->back()->with('message','Todo Created Successfully!!');
    }
    public function update(Request $request,Todo $todo){
        $todo->update(['title'=>$request->title]);
        return redirect()->back()->with('message','Your Todo Task is Updated Successfully');
    }
    public function complete(Todo $todo){
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Task Marked As Completed');
    }
    public function undo(Todo $todo){
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message','Task Marked As Incompleted');
    }
    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message','Task Deleted');
    }
}
