<?php

namespace App\Http\Controllers\Api;

use DB;
use Carbon\Carbon;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function yearHistory()
    {
        $transactions = Transaction::where('date', '>', Carbon::now()->subYear())
                           ->with('type')
                           ->get();

        $debits = [];
        $credits = [];

        for($i = 1; $i<13; $i++)
        {
            $debits[$i] = 0;
            $credits[$i] = 0;
        }

        foreach ($transactions as $transaction)
        {
            $month = $transaction->date->month;

            if($transaction->type->is_credit)
            {
                $credits[$month] += $transaction->amount;
            }
            else
            {
                $debits[$month] += $transaction->amount;
            }
        }

        return response()->json([
            'credits' => $credits,
            'debits'  => $debits,
        ], 200);
    }
}
