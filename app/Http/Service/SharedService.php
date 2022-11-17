<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SharedService
{
    //
    public function getshared()//共養畫面共養寵物列表
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

    public function getSharedForLook($id)
    {
        $result = DB::table('adoptions')->where('id',$id)->get();
        return $result;
    }

    public function getMain_Sharer($id)//主共養者資訊
    {
        $sharer = DB::table('adoptions')
        ->join('pets', 'adoptions.pet_id', '=', 'pets.id')
        ->join('users', 'pets.user_id', '=', 'users.id')
        ->select('adoptions.id', 'pets.id','users.*')
        ->where('adoptions.id',$id)->get();

        return $sharer;
    }

    public function getSharer($id)//次共養者資訊
    {
        $sharer = DB::table('adopters')->where('adoption_id',$id)->get();
        return $sharer;
    }

    public function getSharerIsMy($id)//看共養內是否有我
    {
        $sharer = DB::table('adopters')->where('adoption_id',$id)->get();
        return $sharer;
    }
}
