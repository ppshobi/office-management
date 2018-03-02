@extends('layouts.app')

@section('content')
    <div class="full-container">
        <div class="container col-md-10">
            <div class="bgc-white p-20 bd">
                <h4 class="c-blue-900">Edit Transaction - {{ $transaction->id }}</h4>
                <div class="mT-30">
                    <edit-transaction :categories="{{json_encode($transactionTypes)}}"
                                        :students="{{ json_encode($students) }}"
                                        :staffs="{{ json_encode($staffs) }}"
                                        :transaction="{{ json_encode($transaction) }}">
                    </edit-transaction>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
