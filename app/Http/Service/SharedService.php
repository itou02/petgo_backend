<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SharedService
{
    // 共養首頁
    public function getshared()
    {
        $shared = DB::select('SELECT a.id,a.pet_id,b.user_id,d.location,b.name,b.variety,b.size,b.sex,count(e.user_id)+1 as headcount
        from adoptions as a
        INNER JOIN pets as b on a.pet_id = b.id
        INNER JOIN users as c on b.user_id = c.id
        INNER JOIN locations as d on c.location_id = d.id
        INNER JOIN adopters as e on a.id = e.adoption_id
        ');

        return $shared;
    }
}
