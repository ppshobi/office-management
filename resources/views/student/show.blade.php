@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-block">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Details</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Student Name</label>

                                <div class="col-md-6">
                                    <p>{{ $student->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="guardians-name" class="col-md-4 control-label">Guardians Name</label>

                                <div class="col-md-6">
                                    <p>{{ $student->guardians_name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="guardians-name" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <p>{{ $student->address }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="guardians-name" class="col-md-4 control-label">Phone</label>

                                <div class="col-md-6">
                                    <p>{{ $student->phone_number }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-md-4 control-label">Date Of Birth</label>

                                <div class="col-md-6">
                                    <p>{{ $student->dob }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="course" class="col-md-4 control-label">Course</label>

                                <div class="col-md-6">
                                    <p>{{ $student->course->name }}</p>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped" border="1">
                            <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Transaction Type</th>
                                <th>Amount</th>
                                <th>Remark</th>
                                <th>Date</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->type->name }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->remark }}</td>
                                    <td>{{ $transaction->date }}</td>
                                    <td colspan="3">
                                        <form action="/transaction/" method="POST">
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
                        {{--<tfoot>{{ $students->links()  }}</tfoot>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
