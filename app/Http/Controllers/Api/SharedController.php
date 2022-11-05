<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Service\LoctaionService;
use App\Http\Service\SharedService;

class SharedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $location;
    protected $shared;
    
    public function __construct()
    {
        $this->location = new LoctaionService();
        $this->shared = new SharedService();
    }

    public function index()
    {
        //
        return response()->json([
            'status' =>'true',
            'citys' => $this->location->getcitys(),
            'area' => $this->location->getareas(),
            'shared' => $this->shared->getshared(),
        ],200);
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

        return response()->json([//還沒改完
            'status' =>'true',
            'pets' => $this->location->getcitys(),
            'shared' => $this->location->getareas(),
            'sharer' => $this->shared->getshared(),
        ],200);
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
}
