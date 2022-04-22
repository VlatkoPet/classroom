<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Student;
use Redirect, Response;

class MainClass extends Controller
{

    // gi vrakja site ucilnici
    public function getAllClassrooms()
    {

        $all_classrooms = Classroom::all();
        return $all_classrooms;
    }

    // gi vrakja site uciteli zaedno so nivnite ucilnici
    public function getTeacherAllClassrooms()
    {

        $all_classrooms = Teacher::with('classess')->get();
        return $all_classrooms;
    }

    // gi vrakja site studenti zaedno so nivnite ucilnici
    public function getStudentsAllClassrooms()
    {

        $all_classrooms = Student::with('classess')->get();
        return $all_classrooms;
    }
}
