<?php

namespace App\Http\Service;

use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PetService
{
    // 我的寵物清單
    public function petList($request)
    {
        $id = $request->id;
        $pet = DB::table('pets')->where('user_id', $id)->get();
        if ($pet->toArray() == null) {
            $pet = "還未新增寵物寵物";
        }
        return $pet;
    }

    // 我體驗過的寵物
    public function petList_experience($id)
    {
        $pet = DB::select('SELECT a.pet_id , b.name, b.variety,b.age,b.size,a.start_date,a.end_date,a.user_id
        from experiences as a
        INNER JOIN pets as b on a.pet_id = b.id
        where a.user_id = ?
        GROUP by a.pet_id', [$id]);
        if ($pet == null)
            $pet = "Not yet experienced.";
        return $pet;
    }

    //我共享過的寵物
    public function petList_shared($id)
    {
        $pet = DB::select('SELECT b.adoption_id , a.pet_id , c.name, c.variety , c.age , c.size , b.created_at , b.updated_at , b.user_id
        from adoptions as a
        INNER JOIN adopters as b on a.id = b.adoption_id
        INNER JOIN pets as c on a.pet_id = c.id
        where b.user_id = ?
        GROUP by a.pet_id', [$id]);
        if ($pet == null)
            $pet = "Haven't adopted any pets yet.";
        return $pet;
    }

    // 寵物詳細資料
    public function petDetail($id)
    {
        $pet = DB::table('pets')->where('id', $id)->get();
        return $pet;
    }

    // 寵物清單 新增寵物
    public function addPet($request)
    {
        $request->all();
        $result = Pet::create(
            [
                'img' => $request->img,
                'name' => $request->name,
                'sex' => $request->sex,
                'variety' => $request->variety,
                'age' => $request->age,
                'size' => $request->size,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'intro' => $request->intro,
                'remind' => $request->remind,
                'hospital' => $request->hospital,
                'hospital_address' => $request->hospital_address,
                'ligation' => $request->ligation,
                'contact_person' => $request->contact_person,
                'contact_phone' => $request->contact_phone,
            ]
        );
        return $result;
    }

    // 寵物清單 刪除寵物
    public function deletePet($id)
    {
        $result = Pet::where('id', $id)->delete();
        return $result;
    }

    // 下拉選單 - 品種
    public function variety()
    {
        $varieties = DB::table('experiences')
            ->join('pets', 'experiences.pet_id', '=', 'pets.id')
            ->join('users', 'pets.user_id', '=', 'users.id')
            ->join('locations', 'users.location_id', '=', 'locations.id')
            ->select(
                'pets.variety',
            )
            ->where('experiences.user_id', '=', NULL)
            ->where('experiences.start_date', '>=', Carbon::today())
            ->distinct()->get();
        return $varieties;
    }
}
