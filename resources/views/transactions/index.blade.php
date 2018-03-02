@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Transaction History</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">All Transactions</h4>
                    <transction-record :items="{{ json_encode($transactions->toArray()) }}">
                    </transction-record>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
