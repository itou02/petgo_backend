<?php

namespace App\Http\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAllUser()
    {
        $users = User::orderBy('created_at')->get();
        return $users;
    }

    // 會員資料 - 個人
    public function UserInfo()
    {
        return Auth::user();
    }

    // 會員資料 - 修改密碼
    public function ResetPassword($request, $id)
    {
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
