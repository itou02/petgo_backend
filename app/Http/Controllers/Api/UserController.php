<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Service\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $user;
    public function __construct()
    {
        $this->user = new UserService();
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // 會員資料
    public function user_info(Request $request)
    {
        
        $result = $this->user->UserInfo($request['userData']);
        $birth = Auth::user()->birth;
        $diff = Carbon::now()->diff($birth);
        $age = $diff->y;
        if (!$result) {
            return response()->json(['status' => "No such user."], 400);
        }
        return response()->json([
            'status' => 'Found this user.',
            'req' => $result,
            'age' => $age
        ], 200);
    }

    // 會員資料 - 修改
    public function edit_user_info($request)
    {
        $result = $this->user->EditUserInfo($request);
        if (!$result) {
            return response()->json(['status' => "Update failed."], 400);
        }
        return response()->json([
            'status' => 'Update completed.',
            'req' => $result,
        ], 200);
    }

    // 會員資料 - 修改密碼
    public function password_reset(Request $request)
    {
        if ($request->confirm != $request->password) {
            return response()->json(['status' => "The two passwords are not the same."], 400);
        }
        $result = $this->user->ResetPassword($request);
        if (!$result) {
            return response()->json(['status' => "Wrong old password."], 400);
        }
        return response()->json([
            'status' => 'Password has been updated.',
            'req' => $result,
        ], 200);
    }

    // 忘記密碼 - 修改密碼
    public function password_revise(Request $request, $id)
    {
        if ($request->confirm != $request->password) {
            return response()->json(['status' => "The two passwords are not the same."], 400);
        }
        $result = $this->user->RevisePassword($request, $id);
        if (!$result) {
            return response()->json(['status' => "Failed to change password."], 400);
        }
        return response()->json([
            'status' => 'Password has been updated.',
            'req' => $result,
        ], 200);
    }

    //取自身經歷
    public function rearing_pet(Request $request)
    {
        return response()->json([
            'status' => '資料擷取成功',
            'req' => $this->user->RearingPet($request),
        ], 200);
    }
    
}
