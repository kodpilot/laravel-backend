<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\cv_infos;
use ImageOptimizer;

class mobileAPIController extends Controller
{
    public function index(Request $request){
        return response(['status'=>1,'message'=>"hello world"]);
    }

    public function test(Request $request){
        return response(['status'=>1,'message'=>"key work properly"]);
    }

    // register function
    public function register(Request $request){
        $email = $request->email;
        if($email == null || $email == ""){
            return response(['status'=>0,'message'=>"Email is required"]);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response(['status'=>0,'message'=>"Email is not valid"]);
        }

        if (User::where('email', $email)->exists()) {
            return response(['status'=>0,'message'=>"Email is already taken."]);
        }
        $tel = $request->tel;
        if ($tel == null || $tel == "") {
            return response(['status'=>0,'message'=>"tel is required"]);
        }
        $username = $request->username;
        if ($username == null || $username == "") {
            return response(['status'=>0,'message'=>"username is required"]);
        }
        $name = $request->name;
        if($name == null || $name == ""){
            return response(['status'=>0,'message'=>"name is required"]);
        }
        $middle_name = $request->middle_name;

        $surname = $request->surname;
        if ($surname == null || $surname == "") {
            return response(['status'=>0,'message'=>"surname is required"]);
        }
        $password = $request->password;
        if ($password == null || $password == "") {
            return response(['status'=>0,'message'=>"password is required"]);
        }
        $repassword = $request->repassword;
        if ($repassword == null || $repassword == "") {
            return response(['status'=>0,'message'=>"repassword is required"]);
        }

        if ($password != $repassword) {
            return response(['status'=>0,'message'=>"password and repassword must be same"]);
        }

        $user = new User;
        $user->name = $name;
        $user->middlename = $middle_name;
        $user->surname = $surname;
        $user->tel = $tel;
        $user->username = $username;
        $user->email = $email;
        $user->password = ($password);
        $user->save();
        return response(['status'=>1,'message'=>"user created"]);
    }

    // login function
    public function login(Request $request){
        $email = $request->email;
        if($email == null || $email == ""){
            return response(['status'=>0,'message'=>"Email is required"]);
        }
        $password = $request->password;
        if ($password == null || $password == "") {
            return response(['status'=>0,'message'=>"password is required"]);
        }
        $user = User::where('email', $email)->first();
        if($user == null){
            return response(['status'=>0,'message'=>"user not found"]);
        }
        if(!Hash::check($password,$user->password)){
            return response(['status'=>0,'message'=>"password is not correct"]);
        }
        $user->api_private = uniqid();
        $user->api_public = Hash::make($user->api_private);
        $user->save();
        return response(['status'=>1,'message'=>"user logged in",'api_public'=>$user->api_public,'user_id'=>$user->id]);
    }
    // cv page function
    public function cvPage(Request $request){
        $user_id = $request->header('user_id');
        $cvs = cv_infos::select(
            'cv_infos.name as name',
            'cv_infos.description as description',
            'cv_infos.file as file',
            'cv_infos.created_at as date',
        )->where('user_id',$user_id)->get();
        
        return response(['status'=>1,'message'=>"cv page","file_path"=>"/assets/cv/",'data'=>$cvs]);
    }
    // cv add function
    public function cvAdd(Request $request){
        $user_id = $request->header('user_id');
        $name = $request->name;
        if($name == null || $name == ""){
            return response(['status'=>0,'message'=>"name is required"]);
        }
        $description = $request->description;
        if($description == null || $description == ""){
            return response(['status'=>0,'message'=>"description is required"]);
        }
        // $file = $request->file;
        // if($file == null || $file == ""){
        //     return response(['status'=>0,'message'=>"file is required"]);
        // }
        $file = "";

        if ($request->hasFile('file')) {
            try {
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/cv/') ,$file);
                $path= public_path('/assets/cv/').$file;
                ImageOptimizer::optimize($path);
            } catch (\Throwable $th) {
                \Log::error($th);
                return response(['status'=>0,'message'=>"unexcepted error occured when file save"]);
            }
        }
        if ($file == "") {
            return response(['status'=>0,'message'=>"file is required"]);
        }

        $cv = new cv_infos;
        $cv->name = $name;
        $cv->description = $description;
        $cv->file = $file;
        $cv->user_id = $user_id;
        $cv->save();
        return response(['status'=>1,'message'=>"cv added"]);
    }
}
