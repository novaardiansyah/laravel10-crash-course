<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
  public function show(User $user)
  {
    $ideas = $user->ideas()->paginate(3);
    return view('users.show', compact('user', 'ideas'));
  }

  public function edit(User $user)
  {
    $editing = true;
    $ideas = $user->ideas()->paginate(3);
    return view('users.show', compact('user', 'editing', 'ideas'));
  }

  public function update(User $user)
  {
    //
  }
}
