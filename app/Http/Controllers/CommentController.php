<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;

class CommentController extends Controller
{
  public function store(Idea $idea)
  {
    $comment = new Comment();
    $comment->idea_id = $idea->id;
    $comment->user_id = auth()->id();
    $comment->content = request()->content;
    $comment->save();

    return redirect()->route('idea.show', $idea->id)->with('success', 'Comment was posted successfully!');
  }
}
