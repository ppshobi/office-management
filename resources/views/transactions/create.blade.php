@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3>Add A Transaction</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <create-transaction :categories="{{json_encode($transactionTypes)}}"
                                     :students="{{ json_encode($students) }}"
                                     :staffs="{{ json_encode($staffs) }}">
                        </create-transaction>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
