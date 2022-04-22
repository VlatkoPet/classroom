<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use Redirect, Response;


class ClassroomController extends MainClass
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['classrooms'] = Classroom::orderBy('id', 'desc')->paginate(10);

        return view('pages/classroom', $data);
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
    public function store(Request $request)
    {
        $classroomId = $request->classroom_id;
        $classroom   =   Classroom::updateOrCreate(
            ['id' => $classroomId],
            ['name' => $request->name]
        );

        // return response()->json([
        //     'classroom' => $classroom
        // ]);
        return response()->json($classroom);
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
        $where = array('id' => $id);
        $classroom  = Classroom::where($where)->first();

        // return response()->json([
        //     'classroom' => $classroom
        // ]);
        return response()->json($classroom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $classroomId = $request->classroom_id;
        $classroom   =   Classroom::updateOrCreate(
            ['id' => $classroomId],
            ['name' => $request->name]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_class)
    {
        $classroom = Classroom::where('id', $id_class)->first();

        // return response()->json([
        //     'classroom' => $classroom
        // ]);



        $classroom_student = Classroom::where('id', $id_class)->with('students')->first();

        foreach ($classroom_student->students as $key => $id) {
            $classroom_student->students()->detach($id, [
                'classroom_id' => $id->pivot->classroom_id,
                'student_id' => $id->pivot->student_id,
            ]);
        }

        $classroom_teacher = Classroom::where('id', $id_class)->with('teachers')->first();

        foreach ($classroom_teacher->teachers as $key => $id) {
            $classroom_teacher->teachers()->detach($id, [
                'classroom_id' => $id->pivot->classroom_id,
                'teacher_id' => $id->pivot->student_id,
            ]);
        }

        $classroom->delete();

        return response()->json([
            'student' => $classroom_student
        ]);
    }


    public function getAllClassrooms()
    {

        $data['classrooms'] = Classroom::orderBy('id', 'desc')->paginate(2);

        return view('pages/classroom', $data);
    }
}
