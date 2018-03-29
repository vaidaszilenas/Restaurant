<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = ['users_id','total_amount','tax_amount'];
  protected $table = 'order';


  public function carts(){
    return $this->hasMany('App\Cart');
  }
  public function user(){
    return $this->belongsTo('App\User', 'users_id');
  }
  public function dishes(){
    return $this->hasManyThrough('App\Cart', 'App\Dish');
  }
}
