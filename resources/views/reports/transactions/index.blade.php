@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h3>Generate Transaction Reports</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <form action="/report/transaction" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group col-md-6">
                                        <div class="col-md-10">
                                            <h5 for="course" class="fw-300 c-grey-900 mB-10">Select Transaction Type</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">All
                                                <input type="radio" class="form-check-inline" name="type" value="0" checked>
                                            </label>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label">Credit
                                                <input type="radio" class="form-check-inline" name="type" value="1">
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">Debit
                                                <input type="radio" class="form-check-inline" name="type" value="2">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group col-md-6">
                                        <div class="col-md-6">
                                            <h5 class="fw-300 c-grey-900 mB-10">Start</h5>
                                            <input class="form-control bill-date" name="start" placeholder="dd/mm/yyyy" />
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="fw-300 c-grey-900 mB-10">End</h5>
                                            <input class="form-control bill-date" name="end" placeholder="dd/mm/yyyy" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Generate Report</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
