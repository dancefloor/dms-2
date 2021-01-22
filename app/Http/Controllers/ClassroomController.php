<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\ClassroomStoreRequest;
use App\Http\Requests\ClassroomUpdateRequest;
use Illuminate\Http\Request;
use App\Exports\ClassroomsExport;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $classrooms = Classroom::all();

        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('classrooms.create');
    }

    /**
     * @param \App\Http\Requests\ClassroomStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomStoreRequest $request)
    {
        $classroom = Classroom::create($request->validated());

        $request->session()->flash('classroom.id', $classroom->id);

        return redirect()->route('classrooms.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Classroom $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Classroom $classroom)
    {
        return view('classrooms.show', compact('classroom'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Classroom $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * @param \App\Http\Requests\ClassroomUpdateRequest $request
     * @param \App\Classroom $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomUpdateRequest $request, Classroom $classroom)
    {
        $classroom->update($request->validated());

        $request->session()->flash('classroom.id', $classroom->id);

        return redirect()->route('classrooms.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Classroom $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route('classrooms.index');
    }

    public function export() 
    {
        return Excel::download(new ClassroomsExport, 'classrooms.csv');
    }
}
