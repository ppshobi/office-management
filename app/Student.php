<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'dob', 'address', 'phone_number', 'guardians_name', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function transactions()
    {
        return $this->morphMany('App\Transaction', 'transactionable');
    }
}
