<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Umkm;
use App\UmkmBiodata;

class UmkmBiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['umkm_biodatas'] = UmkmBiodata::with('umkm')->get();
        return view('umkmbiodata.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['umkm'] = Umkm::get();
        return view('umkmbiodata.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $umkmbiodata = new UmkmBiodata;
        $umkmbiodata->fill($request->all());
        $umkmbiodata->save();
        // dd($request);
        return redirect()->route('umkmbiodatas.index');
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
        $data['umkm_biodatas'] = UmkmBiodata::find($id);
        $data['umkm'] = Umkm::get();

        return view('umkmbiodata.edit',$data);
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
        $umkmbiodata = UmkmBiodata::find($id);
        $umkmbiodata->fill($request->all());
        $umkmbiodata->update();

        return redirect()->route('umkmbiodatas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = UmkmBiodata::find($id)->delete();
        return response()->json($data);
    }
}
