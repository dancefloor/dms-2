<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {        
        return view('welcome');
    }
    
    public function genevaCourses()
    {
        return view('pages.geneva');
    }

    public function lausanneCourses()
    {
        return view('pages.geneva');
    }

}
