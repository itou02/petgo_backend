<?php

namespace App\Http\Service;

use Carbon\Carbon;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;

class ExperienceService
{
    // public function getAllExperience()
    // {
    //     $experiences = Experience::orderBy('created_at')->get();
    //     return $experiences;
    // }

    // 首頁 - 評論
    public function getComment()
    {
        // dd();
        $comment = DB::table('experiences')
            ->join('pets', 'experiences.pet_id', '=', 'pets.id')
            ->join('users', 'pets.user_id', '=', 'users.id')
            ->join('locations', 'users.location_id', '=', 'locations.id')
            ->select(
                'pets.img',
                'users.name AS userName',
                'pets.name AS petName',
                'experiences.comment',
                DB::raw('CONCAT(SUBSTR(locations.location, 1, 3), ", ", SUBSTR(locations.location, 4, 10)) AS locations'),
            )
            ->where('experiences.user_id', '!=', NULL)
            ->where('experiences.comment', '!=', '')
            ->orderBy('experiences.updated_at', 'desc')
            ->take(12)
            ->get();

        return $comment;
    }

    // 所有體驗
    public function getAllExperience()
    {
        $experiences = DB::table('experiences')
            ->join('pets', 'experiences.pet_id', '=', 'pets.id')
            ->join('users', 'pets.user_id', '=', 'users.id')
            ->join('locations', 'users.location_id', '=', 'locations.id')
            ->select(
                'experiences.id',
                'experiences.start_date',
                'experiences.end_date',
                'pets.img',
                'pets.name',
                'pets.variety',
                'pets.size',
                'pets.age',
                'pets.sex',
                DB::raw('CONCAT(SUBSTR(locations.location, 1, 3), ", ", SUBSTR(locations.location, 4, 10)) AS locations'),
            )
            ->where('experiences.user_id', '=', NULL)
            ->where('experiences.start_date', '>=', Carbon::today())
            ->get();
        return $experiences;
    }

    // 查看詳細
    public function getExperienceDetail($id)
    {
        $detail = DB::table('experiences')
            ->join('pets', 'experiences.pet_id', '=', 'pets.id')
            ->join('users', 'pets.user_id', '=', 'users.id')
            ->join('locations', 'users.location_id', '=', 'locations.id')
            ->select(
                'pets.*',
                'experiences.*',
                'users.name AS userName',
                DB::raw('CONCAT(SUBSTR(locations.location, 1, 3), ", ", SUBSTR(locations.location, 4, 10)) AS locations'),
            )
            ->where('experiences.id', '=', $id)
            ->where('experiences.user_id', '=', NULL)
            ->where('experiences.start_date', '>=', Carbon::today())
            ->get();
        return $detail;
    }

    // 查看詳細 寵物歷史評論
    public function pastComment($id)
    {
        $petID = DB::table('experiences')
            ->select(
                'pet_id',
            )
            ->where('id', '=', $id)
            ->get();
        $num = $petID[0]->pet_id;
        $comments = DB::table('experiences')
            ->join('users', 'experiences.user_id', '=', 'users.id')
            ->select(
                'users.img',
                'users.name',
                'experiences.comment',
            )
            ->where('experiences.pet_id', '=', $num)
            ->whereNotNull('experiences.user_id')
            ->get();
        return $comments;
    }

    // 體驗搜尋
    public function search($request)
    {
        $experiences = DB::table('experiences')
            ->join('pets', 'experiences.pet_id', '=', 'pets.id')
            ->join('users', 'pets.user_id', '=', 'users.id')
            ->join('locations', 'users.location_id', '=', 'locations.id')
            ->select(
                'experiences.id',
                'experiences.start_date',
                'experiences.end_date',
                'pets.img',
                'pets.name',
                'pets.variety',
                'pets.size',
                'pets.age',
                'pets.sex',
                DB::raw('SUBSTR(locations.location, 1, 3) AS city'),
                DB::raw('SUBSTR(locations.location, 4, 10) AS district'),
                DB::raw('CONCAT(SUBSTR(locations.location, 1, 3), ", ", SUBSTR(locations.location, 4, 10)) AS location'),
            )
            // ->where('experiences.user_id', '=', NULL)
            ->where('experiences.start_date', '>=', Carbon::today())
            ->whereDate('experiences.start_date', '<=', "$request->date") // 雙引號
            ->whereDate('experiences.end_date', '>=', "$request->date") // 雙引號
            ->where('location', 'like', '%' . $request->city . '%')
            ->where('location', 'like', '%' . $request->district . '%')
            ->where('pets.variety', 'like', '%' . $request->variety . '%')
            ->get();
        dd($experiences);
        return $experiences;
    }
}
