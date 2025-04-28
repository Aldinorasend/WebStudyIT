<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Account;
use App\Models\Course;
use App\Models\Task;
use App\Models\contactUs;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexDashboard()
    {
        //
        return view('Admin.index');
    }
    public function indexMessage()
    {
        //
        $messages = contactUs::all();
        return view('Admin.message', compact('messages'));
    }




    // Kelola Instruktur
    public function indexInstructor()
    {
        //
        $instructors = Instructor::all();
        return view('admin.instructor.index', compact('instructors'));
    }
    public function createInstructor()
    {
        return view('admin.instructor.create');
    }
    public function storeInstructor(Request $request)
    {
        //
        Instructor::create($request->all());
        return redirect('/admin/{akunid}/instructors')->with('success', 'Instructor added successfully.');
    }
    public function editInstructor(Instructor $instructor)
    {
        //
        return view('admin.instructor.edit');
    }
    public function updateInstructor(Request $request, Instructor $instructor)
    {
        //
        $instructor = Instructor::findOrFail($id);
        $instructor->update($request->all());
        return redirect('/admin/instructors')->with('success', 'Instructor updated successfully.');
    }
    public function destroyInstructor(Instructor $instructor)
    {
        //
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();
        return redirect('/admin/instructors')->with('success', 'Instructor deleted successfully.');
    }
    
    // Kelola Kursus
    public function indexCourse()
    {
        //
        $courses = Course::with('instructor')->get();
        foreach ($courses as $course) {
            if ($course->image) {
                $course->image_url = asset('backend-uploads/' . $course->image);
            }
        } // Mengambil data kursus beserta instruktur
        return view('admin.course.index', compact('courses'));
    }
    public function createCourse()
    {
        //
        $instructors = Instructor::all();
        return view('admin.course.create', compact('instructors'));
    }
    public function storeCourse(Request $request)
    {
        // Simpan data ke database
        Course::create($validated);
        return redirect('/admin/{akunId}/subjects')->with('success', 'Course added successfully.');
    }
    public function editCourse(Course $course)
    {
        //
        $instructors = Instructor::all();
        return view('Admin.course.edit', compact('instructors'));
    }
    public function updateCourse(Request $request, Course $course)
    {
        //
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect('/admin/courses')->with('success', 'Courses updated successfully.');
    }
    public function destroyCourse(Course $course)
    {
        //
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/admin/courses')->with('success', 'Course deleted successfully.');
    }




    // Kelola Siswa
    public function indexStudent(){
        $students = Account::all();
        return view('admin.students.index', compact('students'));
    }




    // Kelola Modul
    public function indexTask()
    {
        //
        $tasks = Task::with('instructor')->get();
        foreach ($tasks as $task) {
            if ($task->image) {
                $task->image_url = asset('backend-uploads/' . $task->image);
            }
        } // Mengambil data kursus beserta instruktur
        return view('modul.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
   
    /**
     * Store a newly created resource in storage.
     */
   
    

    public function storeTask(Request $request)
    {
        // Simpan data ke database
        Task::create($validated);
        return redirect('/admin/tasks')->with('success', 'Task added successfully.');
    }
    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */

    public function editTask(Task $task)
    {
        //
        return view('modul.edit', compact('task'));
    }
    
    
   

    public function updateTask(Request $request, Task $task)
    {
        //
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect('/admin/tasks')->with('success', 'Task updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
   

    

    public function destroyTask(Task $task)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/admin/tasks')->with('success', 'Task deleted successfully.');
    }


    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
}
