<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\Models\ToDo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $todos = ToDo::orderBy('updated_at','desc')->paginate(20);
        return view('index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToDoRequest $request)
    {
        $data = $request->validated();
        if(ToDo::create($data)){
            return redirect()->route('todos.index')->with(['success-message'=>'ToDo created successfully']);
        }else{
            return redirect()->route('todos.create')->with(['error-message'=>'Error creating a todo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ToDo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $todo): View 
    {
        return view('edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ToDo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(ToDoRequest $request, ToDo $todo)
    {
        $data = $request->validated();
        if($todo->update(['end_at'=>$data['end_at'],'todo_text'=>$data['todo_text']])){
            return redirect()->route('todos.index')->with(['success-message'=>'ToDo updated successfully']);
        }else{
            return redirect()->route('todos.create')->with(['error-message'=>'Error updating todo']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ToDo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $todo)
    {
        if($todo->delete()){
            return redirect()->route('todos.index')->with(['success-message'=>'ToDo deleted successfully']);
        }else{
            return redirect()->route('todos.create')->with(['error-message'=>'Error deleting todo']);
        }
    }
}
