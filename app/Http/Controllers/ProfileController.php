<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected function show()
    {
      $user = \Auth::user();
      // dd($user);
      return view('auth.profile', [
        'user'=> $user
      ]);
    }
}
