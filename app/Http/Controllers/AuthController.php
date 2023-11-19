<?php

namespace App\Http\Controllers;

use App\Mail\RegisterSuccessEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
  public function register()
  {
    return view('auth.register');
  }

  public function store()
  {
    // * Validate the user
    $validate = request()->validate([
      'name'     => 'required|min:3|max:40',
      'email'    => 'required|email|unique:users,email',
      'password' => 'required|min:6|confirmed'
    ]);

    // * Create the user
    $user = User::create([
      'name'     => $validate['name'],
      'email'    => $validate['email'],
      'password' => Hash::make($validate['password'])
    ]);

    Mail::to($user->email)->cc(env('MAIL_CC_ADDRESS', ''))->send(new RegisterSuccessEmail($user));

    return redirect()->route('dashboard')->with('success', 'Account created successfully');
  }

  public function login()
  {
    return view('auth.login');
  }

  public function authenticate()
  {
    // * Validate the user
    $validate = request()->validate([
      'email'    => 'required|email',
      'password' => 'required|min:6'
    ]);

    if (!auth()->attempt($validate)) return redirect()->route('login')->withErrors(['email' => 'Email or password is wrong.']);

    request()->session()->regenerate();
    return redirect()->route('dashboard')->with('success', 'Welcome back ' . $validate['email']);
  }

  public function logout()
  {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('dashboard')->with('success', 'Logout successfully');
  }
}
