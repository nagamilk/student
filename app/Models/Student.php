<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
use HasFactory;

protected $fillable = [
'student_id',
'class',
'name',
'birthday',
'gender',
'phone',
'email',
];
}