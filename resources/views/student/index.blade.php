@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3><i class="fa fa-graduation-cap"></i>Manage Students</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <student-index inline-template>
                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Guardians Name</th>
                                    <th>Join Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Guardians Name</th>
                                    <th>Join Date</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($students as $student)
                                <tr id="student-{{$student->id}}">
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->course->name }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->phone_number }}</td>
                                    <td>{{ $student->guardians_name }}</td>
                                    <td>{{ $student->created_at->toDateString() }}</td>
                                    <td>
                                        <action :id="{{ $student->id }}"
                                                :index="{{$student->id}}"
                                                :url="'student'"
                                                :message="'If you delete a student, The associated transactions and other data will be deleted, You can\'t undo this Operation'"
                                                @removed="remove({{$student->id}})"></action>
                                        <div class="col-md-12 btn-group">
                                            <a href="/student/{{$student->id}}">
                                                <button class="btn btn-success btn-sm">View</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </student-index>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
