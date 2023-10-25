<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseSemester extends Model
{
    use HasFactory;
    protected $table = 'student_course_semesters';
    protected $fillable = ['course_id', 'semester_id', 'user_id'];
}
