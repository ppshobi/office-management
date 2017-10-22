@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Current Students</div>
                    @if(session('flash'))
                        <div class="alert alert-success">{{ session('flash') }}</div>
                    @endif
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Course No</th>
                                    <th>Course Name</th>
                                    <th>Course Duration</th>
                                    <th>Course Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $key => $student)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->course }}</td>
                                    <td>{{ $course->price }}</td>
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
