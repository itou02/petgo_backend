<?php

namespace App\Http\Service;

use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PetService
{
    // 寵物清單
    public function petList()
    {
        $id = Auth::user()->id;
        $pet = DB::table('pets')->where('user_id', $id)->get();
        return $pet;
    }

    // 寵物詳細資料
    public function petDetail($id)
    {
    }
}
