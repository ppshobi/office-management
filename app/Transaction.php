<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
    protected $fillable = ['amount', 'student_id',
                           'transaction_type_id',
                           'date', 'remark',
                           'transactionable_id',
                           'transactionable_type',];

    protected $dates = ['created_at', 'updated_at', 'date'];

    public function student()
    {
       return $this->belongsTo(Student::class);
    }

    public function type()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id');
    }

    public function transactionable()
    {
        return $this->morphTo();
    }
}
