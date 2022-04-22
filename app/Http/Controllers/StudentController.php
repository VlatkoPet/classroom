<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Redirect, Response;

class StudentController extends MainClass
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::orderBy('id', 'desc')->paginate(10);
        $data['getAllClassrooms'] = $this->getAllClassrooms();
        return view('pages/student', $data);
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
        $studentId = $request->student_id;

        $input = $request->all();
        if ($request->has('selected_classroom')) {
            $classroom_student = $input['selected_classroom'];
        }

        $student   =   Student::updateOrCreate(
            ['id' => $studentId],
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'phone_number' => $request->phone_number
            ]
        );

        if ($this->checkOldClassess($student->id)) {
            $first = $this->deleteOldClasses($student->id);
        }

        if ($request->has('selected_classroom')) {
            foreach ($classroom_student as $key => $id) {
                $student->classess()->attach($id, [
                    'classroom_id' => $id,
                    'student_id' => $student->id,
                ]);
            }
        }

        return response()->json($student);
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
        $student  = Student::where($where)->with('classess')->first();

        return response()->json($student);
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
        $studentId = $request->student_id;
        $student   =   Student::updateOrCreate(
            ['id' => $studentId],
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'phone_number' => $request->phone_number
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $student = Student::where('id', $id)->with('classess')->first();

        foreach ($student->classess as $key => $id) {
            $student->classess()->detach($id, [
                'classroom_id' => $id->pivot->classroom_id,
                'student_id' => $id->pivot->student_id,
            ]);
        }

        $student->delete();

        return response()->json([
            'student' => $student
        ]);
    }


    public function deleteOldClasses($id)
    {

        $student = Student::where('id', $id)->with('classess')->first();

        foreach ($student->classess as $key => $id) {
            $student->classess()->detach($id, [
                'classroom_id' => $id->pivot->classroom_id,
                'student_id' => $id->pivot->student_id,
            ]);
        }

        return $student;
    }

    public function checkOldClassess($id)
    {
        $student = Student::where('id', $id)->with('classess')->first();
        $count = $student->classess;
        return (count($count));
    }
}
