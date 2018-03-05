@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3><i class="fa fa-money"></i> Transaction History</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <transction-record :items="{{ json_encode($transactions->toArray()) }}">
                        </transction-record>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
