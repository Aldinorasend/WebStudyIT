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

    public function indexCourse($akun_id, $course_id)
    {
        // Ambil ID dari account 
       
        $student = Account::find($akun_id);
        $course = Course::find($course_id);
        
        // Jika data tidak ditemukan, tampilkan pesan
        return view('user.courses', ['students' => $student, 'courses' => $course]);
        // Debugging jika diperlukan
        // dump($student);
    
        // Mengirim data ke view
        
    }
    public function index()
    {
        //
        return view('index');
    }

    public function readModul($akun_id, $course_id)
    {
        // Ambil data berdasarkan route model binding
        $akun = Account::find($akun_id); // Asumsi kamu memiliki model Akun
        $course = Course::find($course_id); // Asumsi kamu memiliki model Course
    
        // Validasi apakah akun dan course ditemukan
        if (!$akun || !$course) {
            abort(404, 'Akun or Course not found');
        }
    
        // Cari data modul berdasarkan course_id
        $modul = Modul::where('CourseID', $course_id)->first();
    
        // Validasi modul
        if (!$modul) {
            abort(404, 'Modul not found');
        }
    
        return view('user.modul', [
            'akun_id' => $akun_id,
            'courses' => $modul,
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
