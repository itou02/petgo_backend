<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Experiences = Experience::create([
            'reason' => '想讓更多的人體會到吉米的可愛，也希望吉米有多一點玩伴',
            'need' => '環境寬敞、飲食不缺',
            'start_date' => '2022-12-22',
            'end_date' => '2022-12-25',
            'comment' => '',
            'pet_id' => 1,
            'user_id' => "81627ded-4e40-4332-b7e8-31fd714b23d1",
        ]);

        $Experiences = Experience::create([
            'reason' => '臨時需要一小段時間不被打擾，需要有人幫忙照看一下cc，陪她玩',
            'need' => '請在期間內到約定地點(再詳談)陪伴照看，需要是安靜溫和的人',
            'start_date' => '2021-12-23',
            'end_date' => '2021-12-25',
            'comment' => '',
            'pet_id' => 4,
            'user_id' => null,
        ]);
    }
}
