@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-block">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Details</div>
                    <div class="panel-body">
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
