<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'dob', 'address', 'phone_number', 'guardians_name', 'course_id'];
}
