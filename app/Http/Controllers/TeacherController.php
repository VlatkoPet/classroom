<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Redirect, Response;

class TeacherController extends MainClass
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teachers'] = Teacher::orderBy('id', 'desc')->paginate(10);
        $data['getAllClassrooms'] = $this->getAllClassrooms();
        return view('pages/teacher', $data);
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
        $teacherId = $request->teacher_id;
        $input = $request->all();
        // return  $input;

        if ($request->has('selected_classroom')) {
            $classroom_teacher = $input['selected_classroom'];
        }

        $teacher   =   Teacher::updateOrCreate(
            ['id' => $teacherId],
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'phone_number' => $request->phone_number
            ]
        );

        if ($this->checkOldClassess($teacher->id)) {
            $first = $this->deleteOldClasses($teacher->id);
        }
        if ($request->has('selected_classroom')) {
            foreach ($classroom_teacher as $key => $id) {

                $teacher->classess()->attach($id, [
                    'classroom_id' => $id,
                    'teacher_id' => $teacher->id,
                ]);
            }
        }
        return response()->json($teacher);
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
        $teacher  = Teacher::where($where)->with('classess')->first();
        // $teacher = $teacher->with('classess');

        return response()->json($teacher);
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
        $teacherId = $request->teacher_id;
        $teacher   =   Teacher::updateOrCreate(
            ['id' => $teacherId],
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
        $teacher = Teacher::where('id', $id)->with('classess')->first();

        foreach ($teacher->classess as $key => $id) {
            $teacher->classess()->detach($id, [
                'classroom_id' => $id->pivot->classroom_id,
                'teacher_id' => $id->pivot->teacher_id,
            ]);
        }

        $teacher->delete();

        return response()->json([
            'teacher' => $teacher
        ]);
    }


    public function deleteOldClasses($id)
    {

        $teacher = Teacher::where('id', $id)->with('classess')->first();

        foreach ($teacher->classess as $key => $id) {
            $teacher->classess()->detach($id, [
                'classroom_id' => $id->pivot->classroom_id,
                'teacher_id' => $id->pivot->teacher_id,
            ]);
        }

        return $teacher;
    }

    public function checkOldClassess($id)
    {
        $teacher = Teacher::where('id', $id)->with('classess')->first();
        $count = $teacher->classess;
        return (count($count));
    }
}
