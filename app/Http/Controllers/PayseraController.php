<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayseraController extends Controller
{
    public function accept(){
      return view('accept');
    }
    public function cancel(){
      return view('cancel');
    }
    public function callback(){
      return view('callback');
    }
}
