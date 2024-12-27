<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegularUser;

class RegularUserController extends Controller
{
    //
    public function indexUser()
    {
        //
        return view('index');
    }
    public function indexNotLoggedIn()
    {
        //
        return view('user.notloggedin');
    }
    public function indexLoggedIn()
    {
        //
        return view('user.loggedin');
    }

}
