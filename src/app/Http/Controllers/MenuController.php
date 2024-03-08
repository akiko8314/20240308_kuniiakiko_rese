<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('auth.main_menu');
        } else {
            return view('sub_menu');
        }
    }

    public function redirectToMyPage()
    {
        if (Auth::check()) {
            return redirect()->route('my_page.index');
        } else {
            return view('sub_menu');
        }
    }
}

