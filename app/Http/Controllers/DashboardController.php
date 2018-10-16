<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\State;

class DashboardController extends Controller
{
	public function index()
    {
    	$data['cities'] = City::with('state')->get();
    	return view('dashboard',$data);
    }
}
