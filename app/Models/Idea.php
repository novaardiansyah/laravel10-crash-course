<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
  use HasFactory;

  protected $guarded = ['id', 'created_at', 'updated_at'];
  protected $with = ['user:id,name,email,bio,email', 'comments.user:id,name,email,bio,email'];

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function likes()
  {
    return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
  }
}
