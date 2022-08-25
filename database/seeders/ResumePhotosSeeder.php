<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResumePhoto;

class ResumePhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ResumePhotos = ResumePhoto::create([
            'photo' => 'img\pets\149492185_717970748886241_9005420809526290102_n.jpg',
            'user_id' => '81627ded-4e40-4332-b7e8-31fd714b23d1',
        ]);

        $ResumePhotos = ResumePhoto::create([
            'photo' => 'img\pets\199037297_958887131627708_3149007937679931576_n.jpg',
            'user_id' => '81627ded-4e40-4332-b7e8-31fd714b23d1',
        ]);

        $ResumePhotos = ResumePhoto::create([
            'photo' => 'img\pets\255564429_205469681731363_1261555689635370276_n.jpg',
            'user_id' => '81627ded-4e40-4332-b7e8-31fd714b23d1',
        ]);
    }
}
