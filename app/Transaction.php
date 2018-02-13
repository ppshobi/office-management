<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        $this->belongsTo(Student::class);
    }

    public function type()
    {
        $this->belongsTo(TransactionType::class);
    }
}
