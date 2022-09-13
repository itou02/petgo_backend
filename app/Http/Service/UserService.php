<?php

namespace App\Http\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAllUser()
    {
        $users = User::orderBy('created_at')->get();
        return $users;
    }

    public function ResetPassword($request, $id)
    {
        $result = User::where('id', $id)->update(
            [
                'password' => Hash::make($request->password),
            ]
        );
        return $result;
    }
}
