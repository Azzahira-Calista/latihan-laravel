<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.index', [
            "title" => "login_page",
            "users" => User::all()
        ]);
    }

    public function auth(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect('/about');
        // }

        // return back()->with('loginError', 'login gagal, silahkan coba lagi');

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($validatedData)) {
            return back()->with('error', 'Invalid credentials');
        }

        return redirect('/about');
    }

    public function register()
    {
        return view('auth.register', [
            "title" => "register_page",
            "users" => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $validator['password'] = Hash::make($validator['password']);
        $user = User::create($validator);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'level' => 'admin'
        // ]);

        if ($user) {
            return redirect('/auth/login')->with('success', 'Register Success');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth/login');
    }
}
