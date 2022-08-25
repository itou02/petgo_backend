<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adopter;

class AdoptersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Adopters = Adopter::create([
            'identity' => '共養人',
            'status' => true,
            'adoption_id' => 1,
            'user_id' => '81627ded-4e40-4332-b7e8-31fd714b23d1',
        ]);
    }
}
