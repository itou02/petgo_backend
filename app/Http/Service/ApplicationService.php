<?php

namespace App\Http\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicationService
{
    public function getApplication($request)
    {
        $id = $request['userData']->id;

        $adoption = DB::table('adoption_applications')
        ->where('status','=','申請中')
        ->where('user_id','=',$id)
        ->get();

        $experience = DB::table('experience_applications')
        ->where('status','=','申請中')
        ->where('user_id','=',$id)
        ->get();

for($i=0 ;$i <= count($adoption)-1 ; $i++){
    $x = (array)$adoption[$i];
    $x['type'] = '共養';
    $adoption[$i] = (object)$x;
}

        return $adoption;
    }

}