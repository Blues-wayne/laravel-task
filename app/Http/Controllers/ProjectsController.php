<?php

namespace App\Http\Controllers;
use App\Http\Requests\EditProjectRequest;
use App\Project;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Repostaries\ProjectRepository;
use App\Http\Requests\CreateProjectRequest;
//use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Redirect;
use Auth;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repo;
    public function __construct(ProjectRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }

    public function index()
    {
        //
        return Redirect::back();
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
    public function store(CreateProjectRequest $request)
    {
        $this->repo->newProject($request);
        return Redirect::back();
//        $request->user()->projects()->create([
//            'name'=>$request->name,
//            'thumb_img'=>$this->thumb_img($request)
//        ]);

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
//        dd($id);
//        $user = DB::delete('delete from users where id=?',[2]);
//        dd($user);
        $project = Auth::user()->projects()->where('id',$id)->first();
        $toDo = $project->tasks()->where('completed',0)->get();
        $Done = $project->tasks()->where('completed',1)->get();
        $projects = Auth::user()->projects()->pluck('name','id');
        return view('projects/show',compact('project','toDo','Done','projects'));
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
    public function update(EditProjectRequest $request, $id)
    {
        //
        $this->repo->updateProject($request,$id);
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
        Project::find($id)->delete();
        return Redirect::back();
    }
}
