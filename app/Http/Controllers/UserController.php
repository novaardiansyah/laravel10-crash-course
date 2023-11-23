<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function show(User $user)
  {
    $ideas = $user->ideas()->paginate(3);
    return view('users.show', compact('user', 'ideas'));
  }

  public function edit(User $user)
  {
    $this->authorize('update', $user);
    return view('users.edit', compact('user'));
  }

  public function update(User $user)
  {
    $this->authorize('update', $user);
    $validate = request()->validate([
      'name'  => 'required|min:3|max:40',
      'bio'   => 'min:3|max:255',
      'image' => 'image'
    ]);

    if (request()->has('image')) {
      $image_path = request()->file('image')->store('profile', 'public');
      $validate['image'] = $image_path;

      Storage::disk('public')->delete($user->image ?? '');
    }

    $user->update($validate);
    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
  }

  public function profile()
  {
    return $this->show(auth()->user());
  }
}
