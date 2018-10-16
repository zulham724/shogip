<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\City;
use App\Umkm;
use App\State;
use App\Biodata;
use App\UmkmAchievement;
use App\UmkmTraining;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["login"] = request()->login ?? "false";
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        // dd($data);
        return view('home',$data,$name);
    }

    

    public function biodata($umkm_id)
    {
        $data['biodatas'] = Biodata::where('umkm_id',$Umkm_id)->get();
        // dd($data);
        return view('biodata');
    }
}
