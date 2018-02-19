<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name', 'address', 'dob', 'salary', 'phone_number', 'designation'];

    public function transactions()
    {
        return $this->morphMany('App\Transaction', 'transactionable');
    }
}
