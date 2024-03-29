<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function checkout()
    {
        return view('profile.checkout');
    }

    public function cart()
    {
        return view('profile.cart');
    }

    public function catalogue()
    {
        return view('profile.catalogue');
    }

    public function reports()
    {
        return view('profile.reports');
    }

    public function orders()
    {
        return view('profile.orders');
    }
}
