<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Umkm;
use App\User;
use App\UmkmCategori;
use App\State;
use App\City;
use App\District;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $umkms = Umkm::get();
        return response()->json($umkms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $umkm = new Umkm;
        $umkm->fill($request->all());
        $umkm->save();

        return response()->json($umkm);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $umkm = Umkm::find($id);

        return response()->json($umkm);
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
        $umkm = Umkm::find($id);
        $umkm->fill($request->all());
        $umkm->update();

        return response()->json($umkm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $umkm = Umkm::find($id)->delete();
        return response()->json($umkm);
    }

    public function states(){
        $states = State::withCount('cities')->withCount('umkm')->get();
        return response()->json($states);
    }

    public function cities($state_id){
        $cities = City::where('state_id',$state_id)->withCount('umkm')->get();
        return response()->json($cities);
    }

    public function getByCity($city_id){
        $umkms = Umkm::where('city_id',$city_id)->with('umkm_category','state','city','district')->get();
        return response()->json($umkms);
    }

}
