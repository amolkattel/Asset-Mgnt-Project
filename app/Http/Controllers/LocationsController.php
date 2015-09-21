<?php

namespace App\Http\Controllers;

use App\Location;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:manage_assets');
    //     parent::__construct();
    // }
    
    public function map(){
 
        $locations = Location::all();
        // $locations = Location::distance(0.1,'45.05,7.6667')->get();
 
        return view('locations.map')->with(['locations'=>$locations]);
 
    }
}
