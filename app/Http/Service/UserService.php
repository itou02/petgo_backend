<?php

namespace App\Http\Service;

use App\Models\User;
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
    // public function getAllUser()
    // {
    //     $users = User::orderBy('created_at')->get();
    //     return $users;
    // }

    // 會員資料 - 個人
    public function UserInfo()
    {
        return Auth::user();
    }

    // 申請 - 基本資料
    public function ApplyBasicInfo()
    {
        $id = Auth::user()->id;
        $info = DB::table('users')
            ->join('locations', 'users.location_id', '=', 'locations.id')
            ->select(
                'users.name',
                'users.sex',
                'locations.location',
            )
            ->where('users.id', '=', $id)
            ->get();
        return $info;
    }

    // 會員資料 - 修改密碼
    public function ResetPassword($request)
    {
        $id = Auth::user()->id;
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
    public function RearingPet()
    {
        $id = Auth::user()->id;

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
                'part2.1' => $this->pet->petList(),
                'part2.2' => $this->pet->petList_experience(),
                'part2.3' => $this->pet->petList_shared(),
            ],
            'part3' => $part3,
            'part4' => $part4,
        ]);
    }

}
