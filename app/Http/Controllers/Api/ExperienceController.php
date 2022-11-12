<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Service\PetService;
use App\Http\Service\UserService;
use App\Http\Service\ExperienceService;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $experience;
    public function __construct()
    {
        $this->pet = new PetService();
        $this->user = new UserService();
        $this->experience = new ExperienceService();
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

    // 首頁 - 評論
    public function get_comment(Request $request)
    {
        $comments = $this->experience->getComment();
        if (!$comments) {
            return response()->json(['status' => "No comments."], 400);
        }
        return response()->json([
            // 'dd' => 'dd HI Store',
            'status' => 'Found comments.',
            'req' => $comments,
        ], 200);
    }

    // 所有體驗
    public function get_all_experiences()
    {
        //
        $experiences = $this->experience->getAllExperience();
        $varieties =  $this->pet->variety();
        if (!$experiences) {
            return response()->json(['status' => "Query failed."], 400);
        }
        return response()->json([
            'status' => 'Search successful.',
            'experiences' => $experiences, // 卡片
            'varieties' => $varieties, // 下拉選單 品種
        ], 200);
    }

    // 查看詳細
    public function get_experience_detail($id)
    {
        //
        $detail = $this->experience->getExperienceDetail($id);
        $comments = $this->experience->pastComment($id);
        if (!$detail) {
            return response()->json(['status' => "Query failed."], 400);
        }
        return response()->json([
            'status' => 'Search successful.',
            'detail' => $detail, // 寵物詳細資訊
            'comments' => $comments, // 寵物歷史評論
        ], 200);
    }

    // 體驗搜尋
    public function select_experiences(Request $request)
    {
        //
        $experiences = $this->experience->search($request);
        if (!$experiences) {
            return response()->json(['status' => "Query failed."], 400);
        }
        return response()->json([
            'status' => 'Search successful.',
            'req' => $experiences,
        ], 200);
    }

    // 體驗申請 - 顯示
    public function basic_info()
    {
        $basicInfo = $this->user->ApplyBasicInfo();
        $user = $this->user->UserInfo();
        $diff = Carbon::now()->diff($user->birth);
        $age = $diff->y;
        dd($basicInfo, $age);
        if (!$basicInfo) {
            return response()->json(['status' => "Query failed."], 400);
        }
        return response()->json([
            'status' => 'Search successful.',
            'req' => $basicInfo,
            'age' => $age,
        ], 200);
    }
}
