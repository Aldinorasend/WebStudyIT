<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Account;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexInstructor()
    {
        //
        $instructors = Instructor::all();
        return view('instructor.index', compact('instructors'));
    }
    public function indexCourse()
    {
        //
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }
    public function indexDashboard(Account $account)
    {
        //
        return view('Admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Instructor::create($request->all());
        return redirect('/admin/instructor')->with('success', 'Instructor added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        //
        $instructor = Instructor::findOrFail($id);
        return view('instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
        $instructor = Instructor::findOrFail($id);
        $instructor->update($request->all());
        return redirect('/admin/instructors')->with('success', 'Instructor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();
        return redirect('/admin/instructors')->with('success', 'Instructor deleted successfully.');
    }
}
