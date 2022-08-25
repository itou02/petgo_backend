<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adoption;

class AdoptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Adoptions = Adoption::create([
            'reason' => '因工作原因須頻繁前往外地出差，需要長時間有夥伴在出差期間照顧阿金',
            'need' => '尋找長期可共同飼養的對象，希望有足夠的時間陪伴玩耍',
            'pet_id' => 3,
        ]);
    }
}
