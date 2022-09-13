<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(LocationsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PetsSeeder::class);
        $this->call(ExperiencesSeeder::class);
        $this->call(ExperienceApplicationsSeeder::class);
        $this->call(AdoptionsSeeder::class);
        $this->call(AdoptersSeeder::class);
        $this->call(AdoptionApplicationsSeeder::class);
        $this->call(BasicInfoSeeder::class);
        $this->call(ResumePhotosSeeder::class);

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);        
    }
}
