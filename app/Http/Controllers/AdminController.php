<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Course;
use App\Models\Task;
use App\Models\Sertif;
use App\Models\Account;
use App\Models\Modul;
use App\Models\contactUs;
use App\Models\Enrollment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $courses = Course::with('instructor')->get();
        foreach ($courses as $course) {
            if ($course->image) {
                $course->image_url = asset('backend-uploads/' . $course->image);
            }
        }
         // Mengambil data kursus beserta instruktur
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
    public function indexStudentActivity(){
        $enrollments = Enrollment::with('course')->get();
        return view('admin.students.activity', compact('enrollments'));
    }



    // Kelola Modul
    public function indexModul()
    {
        $moduls = Modul::with('course')->get();
        foreach ($moduls as $modul) {
            if ($modul->image) {
                $modul->image_url = asset('backend-uploads/' . $modul->image);
            }
        }
        return view('admin.modul.index', compact('moduls'));
    }
    public function indexModulByCourseId()
    {
        $moduls = Modul::with('course')->get();
        foreach ($moduls as $modul) {
            if ($modul->image) {
                $modul->image_url = asset('backend-uploads/' . $modul->image);
            }
        }
        return view('admin.modul.course', compact('moduls'));
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
     * Show the form for creating a new resource.
     */
    

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
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    

    
    /**
     * Remove the specified resource from storage.
     */
  
   

    

  

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
