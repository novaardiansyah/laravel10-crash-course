<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class IdeaController extends Controller
{
  public function store()
  {
    request()->validate([
      'idea' => 'required|min:5|max:240',
    ]);

    $idea = new Idea([
      'content' => request()->get('idea', null)
    ]);
    $idea->save();

    return redirect()->route('dashboard')->with('success', 'Idea created successfully');
  }

  public function show(Idea $idea)
  {
    return view('idea.show', compact('idea'));
  }

  public function destroy(Idea $idea)
  {
    $idea->delete();
    return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
  }
}
