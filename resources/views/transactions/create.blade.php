@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a Transaction</div>
                    <div class="panel-body">
                        <transaction inline-template>
                            <form class="form-horizontal" method="POST" action="/transaction">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="transaction_type_debit" class="col-md-4 control-label">Select Transaction Type</label>
                                    <div class="col-md-4">
                                        <div class="col-md-6">
                                            <label for="transaction_type_debit" class="control-label">Debit</label>
                                            <input type="radio" value="0" name="transaction_type"  @change="transactionTypeChanged"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="transaction_type_credit" class="control-label">Credit</label>
                                            <input type="radio" value="1" name="transaction_type"  @change="transactionTypeChanged"/>
                                        </div>
                                    </div>
                                </div>
                                <div id="categories" class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                                    <label for="transaction_type_debit" class="col-md-4 control-label">Select Transaction Category</label>
                                    <div class="col-md-6">
                                        <select id="transaction_type_id" class="form-control" name="transaction_type_id" required autofocus>
                                            <div id="debits">
                                                <option value="0">Select Category</option>
                                                @foreach($debits as $debit)
                                                    <option value="{{ $debit->id }}"> {{ $debit->name  }} </option>
                                                @endforeach
                                            </div>
                                            <div id="credits">
                                                <option value="0"> Select Category</option>
                                                @foreach($credits as $credit)
                                                    <option value="{{ $credit->id }}"> {{ $credit->name  }} </option>
                                                @endforeach
                                            </div>
                                        </select>

                                        @if ($errors->has('transaction_type_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('transaction_type_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div id="students" class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
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

                                <div id="staffs" class="form-group{{ $errors->has('staff_id') ? ' has-error' : '' }}">
                                    <label for="staff_id" class="col-md-4 control-label">Staff Name</label>

                                    <div class="col-md-6">
                                        <select id="staff_id" class="form-control" name="staff_id" required autofocus>
                                            <option value="0"> Select Staff </option>
                                            @foreach($staffs as $staff)
                                                <option value="{{ $staff->id }}"> {{ $staff->id . " - " . $staff->name  }} </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('staff_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
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
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Transaction
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </transaction>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
