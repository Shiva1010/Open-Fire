<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;



//class Nurse extends Model


class Nurse extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guard = 'nurse';

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}



