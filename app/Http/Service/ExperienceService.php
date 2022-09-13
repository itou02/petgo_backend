<?php

namespace App\Http\Service;

use App\Models\Experience;
use Illuminate\Support\Facades\DB;

class ExperienceService
{
    // public function getAllExperience()
    // {
    //     $experiences = Experience::orderBy('created_at')->get();
    //     return $experiences;
    // }

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
                DB::raw('SUBSTR(locations.location, 1, 3) AS city'),
                DB::raw('SUBSTR(locations.location, 4, 10) AS district')
            )
            ->get();
        return $experiences;
    }
}
