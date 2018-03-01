@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Transaction History</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">All Transactions</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Amount</th>
                            <th>Remark</th>
                            <th>Date</th>
                            <th>With Respect To</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Amount</th>
                            <th>Remark</th>
                            <th>Date</th>
                            <th>With Respect To</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->type->name }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->remark }}</td>
                                <td>{{ $transaction->date->format('d-M-Y') }}</td>
                                <td>{{ $transaction->transactionable ? $transaction->transactionable->name :'' }}</td>
                                <td>
                                    <div class="col-md-12 row">
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                        <button class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <h2> No Transactions Generated </h2>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
