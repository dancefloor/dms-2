<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('roles.index')->with('roles', Role::paginate(10))->with('permissions', Permission::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create')->with('permissions', Permission::all());
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
            'name' => 'required|unique:roles|min:3|max:100'
        ]);

        $role = Role::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name,'-'),            
            'label' => $request->label,
        ]);

        
        if ($request->permissions) {
            $role->permissions()->attach($request->permissions);
        }

        session()->flash('success', 'Role created successfully');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit')->with('role', $role)->with('permissions', Permission::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
            'slug'  => Str::slug($request->name,'-'),
            'label' => $request->label,
        ]);

        if ($request->permissions) {
            $role->permissions()->sync($request->permissions);
        }

        session()->flash('success', 'Role updated successfully');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('success', 'Role deleted successfully');

        return redirect(route('roles.index'));
    }
}
