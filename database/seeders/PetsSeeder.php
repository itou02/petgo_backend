<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Pets = Pet::create([
            'name' => '吉米',
            'variety' => '傑克羅素耿',
            'size' => '小型',
            'sex' => '公',
            'age' => '4',
            'start_date' => '2018-03',
            'end_date' => '',
            'intro' => '屁孩 喜歡女生 喜歡正義',
            'img' => 'img\pets\297138530_824293608935160_306620092358476591_n.jpg',
            'remind' => '吉米運動量大要特別注意',
            'ligation' => '否',
            'hospital' => '梅島動物醫院',
            'hospital_address' => '台中市西屯區西屯路三段148之37號',
            'contact_person' => '黃祐祐',
            'contact_phone' => '0966408765',
            'user_id' => "81627ded-4e40-4332-b7e8-31fd714b23d1",
        ]);

        $Pets = Pet::create([
            'name' => '右邊',
            'variety' => '米克斯',
            'size' => '中型',
            'sex' => '母',
            'age' => '2',
            'start_date' => '2018-11',
            'end_date' => '',
            'intro' => '',
            'img' => 'img\pets\cat-gabad275e1_1920.jpg',
            'remind' => '',
            'ligation' => '否',
            'hospital' => '佳群動物醫院',
            'hospital_address' => '台中市西屯區福雅路51號',
            'contact_person' => '白白',
            'contact_phone' => '0910288299',
            'user_id' => "39543ae1-bdd0-41e1-9755-cfe052da7ab1",
        ]);

        $Pets = Pet::create([
            'name' => '阿金',
            'variety' => '台灣犬',
            'size' => '中型',
            'sex' => '母',
            'age' => '1',
            'start_date' => '',
            'end_date' => '',
            'intro' => '可愛又活潑的女孩 會追車 也會衝撞人類',
            'img' => 'img\pets\dog-ge48337608_1920.jpg',
            'remind' => '不可以餵她雞骨頭 也不能在她面前吃東西 會被奪走的',
            'ligation' => '是',
            'hospital' => '佳群動物醫院',
            'hospital_address' => '台中市西屯區福雅路51號',
            'contact_person' => '白白',
            'contact_phone' => '0910288299',
            'user_id' => "39543ae1-bdd0-41e1-9755-cfe052da7ab1",
        ]);

        $Pets = Pet::create([
            'name' => 'Cecilia',
            'variety' => '布偶貓',
            'size' => '大型',
            'sex' => '女',
            'age' => '2',
            'start_date' => '2020-03',
            'end_date' => '',
            'intro' => '溫馴漂亮又可愛 黏人愛玩',
            'img' => 'img\pets\cat-ga1fad45cb_1920.jpg',
            'remind' => '腸胃較為脆弱，不宜過多餵食',
            'ligation' => '是',
            'hospital' => '永康動物醫院',
            'hospital_address' => '台中市西屯區永福路167號',
            'contact_person' => '佳棋',
            'contact_phone' => '0926289869',
            'user_id' => "8b68a9ed-0eea-4216-8183-034823b58bca",
        ]);

        $Pets = Pet::create([
            'name' => 'Google',
            'variety' => '法鬥',
            'size' => '中型',
            'sex' => '母',
            'age' => '8',
            'start_date' => '2012-05',
            'end_date' => '',
            'intro' => '懶懶的',
            'img' => 'img\pets\french-bulldog-g0cb6908e3_1920.jpg',
            'remind' => '會亂吃東西 要注意',
            'ligation' => '否',
            'hospital' => '諾德動物醫院',
            'hospital_address' => '台中市西屯區青海路二段207-2號',
            'contact_person' => '佑佑',
            'contact_phone' => '0963193137',
            'user_id' => "b4ca2bac-48c8-468c-83ec-2813c3a74061",
        ]);

        // $Pets = Pet::create([
        //     'name' => '',
        //     'variety' => '',
        //     'size' => '',
        //     'sex' => '',
        //     'age' => '',
        //     'start_date' => '',
        //     'end_date' => '',
        //     'intro' => '',
        //     'img' => '',
        //     'remind' => '',
        //     'ligation' => '',
        //     'hospital' => '',
        //     'hospital_address' => '',
        //     'contact_person' => '',
        //     'contact_phone' => '',
        //     'user_id' => 5,
        // ]);
    }
}
