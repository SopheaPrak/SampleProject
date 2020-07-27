<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function changePassword()
    {
        return view('auth.passwords.reset');
    }
}
