<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
  public function store()
  {
    $idea = new Idea([
      'content' => request()->get('idea', null)
    ]);
    $idea->save();

    return redirect()->route('dashboard');
  }
}
