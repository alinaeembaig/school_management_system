<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use App\Http\Resources\UserResource;
use App\Models\Course;
use App\Models\StudentCourseSemester;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        return Inertia::render('Admin/Students/StudentIndex', [
            'users' => UserResource::collection(User::role('student')->get())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
    public function myCourse(){
        $studentCourseSemester = StudentCourseSemester::where('user_id', Auth::user()->id)->first();
        $semesters = Config::get('constants.semesters');
        $selectedSemester = null;
   
        // dd($selectedSemester);
        return Inertia::render('Admin/Students/MyCourse', [
            'user' => User::where('id', Auth::user()->id)->first(),
            'course' => Course::where('id', $studentCourseSemester->course_id)->first(),
            'semester' => $semesters[(int)$studentCourseSemester->semester_id - 1],
        ]);
    }
}
