<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    User::create([
      'name'     => $validate['name'],
      'email'    => $validate['email'],
      'password' => Hash::make($validate['password'])
    ]);
    
    return redirect()->route('dashboard')->with('success', 'Account created successfully');
  }
}
