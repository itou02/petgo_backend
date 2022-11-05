<?php

namespace App\Http\Service;

use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PetService
{
    // 我的寵物清單
    public function petList()
    {
        $id = Auth::user()->id;

        $pet = DB::table('pets')->where('user_id', $id)->get();

        if($pet==null)
        $pet = "還未新增寵物寵物";

        return $pet;
    }

    //我體驗過的寵物
    public function petList_experience()
    {
        $id = Auth::user()->id;

        $pet = DB::select('SELECT a.pet_id , b.name, b.variety,b.age,b.size,a.start_date,a.end_date,a.user_id
        from experiences as a
        INNER JOIN pets as b on a.pet_id = b.id
        where a.user_id = ?
        GROUP by a.pet_id',[$id]);

        if($pet==null)
        $pet = "還未體驗過寵物";

        return $pet;
    }

    //我共享過的寵物
    public function petList_shared()
    {
        $id = Auth::user()->id;

        $pet = DB::select('SELECT b.adoption_id , a.pet_id , c.name, c.variety , c.age , c.size , b.created_at , b.updated_at , b.user_id
        from adoptions as a
        INNER JOIN adopters as b on a.id = b.adoption_id
        INNER JOIN pets as c on a.pet_id = c.id
        where b.user_id = ?
        GROUP by a.pet_id',[$id]);
        
        if($pet==null)
        $pet = "還未共享過寵物";

        return $pet;
    }

    // 寵物詳細資料
    public function petDetail($id)
    {
    }
}
