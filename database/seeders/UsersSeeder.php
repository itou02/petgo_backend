<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use ramsey\Uuid\Uuid;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Users = User::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => '郭佳棋',
            'phone' => '0905638773',
            'email' => 'zoe@gmail.com',
            'birth' => '2003-02-02',
            'sex' => '女',
            'intro' => '',
            'line' => '',
            'img' => '',
            'years' => '19',
            'amount' => '',
            'animals' => '',
            'space' => '',
            'thoughts' => '',
            'password' => Hash::make('eji ru8 fu6'),
            'location_id' => 1,
        ]);
        $Users = User::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => '白白',
            'phone' => '0910288299',
            'email' => 'exo0108@gmail.com',
            'birth' => '2003-01-08',
            'sex' => '女',
            'intro' => '',
            'line' => '',
            'img' => '',
            'years' => '19',
            'amount' => '',
            'animals' => '',
            'space' => '',
            'thoughts' => '',
            'password' => Hash::make('cj;6wu/6m4'),
            'location_id' => 2,
        ]);
        $Users = User::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => 'Chocobo',
            'phone' => '0926289869',
            'email' => 'chocobo0811@gmail.com',
            'birth' => '2003-02-08',
            'sex' => '女',
            'intro' => '',
            'line' => '',
            'img' => '',
            'years' => '19',
            'amount' => '',
            'animals' => '',
            'space' => '',
            'thoughts' => '',
            'password' => Hash::make('tp6qup30 '),
            'location_id' => 3,
        ]);
        $Users = User::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => 'Yoyo',
            'phone' => '0966408765',
            'email' => 'yoyo@gmail.com',
            'birth' => '2002-09-30',
            'sex' => '男',
            'intro' => '',
            'line' => '',
            'img' => '',
            'years' => '19',
            'amount' => '',
            'animals' => '',
            'space' => '',
            'thoughts' => '',
            'password' => Hash::make('cj;62u/3u.4'),
            'location_id' => 4,
        ]);
        $Users = User::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => 'Bruce',
            'phone' => '0963193137',
            'email' => 'bruce@gmail.com',
            'birth' => '2002-09-06',
            'sex' => '男',
            'intro' => '',
            'line' => '',
            'img' => '',
            'years' => '19',
            'amount' => '',
            'animals' => '',
            'space' => '',
            'thoughts' => '',
            'password' => Hash::make('vul t/6u.4'),
            'location_id' => 5,
        ]);
        // $Users = User::create([
        //     'name' => '',
        //     'phone' => '',
        //     'email' => '',
        //     'birth' => '',
        //     'intro' => '',
        //     'line' => '',
        //     'img' => '',
        //     'years' => '',
        //     'amount' => '',
        //     'animals' => '',
        //     'space' => '',
        //     'thoughts' => '',
        //     'password' => Hash::make(''),
        //     'location_id' => '',
        // ]);
    }
}
