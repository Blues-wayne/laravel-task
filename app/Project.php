<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'name','thumb_img'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
