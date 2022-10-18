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

    public function getComment()
    {
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

    public function getAllExperience()
    {
        $experiences = DB::table('experiences')
            ->join('pets', 'experiences.pet_id', '=', 'pets.id')
            ->join('users', 'pets.user_id', '=', 'users.id')
            ->join('locations', 'users.location_id', '=', 'locations.id')
            ->select(
                'experiences.start_date',
                'experiences.end_date',
                'pets.name',
                'pets.variety',
                'pets.size',
                'pets.age',
                'pets.sex',
                DB::raw('CONCAT(SUBSTR(locations.location, 1, 3), ", ", SUBSTR(locations.location, 4, 10)) AS locations'),
            )
            ->where('experiences.user_id', '=', NULL)
            ->where('experiences.start_date', '>=', 'Carbon::today()')
            ->get();
        return $experiences;
    }
}
