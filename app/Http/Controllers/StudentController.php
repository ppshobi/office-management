<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        view()->share('title', 'Manage Students');

        return view('student.index')->with([
            'students' => Student::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        view()->share('title', 'Create Student');

        return view('student.create')->with([
           'courses' => Course::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'guardian' => 'required',
            'phone' => 'required|integer',
            'address' => 'required',
            'course' => 'required',
        ]);

        Student::create([
           'name' => $request->name,
           'dob'=> Carbon::createFromFormat('d/m/Y', $request->dob),
           'guardians_name' => $request->guardian,
           'address' => $request->address,
           'phone_number'=> $request->phone,
           'course_id' => $request->course,
        ]);

        return response()->json(['message' => 'Student Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        view()->share('title', 'Student Details - ' . $student->name);

        $transactions = $student->transactions;

        return view('student.show', compact(['student', 'transactions']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        view()->share('title', 'Update Student');

        return view('student.edit')->with([
            'courses' => Course::all(),
            'student' => $student->load('course'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'guardian' => 'required',
            'phone' => 'required|integer',
            'address' => 'required',
            'course' => 'required',
        ]);

        $student->update([
            'name' => $request->name,
            'dob'=> Carbon::createFromFormat('d/m/Y', $request->dob),
            'guardians_name' => $request->guardian,
            'address' => $request->address,
            'phone_number'=> $request->phone,
            'course_id' => $request->course,
        ]);

        return response()->json(['message' => 'Student Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['message' => 'Student Deleted'], 200);
    }
}
