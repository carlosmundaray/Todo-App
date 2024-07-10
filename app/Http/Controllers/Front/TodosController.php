<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Todo;
class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        // return view('front.index', ['todos' => $todos]);
        // return view('front.index')->with('todos' , $todos);
        return view('front.index', compact('todos'));
    }// End Of index

    public function show(Todo $todo)
    {
      return view('front.show', compact('todo'));

    }// End Of Show

    public function create()
    {
        return view('front.create');
    }// End OF Create

    public function store(Request $request)
    {
       $todo = $request->validate([
          'title' => 'required|string|max:50',
          'description' => 'required|string|max:191'
      ]);

        //   return $request->input('title');
        // return $request->title;
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();
        $request->session()->flash('success', 'Todo Created Successfuly');
        return redirect(route('todo'));
    }// End Of Store

    public function edit(Todo $todo)
    {
        // return $todo;
        return view('front.edit', compact('todo'));
    }// End Of Edit

    public function update(Request $request ,Todo $todo)
    {
        $this->validate($request ,[
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:191'
        ]);
        $todo->title = $request->get('title');
        $todo->description = $request->get('description');
        $todo->save();
        $request->session()->flash('success', 'Todo Update Successfuly');

        return redirect(route('todo'));

    }// End Of Update

    public function destroy(Todo $todo)
    {
      $todo->delete();
      return redirect(route('todo'));

    }// End Of Destroy

    public function complete(Todo $todo)
    {
       $todo->completed = true;

       $todo->save();

       session()->flash('success', 'Todo Completed Successfuly');

        return redirect(route('todo'));
    }// End Completed

}// End Of Controller
