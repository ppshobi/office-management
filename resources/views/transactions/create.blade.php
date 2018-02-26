@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a Transaction</div>
                    <div class="panel-body">
                        <transaction :categories="{{json_encode($transactionTypes)}}"
                                     :students="{{ json_encode($students) }}"
                                     :staffs="{{ json_encode($staffs) }}">

                        </transaction>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
