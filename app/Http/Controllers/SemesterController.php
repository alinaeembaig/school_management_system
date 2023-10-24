<?php

namespace App\Http\Controllers;

use App\Http\Resources\SemesterResource;
use App\Models\Course;
use App\Models\Semester;
use App\Models\SemesterCourse;
use App\Models\SemesterCourseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
// use PSpell\Config;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        // dd(SemesterCourse::with(['getCourses'])->get());
        return Inertia::render('Admin/Semesters/SemesterIndex', [
            // 'semesters' => Config::get('constants.semesters')
            'semesterCourses' => SemesterCourse::get(),
            'semesters' => Config::get('constants.semesters'),
            'courses' => Course::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
        $courses = Course::get();        
        return Inertia::render('Admin/Semesters/SemesterCreate', [
            'courses' => $courses,
            'semesters' => Config::get('constants.semesters')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'course_id' => 'required',
            'semester_id' => 'required'
        ]);
        // dd($request->all());
        SemesterCourse::create([
            'course_id' => $request->course_id,
            'semester_id' => $request->semester_id,
        ]);

        return to_route('semesters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        //
    }
}
