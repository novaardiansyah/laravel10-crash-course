<?php

namespace App\Http\Controllers;

use App\Http\Requests\Idea\CreateIdeaRequest;
use App\Http\Requests\Idea\UpdateIdeaRequest;
use App\Models\Idea;

class IdeaController extends Controller
{
  public function store(CreateIdeaRequest $request)
  {
    $validate = $request->validated();
    
    $validate['user_id'] = auth()->id();
    
    Idea::create($validate);
    return redirect()->route('dashboard')->with('success', 'Idea created successfully');
  }

  public function show(Idea $idea)
  {
    return view('idea.show', compact('idea'));
  }

  public function edit(Idea $idea)
  {
    $this->authorize('update', $idea);
    
    $editing = true;
    return view('idea.show', compact('idea', 'editing'));
  }

  public function update(UpdateIdeaRequest $request, Idea $idea)
  {
    $this->authorize('update', $idea);

    $validate = $request->validated();

    $idea->update($validate);
    return redirect()->route('idea.show', $idea->id)->with('success', 'Idea update successfully');
  }

  public function destroy(Idea $idea)
  {
    $this->authorize('delete', $idea);

    $idea->delete();
    return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
  }
}
