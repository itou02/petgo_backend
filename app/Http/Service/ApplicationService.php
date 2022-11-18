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
        
        $totalapp = array();

        for($i=0 ;$i <= count($adoption)-1 ; $i++){
            $x = (array)$adoption[$i];
            $x['type'] = '共養';
            $totalapp = array_merge($totalapp,array($x));
            // $adoption[$i] = (object)$x;
        }

        for($i=0 ;$i <= count($experience)-1 ; $i++){
            $x = (array)$experience[$i];
            $x['type'] = '體驗';
            $totalapp = array_merge($totalapp,array($x));
            // $experience[$i] = (object)$x;
        }
//         $array1 = array("color" => "red", 2, 4);
// $array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
// $result = array_merge($array1, $array2);
// dd($result,array($adoption),$adoption);
        return $totalapp;
    }

}