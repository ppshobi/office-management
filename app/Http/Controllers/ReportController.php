<?php

namespace App\Http\Controllers;

use App\Student;
use Mpdf\Mpdf;
use Carbon\Carbon;
use App\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transaction()
    {
        return view('reports.transactions.index');
    }

    public function generateTransactionReport(Request $request)
    {
        $start = '';
        $end = '';

        $query = Transaction::select('*')->with('type');

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

        return view('reports.transactions.report')->with([
            'transactions' => $transactions,
            'from'         => $start ? $start->format('d-M-Y') : '',
            'to'           => $end ? $end->format('d-M-Y') : '',
            'generatedOn'  => Carbon::now()->format('d-M-Y h:i:s'),
            'credit'       => $this->getTotalCredits($transactions),
            'debit'        => $this->getTotalDebits($transactions),
        ]);
    }

    private function getTotalCredits($transactions)
    {
        return $transactions->where('type.is_credit', 1)->sum('amount');
    }

    private function getTotalDebits($transactions)
    {
        return $transactions->where('type.is_credit', 0)->sum('amount');
    }

    public function getUnpaidStudents()
    {
        $query = Student::whereHas('course', function($q){
            return $q->where('is_recurring', 1);
        });


        $query = $query->with(['transactions' => function($q) {
            return $q->orderBy('bill_date', 'DESC');
        }]);

        $students = $query->get();

        $lastMonth = Carbon::now()->firstOfMonth()->subMonth();

        $students = $students->filter(function($value) use ($lastMonth) {
                        if($value->transactions->first()->bill_date <= $lastMonth)
                        {
                            return true;
                        }
                    });



        return view('reports.students.unpaid-students', compact('students'));
    }
}
