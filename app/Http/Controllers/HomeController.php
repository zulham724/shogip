<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Umkm;
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
        $data["cities"] = City::with('umkm')->get();
        $data["umkm"] = Umkm::get();
        // dd($data);
        return view('home',$data);
    }
}
