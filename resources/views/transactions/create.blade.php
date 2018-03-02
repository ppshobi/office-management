@extends('layouts.app')

@section('content')
    <div class="full-container">
        <div class="container col-md-10">
            <div class="bgc-white p-20 bd">
                <h4 class="c-blue-900">Add a Transaction</h4>
                <div class="mT-30">
                    <create-transaction :categories="{{json_encode($transactionTypes)}}"
                                 :students="{{ json_encode($students) }}"
                                 :staffs="{{ json_encode($staffs) }}">
                    </create-transaction>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
