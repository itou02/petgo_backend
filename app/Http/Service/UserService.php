<?php

namespace App\Http\Service;

use App\Models\User;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Service\PetService;

class UserService
{

    protected $pet;
    public function __construct()
    {
        $this->pet = new PetService();
    }

    // 會員資料 - 個人
    public function UserInfo($request)
    {
        return $request;
    }

    // 申請 - 基本資料
    public function ApplyBasicInfo()
    {
        $id = Auth::user()->id;
        $info = DB::table('users')
            ->join('locations', 'users.location_id', '=', 'locations.id')
            ->select(
                'users.*',
                DB::raw('SUBSTR(locations.location, 1, 3) AS city'),
                DB::raw('SUBSTR(locations.location, 4, 10) AS district'),
                // Carbon::now()->diff('users.birth'),
                // Carbon::parse('users.birth')->age,
                // 'users.birth'->diffInYears(\Carbon\Carbon::now())
            )
            ->where('users.id', '=', $id)
            ->get();
        return $info;
    }

    // 會員資料 - 修改
    public function EditUserInfo($request)
    {
        $id = Auth::user()->id;
        $locationID = Location::select('id')
            ->where('SUBSTR(location, 1, 3)', '=', $request->city)
            ->where('SUBSTR(location, 4, 10)', '=', $request->district)
            ->get();
        $result = User::where('id', $id)->update(
            [
                'name' => $request->name,
                'sex' => $request->sex,
                'phone' => $request->phone,
                'location_id' => $locationID,
                'email' => $request->email,
                'intro' => $request->intro,
            ]
        );
        return $result;
    }

    // 會員資料 - 修改密碼
    public function ResetPassword($request)
    {
        $id = $request['userData']->id;
        $user = User::findOrFail($id);
        if (Hash::check($request->old, $user->password)) {
            $result = User::where('id', $id)
                ->update(
                    [
                        'password' => Hash::make($request->password),
                    ]
                );
            return $result;
        }
    }

    // 忘記密碼 - 修改密碼
    public function RevisePassword($request, $id)
    {
        $result = User::where('id', $id)->update(
            [
                'password' => Hash::make($request->password),
            ]
        );
        return $result;
    }

    //取自身經歷內容
    public function RearingPet($request)
    {
        $id = $request['userData']->id;

        $part1 = DB::select('SELECT *
        from basic_infos
        WHERE user_id = ?',[$id]);
        
        $part3 = DB::select('SELECT id , years , amount , animals , space , thoughts
        from users
        WHERE id = ?',[$id]);

        $part4 = DB::select('SELECT *
        from resume_photos
        WHERE user_id = ?',[$id]);

        return response()->json([
            'part1' => $part1,
            'part2' => [
                'part2.1' => $this->pet->petList($request['userData']->id),
                'part2.2' => $this->pet->petList_experience($request['userData']->id),
                'part2.3' => $this->pet->petList_shared($request['userData']->id),
            ],
            'part3' => $part3,
            'part4' => $part4,
        ]);
    }

    //透過id取自身經歷內容(為了取非當前使用者)
    public function getRearingPet($id)
    {

        $part1 = DB::select('SELECT *
        from basic_infos
        WHERE user_id = ?', [$id]);

        $part3 = DB::select('SELECT id , years , amount , animals , space , thoughts
        from users
        WHERE id = ?', [$id]);

        $part4 = DB::select('SELECT *
        from resume_photos
        WHERE user_id = ?', [$id]);

        return response()->json([
            'part1' => $part1,
            'part2' => [
                'part2.1' => $this->pet->petList($id),
                'part2.2' => $this->pet->petList_experience($id),
                'part2.3' => $this->pet->petList_shared($id),
            ],
            'part3' => $part3,
            'part4' => $part4,
        ]);
    }

    // // 申請 - 基本資料
    // public function ApplyBasicInfo()
    // {
    //     $id = Auth::user()->id;
    //     $info = DB::table('users')
    //         ->join('locations', 'users.location_id', '=', 'locations.id')
    //         ->select(
    //             'users.name',
    //             'users.sex',
    //             'locations.location',
    //         )
    //         ->where('users.id', '=', $id)
    //         ->get();
    //     return $info;
    // }
}
