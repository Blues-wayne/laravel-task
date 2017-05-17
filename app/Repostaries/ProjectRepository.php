<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/5/9
 * Time: 17:16
 */
namespace App\Repostaries;
use Image;
use App\Project;
class ProjectRepository
{
    public function newProject($request)
    {
        $request->user()->projects()->create([
        'name'=>$request->name,
        'thumb_img'=>$this->thumb_img($request)
        ]);
    }
    public function thumb_img($request)
    {
        if($request->hasFile('thumb_img')) {
            $file = $request->thumb_img;
            $name = str_random(10) . '.jpg';
            $path = public_path() . "/thumb_img/" . $name;
            Image::make($file)->resize(200, 100)->save($path);
            return $name;
        }
    }
    public function updateProject($request,$id){
        $project = Project::findorfail($id);
        $project->name = $request->name;
        if($request->hasFile('thumb_img')) {
            $project->thumb_img = $this->thumb_img($request);
            }
        $project->save();
    }
}