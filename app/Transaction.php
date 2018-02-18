<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['amount', 'student_id', 'transaction_type_id', 'date'];

    public function student()
    {
        $this->belongsTo(Student::class);
    }

    public function type()
    {
        $this->belongsTo(TransactionType::class);
    }

    public function transactionable()
    {
        $this->morphTo();
    }
}
