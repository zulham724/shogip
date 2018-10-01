<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Umkm;
use App\UmkmAchievement;

class UmkmAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = UmkmAchievement::with('umkm')->get();
        return response()->json($achievements);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $achievement = new UmkmAchievement;
        $achievement->fill($request->all());
        $achievement->save();

        return response()->json($achievement);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $achievement = UmkmAchievement::find($id);

        return response()->json($achievement);
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
        $achievement = UmkmAchievement::find($id);
        $achievement->fill($request->all());
        $achievement->update();

        return response()->json($achievement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement = UmkmAchievement::find($id)->delete();
        return response()->json($achievement);
    }
}
