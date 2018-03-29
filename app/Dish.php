<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = ['title', 'description', 'price', 'file_name'];
    protected $table = 'dishes';

    public function getUrlAttribute()
   {
     // return str_replace('public', 'storage', $this->file_name);
     $photoUrl = explode('/', $this->file_name);
     $photoUrl[0] = 'storage';
     $photoUrl = implode('/', $photoUrl);
     return $photoUrl;
   }
}
