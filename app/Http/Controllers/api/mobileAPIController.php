<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mobileAPIController extends Controller
{
    public function index(Request $request){
        return response(['status'=>1,'message'=>"hello world"]);
    }
    public function register(Request $request){

    }
    public function login(Request $request){
        
    }
}
