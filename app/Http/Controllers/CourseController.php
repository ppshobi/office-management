<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        view()->share('title', 'Manage Courses');

        return view('course.index')->with([
            'courses' => Course::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        view()->share('title', 'Create Course');

        return view('course.create');
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
            'name' =>'required|string',
            'duration' => 'required|integer|max:999',
            'price' => 'required|integer',
            'recurring' => 'required|bool',
        ]);

        Course::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'price' => $request->price,
            'is_recurring' => $request->recurring,
        ]);

        return response()->json(['message' => 'Course Created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        view()->share('title', 'Edit Course');

        return view('course.edit', compact(['course']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' =>'required|string',
            'duration' => 'required|integer|max:999',
            'price' => 'required|integer',
            'is_recurring' => $request->recurring,
        ]);

        $course->update([
            'name' => $request->name,
            'duration' => $request->duration,
            'price' => $request->price,
            'is_recurring' => $request->recurring,
        ]);

        return response()->json(['message' => 'Course Details Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json([
            'message' => 'Course Deleted',
        ], 200);
    }
}
