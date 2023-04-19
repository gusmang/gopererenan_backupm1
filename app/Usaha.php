<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usaha extends Authenticatable
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id', 'username', 'password','aktif'];
    protected $table='tb_usaha';

   

    
}
