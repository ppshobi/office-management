<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Student;
use App\Transaction;
use App\TransactionType;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('bill_date','desc')->with(['transactable','type'])->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $students         = Student::all();
        $staffs           = Staff::all();
        $transactionTypes = TransactionType::all()->toArray();
        return view('transactions.create', compact(['students', 'staffs', 'transactionTypes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transactionable = null;
        if ($request->student_id)
        {
            $transactionable = Student::find($request->student_id);
        }
        elseif ($request->staff_id)
        {
            $transactionable = Staff::find($request->student_id);
        }

        Transaction::create([
            'amount'                  => $request->amount,
            'remark'                  => $request->remark,
            'bill_date'               => $request->date,
            'transaction_type_id'     => $request->transaction_type_id,
            'transactable_type'    => $transactionable ? get_class($transactionable) : null,
            'transactable_type_id' => $transactionable ? $transactionable->id : null,
        ]);

        return response()->json(['message' => 'Transaction Added'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $transaction->load(['type', 'transactionable']);

        $students         = Student::all();
        $staffs           = Staff::all();
        $transactionTypes = TransactionType::all();

        return view('transactions.edit', compact(['transaction', 'students', 'staffs', 'transactionTypes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Transaction $transaction
     * @return \Illuminate\Http\Response
     * @internal param \App\Billing $billing
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transactionable = null;

        if ($request->student_id)
        {
            $transactionable = Student::find($request->student_id);
        }
        elseif ($request->staff_id)
        {
            $transactionable = Staff::find($request->staff_id);
        }

        $transaction->update([
            'amount'                  => $request->amount,
            'remark'                  => $request->remark,
            'date'                    => $request->date,
            'transaction_type_id'     => $request->transaction_type_id,
            'transactab_typele'    => $transactionable ? get_class($transactionable) : null,
            'transactable_type_id' => $transactionable ? $transactionable->id : null,
        ]);

        return response()->json(['message' => 'Transaction Updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json([
            'message' => 'Transaction Deleted',
        ], 200);
    }
}
