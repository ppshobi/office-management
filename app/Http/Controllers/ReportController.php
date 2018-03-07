<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transaction()
    {
        return view('reports.transactions.index');
    }

    public function generateTransactionReport(Request $request)
    {
        dd($request->all());
    }
}
