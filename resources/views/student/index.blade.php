@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-block">
                <div class="panel panel-default">
                    <div class="panel-heading">Current Students</div>
                    <div class="panel-body">
                        <table class="table table-striped" border="1">
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Guardians Name</th>
                                <th>Join Date</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->course->name }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->phone_number }}</td>
                                    <td>{{ $student->guardians_name }}</td>
                                    <td>{{ $student->created_at->toDateString() }}</td>
                                    <td colspan="3">
                                        <form action="/student/{{ $student->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>

                                        <button class="btn btn-info">Update</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <tfoot>{{ $students->links()  }}</tfoot>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
