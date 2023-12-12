<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // User is already logged in, redirect them to a specific route
            $user = Auth::user();
            if ($user->role == 'guru') {
                return redirect()->intended('guru');
               // return redirect()->route('guru.index'); // Replace 'guru.index' with your guru dashboard route
            } elseif ($user->role == 'pelajar') {
                return redirect()->intended('pelajar'); // Replace 'pelajar.index' with your pelajar dashboard route
            }
            // Default redirection for authenticated users
            return redirect('/'); // Or any default route you want to redirect to
        }
    
        return view('login');
    }
    

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'guru') {
                return redirect()->intended('guru');
            } elseif ($user->role == 'pelajar') {
                return redirect()->intended('pelajar');
            }
            return redirect()->intended('/');
        }

        return redirect('/')->withInput()->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout()
    {
        
        Auth::logout();
        return redirect('/');
    }
}


/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $credentials = $request->only('username','password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user->role == 'guru') {
                    return redirect()->intended('guru');
                } elseif ($user->role == 'pelajar') {
                    return redirect()->intended('pelajar');
                }
                return redirect()->intended('/');
            }
        return redirect('/')->withInput()->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout() {
        Session::flush();        
        Auth::logout();
        return redirect('/');
    }
}

*/