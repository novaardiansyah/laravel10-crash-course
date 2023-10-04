<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
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

    return view('dashboard', ['users' => $users]);
  }
}
