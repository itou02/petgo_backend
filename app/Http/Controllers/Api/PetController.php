<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Service\PetService;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $pet;
    public function __construct()
    {
        $this->pet = new PetService();
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

    // 寵物清單
    public function pet_list()
    {
        $result = $this->pet->petList();
        // dd($result);
        if (!$result) {
            return response()->json(['status' => "There are no fur babies here."], 400);
        }
        return response()->json([
            'status' => 'These are your fur babies.',
            'req' => $result,
        ], 200);
    }

    // 寵物詳細資料
    public function pet_detail($id)
    {
        $result = $this->pet->petDetail($id);
        // dd($result);
        if (!$result) {
            return response()->json(['status' => "There are no fur babies here."], 400);
        }
        return response()->json([
            'status' => 'This is your fur baby.',
            'req' => $result,
        ], 200);
    }

    // 寵物清單 新增寵物
    public function add_pet(Request $request)
    {
        $newPet = $this->pet->addPet($request);
        return response()->json([
            'status' => 'Added successfully.',
            'req' => $newPet,
        ], 200);
    }

    // 寵物清單 刪除寵物
    public function delete_pet($id)
    {
        $delete = $this->pet->deletePet($id);
        if (!$delete) {
            return response()->json(['status' => "Failed to delete."], 400);
        }
        return response()->json([
            'status' => 'Successfully deleted.',
            'req' => $delete,
        ], 200);
    }
}
