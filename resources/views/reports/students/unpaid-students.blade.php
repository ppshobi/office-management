@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3>Unpaid Students from Current {{ "1st" . \Carbon\Carbon::now()->month }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Phone Number</th>
                                <th>Last Payment</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Phone Number</th>
                                <th>Last Payment</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($students as $student)
                                <tr id="student-{{$student->id}}">
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->course->name }} - {{ $student->course->price }}</td>
                                    <td>{{ $student->phone_number }}</td>
                                    <td>{{ $student->transactions->first()->bill_date->format('d-M-Y') }}
                                        - &#8377;{{ $student->transactions->first()->amount }}
                                    </td>
                                    <td>
                                        <a href="/transaction/create">
                                            <button class="btn btn-success btn-sm">Enter Payment</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
