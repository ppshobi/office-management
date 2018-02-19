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
        Transaction::all()->paginate(20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $staffs = Staff::all();
        $debits = TransactionType::where('is_credit', 0)->get();
        $credits = TransactionType::where('is_credit', 1)->get();

        return view('transactions.create', compact(['students', 'staffs', 'debits', 'credits']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaction::create([
            'amount'                  => $request->amount,
            'remark'                  => $request->remark,
            'date'                    => $request->date,
            'transaction_type_id'     => $request->transaction_type,
            'transactionable_type'    => $request->transactionable_type,
            'transactionable_type_id' => $request->transactionable_type_id,
        ]);

        session()->flash('status', 'Transaction Added');
        return redirect()->back();
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
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billing $billing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }
}
