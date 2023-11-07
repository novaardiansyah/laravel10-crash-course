<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class DashboardController extends Controller
{
  public function index()
  {
    $ideas = Idea::orderBy('created_at', 'desc');

    if (request()->has('search')) {
      $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
    }

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
      'ideas' => $ideas->paginate(3)
    ]);
  }
}
