<?php

namespace App\Http\Controllers\MainPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dish;

class IndexController extends Controller
{

    public function index()
    {
      $dishes = Dish::limit(3)->get();
      return view('mainpage/index', [
        'dishes' => $dishes
      ]);
    }
}
