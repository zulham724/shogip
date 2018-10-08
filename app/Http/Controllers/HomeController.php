<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // dd($data);
        return view('home',$data);
    }

    

    public function biodata($umkm_id)
    {
        $data['biodatas'] = Biodata::where('umkm_id',$Umkm_id)->get();
        // dd($data);
        return view('biodata');
    }
}
