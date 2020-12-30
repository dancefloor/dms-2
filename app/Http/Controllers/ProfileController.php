<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function checkout()
    {
        return view('profile.checkout');
    }

    public function catalogue()
    {
        return view('profile.catalogue');
    }

    public function reports()
    {
        return view('profile.reports');
    }
}
