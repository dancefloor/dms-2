<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permissions.index')->with('permissions', Permission::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create')->with('roles', Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:permissions|min:3|max:255',                        
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'slug'  => Str::of($request->name)->snake(), 
            'label' => $request->label,
        ]);

        if ($request->roles) {
            $permission->roles()->attach($request->roles);
        }
        
        session()->flash('success', 'Permission created successfully');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit')->with('permission', $permission)->with('roles', Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update([
            'name'  => $request->name,
            'slug'  => Str::of($request->name)->snake(), 
            'label' => $request->label,
        ]);

        if ($request->roles) {
            $permission->roles()->sync($request->roles);
        }

        session()->flash('success', 'Permission updated successfully');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        
        session()->flash('success', 'Permission deleted successfully');

        return redirect(route('roles.index'));
    }
}
