<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class IdeaController extends Controller
{
  public function store()
  {
    $validate = request()->validate([
      'content' => 'required|min:5|max:240',
    ]);

    Idea::create($validate);
    return redirect()->route('dashboard')->with('success', 'Idea created successfully');
  }

  public function show(Idea $idea)
  {
    return view('idea.show', compact('idea'));
  }

  public function edit(Idea $idea)
  {
    $editing = true;
    return view('idea.show', compact('idea', 'editing'));
  }

  public function update(Idea $idea)
  {
    $validate = request()->validate([
      'content' => 'required|min:5|max:240',
    ]);

    $idea->update($validate);
    return redirect()->route('idea.show', $idea->id)->with('success', 'Idea update successfully');
  }

  public function destroy(Idea $idea)
  {
    $idea->delete();
    return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
  }
}
