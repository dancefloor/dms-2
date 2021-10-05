<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\User\CreateUserRequest as UserCreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateUserRequest $request)
    {
        //dd($request->all());
        $user = new CreateNewUser();
        
        $user->create([
            'name'          => $request->name,
            'lastname'      => $request->lastname,
            'email'         => $request->email,
            'country'       => $request->country,
            'facebook'      => $request->facebook,
            'birthday'      => $request->birthday,
            'mobile'        => $request->mobile,
            "aware_of_df"   => $request->aware_of_df,
            "gender"        => $request->gender,
            "password"      => $request->password,
            "password_confirmation" =>$request->password,
        ]);

        session()->flash('success', 'User created successfully.');

        return redirect(route('users.index'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'User deleted successfully');
        return redirect(route('users.index'));
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function import(Request $request)
    {
        // dd($request->all());
        Excel::import(new UsersImport, $request->file);
        
        return redirect(route('users.index'))->with('success', 'User list imported successfully!');
    }
}
