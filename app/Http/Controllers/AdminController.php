<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Course;
use App\Models\Task;
use App\Models\Sertif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function indexInstructor()
    {
        $instructors = Instructor::all();
        return view('instructor.index', compact('instructors'));
    }

    public function indexCourse()
    {
        $courses = Course::with('instructor')->get();
        foreach ($courses as $course) {
            if ($course->image) {
                $course->image_url = asset('backend-uploads/' . $course->image);
            }
        }
        return view('course.index', compact('courses'));
    }

    public function indexTask()
    {
        $tasks = Task::with('instructor')->get();
        foreach ($tasks as $task) {
            if ($task->image) {
                $task->image_url = asset('backend-uploads/' . $task->image);
            }
        }
        return view('modul.index', compact('tasks'));
    }

    // Menampilkan halaman Sertifikat
    public function indexSertif()
    {
        $files = Sertif::all();
        return view('admin.sertif', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeInstructor(Request $request)
    {
        Instructor::create($request->all());
        return redirect('/admin/instructors')->with('success', 'Instructor added successfully.');
    }

    public function storeCourse(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'instructor_id' => 'required|exists:instructors,id',
        ]);
        Course::create($validated);
        return redirect('/admin/courses')->with('success', 'Course added successfully.');
    }

    public function storeTask(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'instructor_id' => 'required|exists:instructors,id',
        ]);
        Task::create($validated);
        return redirect('/admin/tasks')->with('success', 'Task added successfully.');
    }

    public function storeSertif(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('pdf_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/sertif', $fileName);

        Sertif::create([
            'name' => $file->getClientOriginalName(),
            'file_path' => $fileName,
        ]);

        return back()->with('success', 'Sertifikat berhasil diupload!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateInstructor(Request $request, Instructor $instructor)
    {
        $instructor->update($request->all());
        return redirect('/admin/instructors')->with('success', 'Instructor updated successfully.');
    }

    public function updateCourse(Request $request, Course $course)
    {
        $course->update($request->all());
        return redirect('/admin/courses')->with('success', 'Course updated successfully.');
    }

    public function updateTask(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect('/admin/tasks')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyInstructor(Instructor $instructor)
    {
        $instructor->delete();
        return redirect('/admin/instructors')->with('success', 'Instructor deleted successfully.');
    }

    public function destroyCourse(Course $course)
    {
        $course->delete();
        return redirect('/admin/courses')->with('success', 'Course deleted successfully.');
    }

    public function destroyTask(Task $task)
    {
        $task->delete();
        return redirect('/admin/tasks')->with('success', 'Task deleted successfully.');
    }

    public function generateSertif(Request $request)
    {
        $pdf = PDF::loadView('admin.certificate_template', [
        'recipientName' => $request->recipient_name
        ]);
    
        $filename = 'sertifikat_'.Str::slug($request->certificate_name).'_'.time().'.pdf';
    
        // Simpan ke storage
        Storage::put('certificates/'.$filename, $pdf->output());
    
        // Simpan record ke database
        Sertif::create([
            'id' => Str::uuid(), // Generate UUID
            'name' => $request->certificate_name,
            'file_path' => 'certificates/'.$filename,
            'recipient_name' => $request->recipient_name
        ]);
    
        return back()->with('success', 'Sertifikat berhasil dibuat');
    }

    public function downloadSertif($id)
    {
        // Cari sertifikat berdasarkan ID
        $sertif = Sertif::findOrFail($id);
    
        // Path lengkap ke file
        $path = storage_path('app/public/' . $sertif->file_path);
    
        // Validasi file exists
        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan');
        }
    
        // Download file
        return response()->download($path, $sertif->name.'.pdf');
    }

    public function destroySertif($id)
    {
        try {
            // Cari sertifikat berdasarkan ID
            $sertif = Sertif::findOrFail($id);
        
            // Hapus file dari storage
            Storage::delete('public/' . $sertif->file_path);
        
            // Hapus record dari database
            $sertif->delete();
        
            return back()->with('success', 'Sertifikat berhasil dihapus');
        
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus sertifikat: ' . $e->getMessage());
        }
    }

    
}
