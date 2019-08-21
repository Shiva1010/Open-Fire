<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Love extends Model
{

    use Notifiable;
    protected $table = 'Loves';

    protected $fillable = [
        'Lname', 'Lemail', 'Lpassword'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'Lid';
    }

}
