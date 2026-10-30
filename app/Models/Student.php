<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'student_name',
        'email',
        'gender',
        'dob',
        'enrollment',
        'enrollment_date',
        'description',
        'dept_id'
    ];

    // Each student belongs to one department
    public function department()
    {
        return $this->belongsTo(
            Department::class,
            'dept_id',
            'dept_id'
        );
    }
}