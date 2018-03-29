<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  protected $fillable = ['users_id', 'user', 'name', 'phone', 'people_amount', 'date'];
  protected $table = 'reservations';


  public function users(){
    return $this->belongsTo('App\User', 'users_id');
  }
}
