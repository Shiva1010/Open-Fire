<?php

//  檔案位置：/Users/Shiva/open_fire/Round1_LV2_CRUD/app/Love.php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Love extends Model
{

    use Notifiable;
    protected $table = 'Loves';

//    protected $primaryKey = 'Lid';

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

    public function getKeyName()
    {
        return 'Lid';
    }

}


{'Lname' : '222',
'Lemail' : '222@mail',
'Lpassword': '12345678',
}