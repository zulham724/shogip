<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $data['umkm'] = Umkm::
        with('umkm_category','state','city','district')->get();
        
        return view('umkm.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["umkm"] = Umkm::get();
        $data["users"] = User::get();
        $data["umkm_categories"] = UmkmCategori::get();
        $data["states"] = State::get();
        $data["cities"] = City::get();
        $data["districts"] = District::get();
        
        return view('umkm.create',$data);
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

        return redirect()->route('umkms.index',$umkm->user_id);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['umkm'] = Umkm::find($id);
        $data['umkm_categories'] = UmkmCategori::get();
        $data['states'] = State::get();
        $data['cities'] = City::get();
        $data['districts'] = District::get();
        return view('umkm.edit',$data);
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

        return redirect()->route('umkms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Umkm::find($id)->delete();
        return response()->json($data);
    }

    public function peta($id)
    {
         $data['umkm'] = Umkm::with('umkm_category','state','city','district')
         ->where('city_id',$id)->get();
        return view('umkm.peta',$data);
    }
}
