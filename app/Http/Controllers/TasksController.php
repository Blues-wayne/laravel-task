<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use Illuminate\Http\Request;
use App\Task;
use Redirect;
use Auth;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $toDo = Auth::user()->tasks()->where('completed',0)->paginate(2);
        $Done = Auth::user()->tasks()->where('completed',1)->paginate(2);
        $projects = Auth::user()->projects()->pluck('name','id');
        return view('tasks/index',compact('toDo','Done','projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
        //
        Task::create([
            'title'=>$request->title,
            'project_id'=>$request->project_id
        ]);
        return Redirect::back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTaskRequest $request, $id)
    {
        //
//        dd($request);
        $task = Task::findorfail($id);
        $task->title = $request->title;
        $task->project_id = $request->projectList;
        $task->save();
        return Redirect::back();
    }

    public function check($id)
    {
        $task = Task::findorfail($id);
        $task->completed = 1;
        $task->save();
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Task::find($id)->delete();
        return Redirect::back();
    }
    

}
