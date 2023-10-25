<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use App\Models\StudentCourseSemester;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        return Inertia::render('Admin/Courses/CourseIndex', [
            'courses' => CourseResource::collection(Course::get())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
        return Inertia::render('Admin/Courses/CourseCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCourseRequest $request)
    {
        // dd($request->validated());
        Course::create($request->validated());
        return to_route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): Response
    {
        //
        // dd($id);
        $course = Course::find($course->id);
        return Inertia::render('Admin/Courses/Edit', [
            'course' => new CourseResource($course)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course): RedirectResponse
    {
        //

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $course->update([
            'name' => $request->name,
            'description' => $request->description,            
        ]);

        return to_route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        //
        $course->delete();
        return to_route('courses.index');
    }

    public function assignTOStudent(User $user, Request $request): Response
    {
        // dd($user, $request->id);
        return  Inertia::render('Admin/Users/AssignCourse', [
            'userId' => $request->id,
            'courses' => CourseResource::collection(Course::get()),
            'semesters' => Config::get('constants.semesters'),
        ]);
    }

    public function assignStudent(User $user, Request $request){
        StudentCourseSemester::create([
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'semester_id' => $request->semester_id,
        ]);
        return to_route('users.index');
    }
}
