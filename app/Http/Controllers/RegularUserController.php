<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegularUser;
use App\Models\Account;
use App\Models\Enrollment;
use App\Models\Modul;
use App\Models\Course;

class RegularUserController extends Controller
{
    //
    public function indexUser($akun_id)
    {
        // Ambil ID dari account 
       
        $student = Account::find($akun_id);
        
        // Jika data tidak ditemukan, tampilkan pesan
        if (!$student) {
            abort(404, 'Student not found');
        }else if($student->User_Type == 'Free'){
            return view('user.unsubs2', ['students' => $student]);
        }else if ($student->User_Type == 'Subscriber'){
            return view('user.unsubs2', ['students' => $student]);
        }
        // Debugging jika diperlukan
        // dump($student);
    
        // Mengirim data ke view
        
    }

    public function indexCourse($enroll_id, $course_id)
    {
        // Ambil ID dari account 
       
        $enroll = Enrollment::find($enroll_id);
        $course = Course::find($course_id);
        
        // Jika data tidak ditemukan, tampilkan pesan
        return view('user.courses', ['students' => $enroll, 'courses' => $course]);
        // Debugging jika diperlukan
        // dump($student);
    
        // Mengirim data ke view
        
    }
    public function index()
    {
        //
        return view('index');
    }

    public function readModul($akun_id, $enroll_id, $course_id, $modul_id)
{
    // Ambil data berdasarkan ID
    $akun = Account::find($akun_id);
    $enroll = Enrollment::find($enroll_id);
    $course = Course::find($course_id);

    // Validasi data
    if (!$akun || !$enroll || !$course) {
        abort(404, 'Account, Enrollment, or Course not found');
    }

    // Cari modul spesifik
    $modul = Modul::where('id', $modul_id)
                 ->where('CourseID', $course_id)
                 ->first();

    if (!$modul) {
        abort(404, 'Module not found for this course');
    }

    return view('user.modul', [
        'enroll' => $enroll,
        'modul' => $modul,
        'course' => $course,
        'account' => $akun,
    ]);
}
    
    public function myCourse($akun_id)
    {
        // Ambil data berdasarkan route model binding
        $akun = Account::find($akun_id); // Asumsi kamu memiliki model Akun
    
        // Validasi apakah akun ditemukan
        if (!$akun) {
            abort(404, 'Akun not found');
        }
    
        // Ambil semua course yang terkait dengan akun
        $enroll = Enrollment::where('UserID', $akun_id)->get();
    
        return view('user.mycourse', [
            'akun_id' => $akun_id,
            'enroll' => $enroll,
        ]);
    }

    public function enroll($akun_id)
    {
        $akun = Account::find($akun_id);
        if (!$akun) {
            abort(404, 'Akun  not found');
        } //
        return view('user.payment',['akun_id' => $akun_id]);
    }

    public function Profiles($akun_id)
    {
        $akun = Account::find($akun_id);
        if (!$akun) {
            abort(404, 'Akun  not found');
        } //
        return view('user.profiles',['akun_id' => $akun_id]);
    }
}
