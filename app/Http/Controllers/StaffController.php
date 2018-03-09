<?php

namespace App\Http\Controllers;

use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        view()->share('title', 'Manage Staff');

        return view('staff.index')->with([
           'staffs' => Staff::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        view()->share('title', 'Add a Staff');

        return view('staff.create');
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
            'name'         => 'required',
            'address'      => 'required',
            'dob'          => 'required',
            'phone'        => 'required',
            'salary'       => 'required',
            'designation'  => 'required',
        ]);

        Staff::create([
            'name'         => $request->name,
            'address'      => $request->address,
            'dob'          => Carbon::createFromFormat('d/m/Y', $request->dob),
            'phone_number' => $request->phone,
            'salary'       => $request->salary,
            'designation'  => $request->designation,
        ]);

        return response()->json(['message' => 'Staff Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        view()->share('title', "Staff Details - $staff->name");

        $transactions = $staff->transactions;

        return view('staff.show', compact(['staff', 'transactions']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        view()->share('title', 'Edit Staff');

        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response`
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return response()->json(['message' => 'Staff Deleted'], 200);
    }
}
