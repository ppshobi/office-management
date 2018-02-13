@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a Transaction</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/transaction">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                                <label for="student_id" class="col-md-4 control-label">Student Name</label>

                                <div class="col-md-6">
                                    <select id="student_id" class="form-control" name="student_id" required autofocus>
                                        <option value="0"> Select Student </option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}"> {{ $student->id . " - " . $student->name  }} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('student_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                <label for="amount" class="col-md-4 control-label">Amount</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" class="form-control" name="amount"
                                           placeholder="Enter The Amount" required>

                                    @if ($errors->has('amount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">Bill Date</label>

                                <div class="col-md-6" id="datetimepicker1">
                                    <div class="input-group date">
                                        <input type="date" name="date" class="form-control" value="01/01/2018">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('transaction_type') ? ' has-error' : '' }}">
                                <label for="transaction_type" class="col-md-4 control-label">Student Name</label>

                                <div class="col-md-6">
                                    <select id="transaction_type" class="form-control" name="transaction_type" required autofocus>
                                        <option value="0"> Select Transaction Type </option>
                                        @foreach($transactionType as $type)
                                            <option value="{{ $type->id }}"> {{ $type->name  }} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('transaction_type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('transaction_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Transaction
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
