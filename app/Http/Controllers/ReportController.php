<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transaction()
    {
        return view('reports.transactions.index');
    }

    public function generateTransactionReport(Request $request)
    {
        $query = Transaction::select('*');

        if($request->start)
        {
            $start = Carbon::createFromFormat('d/m/Y', $request->start);
            $query = $query->where('bill_date', '>=', $start);
        }

        if($request->end)
        {
            $end = Carbon::createFromFormat('d/m/Y', $request->end);
            $query = $query->where('bill_date', '<=', $end);
        }

        if($type = $request->type && ($request->type == "0" || $request->type=="1"))
        {
            $query = $query->whereHas('type', function ($q) use($type) {
                        $q->where('is_credit', $type);
                    });
        }

        $transactions = $query->get();

        return view('reports.transactions.report', compact('transactions'));
    }
}
