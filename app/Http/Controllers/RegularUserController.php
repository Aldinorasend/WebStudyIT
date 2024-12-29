<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegularUser;
use App\Models\Account;
use App\Models\Modul;

class RegularUserController extends Controller
{
    //
    public function indexUser(Request $request)
    {
        // Ambil ID dari query string
        $id = $request->query('id');
    
        // Validasi ID
        if (!$id) {
            return abort(400, 'ID is required');
        }
    
        // Cari data student
        $student = Account::find($id);
        
        // Jika data tidak ditemukan, tampilkan pesan
        if (!$student) {
            abort(404, 'Student not found');
        }else if($student->User_Type == 'Free'){
            return view('user.unsubs', ['students' => $student]);
        }else if ($student->User_Type == 'Subscriber'){
            return view('user.subs', ['students' => $student]);
        }
        // Debugging jika diperlukan
        // dump($student);
    
        // Mengirim data ke view
        
    }
    
    public function index()
    {
        //
        return view('index');
    }

    public function readModul(Request $request)
    {
        //
        // Ambil ID dari query string
        $id = $request->query('id');
    
        // Validasi ID
        if (!$id) {
            return abort(400, 'Course ID is required');
        }
    
        // Cari data student
        $modul = Modul::find($id);
        
        // Jika data tidak ditemukan, tampilkan pesan
        if (!$modul) {
            abort(404, 'modul not found');
        }
        return view('modul.index', ['moduls' => $modul]);
    }

    public function enroll()
    {
        return view('payment.index');
    }
}
