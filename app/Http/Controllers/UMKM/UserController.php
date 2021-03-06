<?php

namespace App\Http\Controllers\UMKM;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Biodata;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('umkmuser.profil',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        
        // dd($request) ;
        $user = User::find($id);
        $user->fill($request['user']);
        if(isset($request['user']['avatar'])){
        $path = $request['user']['avatar']->store('user');
        // dd($path);
        $user->avatar = $path;
        // if($request['user']['avatar']){
        //     $path = $request['user']['avatar']->store('uploads/avatars');
        //     $file = Storage::delete($request['user']['avatar']);
        //     $user->avatar = $path;
            // dd("yey",$user);
        }
        $user->update();

        // $biodata = Biodata::where('user_id',$id)->first();
        // $biodata->fill($request['biodata']);
        // $biodata->update();
        // dd($biodata,$user);
        return redirect()->route('user.index');

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
