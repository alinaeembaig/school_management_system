<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class SemesterCourse extends Model
{
    use HasFactory;
    protected $table = 'semesters_courses';
    protected $fillable = ['course_id', 'semester_id'];

    public function getSemester(){
        return $this->hasOne(Config::get('constants.semesters'),'id');

    }

    public function getCourses(){
        return $this->hasOne(Course::class, 'id');
    }
}
