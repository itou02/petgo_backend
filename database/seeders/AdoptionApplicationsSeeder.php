<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdoptionApplication;

class AdoptionApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $AdoptionApplications = AdoptionApplication::create([
            'reason' => '感覺和阿金很投緣，我的工作時間彈性，自己也有養狗，可以有許多時間與他們作伴玩耍',
            'adoption_id' => 1,
            'user_id' => '81627ded-4e40-4332-b7e8-31fd714b23d1',
        ]);
    }
}
