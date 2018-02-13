@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Current Staffs</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Staff ID</th>
                                <th>Staff Name</th>
                                <th>Designation</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Salary</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($staffs as $staff)
                                <tr>
                                    <td>{{ $staff->id }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->designation }}</td>
                                    <td>{{ $staff->address }}</td>
                                    <td>{{ $staff->phone_number }}</td>
                                    <td>{{ $staff->salary }}</td>
                                    <td>
                                        <form action="/staff/{{ $staff->id }}" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
