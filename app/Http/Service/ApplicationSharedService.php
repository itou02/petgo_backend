<?php

namespace App\Http\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicationSharedService
{
    public function getApplicationShared()
    {
        $id = Auth::id();

        $result = DB::table('adoption_applications')
        ->where('status','=','申請中')
        ->where('user_id','=',$id)
        ->get();

    //     $s = array('content'=> $result[0],
    // 'resourse' => '共養');

    foreach($result as $res){
        $res['resourse']='';
    }

    // $s = json_decode($result, true);
    // $s[0]['resourse'] = "共養";
    //     dd($s);
        return $result;
    }

}