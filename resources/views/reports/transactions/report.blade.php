@extends('layouts.base')

@section('content')
    <div class="container">
        <h4 class="pY-10">Transaction Summary - {{ env('APP_NAME') }}</h4>
        <div class="col-md-12 row">
            <div class="col-md-6">
                <div class="layers">
                    <div class="layer w-100 bgc-grey-50">
                        <h5 class="lh-1">Summary</h5>
                    </div>
                    <div class="layer w-100 mY-10">
                        <div class="layers bdB">
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Report Generated On</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">{{ $generatedOn }}</span></div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Total Credit</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">&#8377;{{ $credit }}</span></div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Total Debit</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">&#8377;{{ $debit }}</span></span></div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Date Range</span></div>
                                    <div class="peer ta-r">
                                        <span class="fw-600 c-grey-800">
                                            @if($from && $to)
                                                {{$from}} To {{$to}}
                                            @elseif($from)
                                                {{ "All Since" . $from }}
                                            @elseif($to)
                                                {{ "All to" . $to }}
                                            @else
                                                {{ "All Transactions" }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="layers">
                    <div class="layer w-100 bgc-grey-50">
                        <h5 class="lh-1">Notes</h5>
                    </div>
                    <div class="layer w-100 mY-10">
                        <div class="layers bdB">
                            <div class="layer w-100 bdT pY-15">
                                <div class="peers ai-c jc-sb fxw-nw">
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-15">
                                <div class="peers ai-c jc-sb fxw-nw">

                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-15">
                                <div class="peers ai-c jc-sb fxw-nw">
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-15">
                                <div class="peers ai-c jc-sb fxw-nw">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Transaction Type</th>
                <th>Amount</th>
                <th>Remark</th>
                <th>Date</th>
                <th>With Respect To</th>
            </tr>
            </thead>
            <tbody>
            @forelse($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->type->name }}</td>
                    <td>&#8377; {{ $transaction->amount }}</td>
                    <td>{{ $transaction->remark }}</td>
                    <td width="10%"> {{ $transaction->bill_date->format('d-M-Y') }}</td>
                    <td>{{ $transaction->transactable ? $transaction->transactable->name : ''}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="c-red-500">No Trasactions Yet</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
