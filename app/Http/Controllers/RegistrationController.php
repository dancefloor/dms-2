<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function add(Request $request, Course $course)
    {      
        $uid = auth()->user()->id;   

        if ($this->registrationExists($uid, $course->id)) {
            session()->flash('alert', 'You are already registered for this course');
            return redirect()->back();
        }

        $course->students()->attach($uid, ['role'=>'student', 'status'=>'pre-registered', 'option'=> $request->option, 'created_at'=> now()]);
        
        session()->flash('pre-registered', 'You have successfully pre-register. Please proceed to pay on your ');

        return redirect()->back();
        // return redirect(route('dashboard'));
    }

    public function remove(Course $course)
    {
        $course->students()->detach(auth()->user()->id);
        
        session()->flash('success', 'You have remove this class from your list successfully');        
        
        return redirect()->back();
    }

    private function registrationExists($uid, $cid)
    {
        $exists = Registration::where('user_id', $uid)
                    ->where('course_id', $cid)
                    ->where('role', 'student')
                    ->first();
        return $exists ? true : false;
    }
}






