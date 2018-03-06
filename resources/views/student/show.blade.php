@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3><i class="fa fa-graduation-cap"></i>{{ $student->id ." - " .$student->name }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="fw-600">Name: </td>
                                        <td>{{ $student->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-600">Guardians Name: </td>
                                        <td>{{ $student->guardians_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-600">Address: </td>
                                        <td>{{ $student->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-600">Phone: </td>
                                        <td> {{ $student->phone_number }} </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-600">Date of Birth: </td>
                                        <td> {{ $student->dob }} </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-600">Course & Fee </td>
                                        <td>{{ $student->course->name ." - "}} &#8377; {{ $student->course->price }} </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
