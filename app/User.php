<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname','date_of_birth','phone_number','email', 'password', 'address', 'city', 'zip_code', 'country'
    ];
    protected $attributes = [ //jei ne adminas registruojasi reik kad is admin 0 butu
      'is_admin' => 0
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin(){
      if ($this->is_admin == 1) {
        return true;
      }else{
        return false;
      }
    }
}
