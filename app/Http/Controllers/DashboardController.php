<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    // $idea = new Idea([
    //   'content' => 'Hello Youtube'
    // ]);
    // $idea->save();

    $users = [
      [
        'name' => 'John Doe',
        'age' => '23',
      ],
      [
        'name' => 'John Lee',
        'age' => '31'
      ]
    ];

    return view('dashboard', [
      'users' => $users,
      'ideas' => Idea::orderBy('created_at', 'desc')->get()
    ]);
  }
}
