<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\CoursesExport;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('courses.create');
    }

    /**
     * @param \App\Http\Requests\CourseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->validated());

        $request->session()->flash('course.id', $course->id);

        return redirect()->route('course.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Course $course)
    {
        $teachers = User::teachers();
        return view('courses.edit', compact('course'))->with('teachers', $teachers);
    }

    /**
     * @param \App\Http\Requests\CourseUpdateRequest $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        // dd($request->all());
        $course->update([
            'status'        => $request->status,
            'to_waiting'    => $request->to_waiting,
            'user_id'       =>  auth()->user()->id,
        ]);

        if ($request->classroom) {
            $course->classroom()->associate($request->classroom)->save();
        }

        if ($request->styles) {
            $course->styles()->sync($request->styles);            
        }
        
        if ($request->teachers) {
            $course->teachers()->sync($request->teachers, ['role'=>'student']);            
        }

        if ($request->students) {            
            //tutorial https://stackoverflow.com/questions/27230672/laravel-sync-how-to-sync-an-array-and-also-pass-additional-pivot-fields 
            //option 2 = updateExistingPivot?
            $studentsTable = [];
            foreach ($request->students as $key => $value) {    
                $studentsTable[$value] = ['role'=>'student'];               
            }            
            $course->students()->sync($studentsTable);            
        }
        
        session()->flash('success', 'Course updated successfully.');
        
        return redirect()->route('courses.index');

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course)
    {
        $course->delete();

        return redirect()->route('course.index');
    }

    public function view(Course $course)
    {
        // $course = Course::where('slug',$slug)->firstOrFail();
        // dd($course);
        return view('courses.view')->with('course', $course);
    }

    public function export() 
    {
        return Excel::download(new CoursesExport, 'courses.csv');
    }


}






