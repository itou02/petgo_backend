<?php

namespace App\Http\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LoctaionService
{
    public function getcitys()
    {
        $citys = DB::table('citys')->get();

        return $citys;
    }

    public function getareas()
    {
        $areas = DB::table('areas')->get();

        return $areas;
    }
    
    public function onchange_getareas($id)
    {
        $areas = DB::table('areas')->where('city_id',$id)->get();

        return $areas;
    }
}
