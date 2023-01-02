<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){

        $applicatoinResponse = auth()->user()->course;
        // dd($applicatoinResponse);
        
        return view('student_home',compact('applicatoinResponse'));
    }
    
}
