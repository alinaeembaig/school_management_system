<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Resources\SubjectResource;
use App\Models\Course;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        // $abc = SubjectResource::collection(Subject::with('getCourses')->get());
        // dd($abc[0]['getCourses']->name);
        return Inertia::render('Admin/Subjects/SubjectIndex', [
            'subjects' => SubjectResource::collection(Subject::with('getCourses')->get())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
        $courses = Course::get();
        return Inertia::render('Admin/Subjects/SubjectCreate', [
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSubjectRequest $request)
    {
        // dd($request->validated());
        Subject::create($request->validated());
        return to_route('subjects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject): Response
    {
        //
        // dd($id);
        $courses = Course::get();
        $subject = Subject::find($subject->id);
        return Inertia::render('Admin/Subjects/Edit', [
            'subject' => new SubjectResource($subject),
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject): RedirectResponse
    {
        //

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'course_id' => 'required',
        ]);

        $subject->update([
            'name' => $request->name,
            'description' => $request->description,       
            'course_id' => $request->course_id,     
        ]);

        return to_route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject): RedirectResponse
    {
        //
        $subject->delete();
        return to_route('subjects.index');
    }
}
