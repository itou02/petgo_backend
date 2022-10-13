<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function get_all_experiences()
    {
        //
        $experiences = $this->experience->getAllExperience();
        if (!$experiences) {
            return response()->json(['status' => "查詢失敗"], 400);
        }
        return response()->json([
            // 'dd' => 'dd HI Show',
            'status' => '查詢成功',
            'req' => $experiences,
        ], 200);
    }
}
