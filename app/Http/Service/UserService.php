<?php

namespace App\Http\Service;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
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
}
