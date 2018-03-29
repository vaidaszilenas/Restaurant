<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['id','dishes_id','order_id','token'];
    protected $table = 'cart';


    public function dishes(){
      return $this->belongsTo('App\Dish');
    }
}
