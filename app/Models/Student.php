<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'name', 'surname', 'email', 'phone_number'
    ];

    public $timestamps = false;

    public function classess()
    {
        return $this->belongsToMany('App\Models\Classroom')->withPivot('classroom_id', 'student_id');;
    }
}
