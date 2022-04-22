<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Student;


class AdminController extends MainClass
{
    public function testStudents()
    {
        $test = Classroom::with('students')->get();
        return $test;
    }
    public function testTeachers()
    {
        $test = Classroom::with('teachers')->get();
        return $test;
    }

    public function testteachersclassess()
    {
        $test = Teacher::with('classess')->get();
        return $test;
    }
    public function teststudentclassess()
    {
        $test = Student::with('classess')->get();
        return $test;
    }

    public function getAllClassrooms()
    {
        // $classrooms = 'asdsa0';
        $data['classrooms'] = Classroom::with('teachers', 'students')->paginate(5);
        return view('pages/dashboard', $data);
    }

    public function getAllClassroomstest()
    {
        // $classrooms = 'asdsa0';
        $data['classrooms'] = Classroom::with('teachers', 'students')->paginate(5);
        return $data;
    }


    public function getTeachersClassrooms()
    {
        $test = $this->getTeacherAllClassrooms();
        return $test;
    }
}
