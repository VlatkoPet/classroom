<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $fillable = ['name'];
    public $timestamps = false;



    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher');
    }
}
