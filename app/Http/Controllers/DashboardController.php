<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use Carbon\Carbon;
use App\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentCount   = Student::count();
        $courseCount    = Course::count();
        $debitLastMonth = Transaction::whereHas('type', function ($q) {
                                $q->where('is_credit', 0);
                            })->where('bill_date', '>', Carbon::now()->subMonth())
                            ->sum('amount');

        $creditLastMonth = Transaction::whereHas('type', function ($q) {
                                $q->where('is_credit', 1);
                            })->where('bill_date', '>', Carbon::now()->subMonth())
                            ->sum('amount');

        return view('dashboard', compact(['studentCount', 'courseCount', 'debitLastMonth', 'creditLastMonth']));
    }
}
