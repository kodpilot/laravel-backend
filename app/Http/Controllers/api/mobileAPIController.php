<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\cv_infos;
use App\Models\cv_details;
use App\Models\profile_comments;
use App\Models\certificates;
use ImageOptimizer;

class mobileAPIController extends Controller
{
    public function index(Request $request){
        return response(['status'=>1,'message'=>"hello world"]);
    }

    public function test(Request $request){
        $detail = cv_details::where('id',1)->first();
        $detail->verification(['ehe'=>"ehe"]);
        return response(['status'=>1,'message'=>$detail]);
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
            'cv_infos.id as id',
            'cv_infos.name as name',
            'cv_infos.description as description',
            'cv_infos.file as file',
            'cv_infos.selected as selected',
            'cv_infos.created_at as date',
        )->where('user_id',$user_id)->get();
        
        return response(['status'=>1,'message'=>"cv page","file_path"=>"/assets/cv/",'data'=>$cvs]);
    }

    // cv details function
    public function cvDetails(Request $request , $cv_id = null){
        $user_id = $request->header('user_id');
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $cv_details = cv_details::select(
            'cv_details.parameter as parameter',
            'cv_details.value as value',
            'cv_details.checked as checked',
            'cv_details.created_at as date',
        )->where('cv_id',$cv_id)->get();
        return response(['status'=>1,'message'=>"cv details","file_path"=>"/assets/cv/cv-".$cv_id."/",'data'=>$cv_details]);
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

    // cv details add
    public function cvDetailsAdd(Request $request,$cv_id=null){
        $user_id = $request->header('user_id');
        if($cv_id == null || $cv_id == ""){
            return response(['status'=>0,'message'=>"cv_id is required"]);
        }
        $parameter = $request->parameter;
        if($parameter == null || $parameter == ""){
            return response(['status'=>0,'message'=>"parameter is required"]);
        }
        $value = $request->value;
        if($value == null || $value == ""){
            return response(['status'=>0,'message'=>"value is required"]);
        }
        $cv = new cv_details;
        $cv->parameter = $parameter;
        $cv->value = $value;
        $cv->cv_id = $cv_id;
        $cv->save();
        return response(['status'=>1,'message'=>"cv details added"]);
    }

    // profile add comment
    public function addProfileComment(Request $request , $profile_id = null){
        $user_id = $request->header('user_id');

        if($profile_id == null || $profile_id == ""){
            return response(['status'=>0,'message'=>"profile_id is required"]);
        }
        $comment_id = $request->comment_id == null ? 0 : $request->comment_id;

        $rate = $request->rate == null ? 0 : $request->rate;

        if($comment_id == 0){
            if($rate == null || $rate == ""){
                return response(['status'=>0,'message'=>"rate is required"]);
            }
        }
        else{
            $rate = 0;
            $check = profile_comments::where('id',$comment_id)->first();
            if($check == null ){
                return response(['status'=>0,'message'=>"comment not found"]);
            }
            $control_sub = $check->comment_id != 0;
            if($control_sub){
                return response(['status'=>0,'message'=>"this is sub comment"]);
            }
        }

        $comment = $request->comment;
        if($comment == null || $comment == ""){
            return response(['status'=>0,'message'=>"comment is required"]);
        }

        $platform = $request->platform;
        if($platform == null || $platform == ""){
            return response(['status'=>0,'message'=>"platform is required"]);
        }

        $profile_comment = new profile_comments;
        $profile_comment->comment = $comment;
        $profile_comment->comment_id = $comment_id;
        $profile_comment->profile_id = $profile_id;
        $profile_comment->user_id = $user_id;
        $profile_comment->platform = $platform;
        $profile_comment->rate = $rate;
        $profile_comment->save();
        return response(['status'=>1,'message'=>"comment added"]);
    }

    // profile comments
    public function getProfileComments(Request $request ){
        $user_id = $request->header('user_id');
        $profile_id = $request->profile_id;
        if($profile_id == null || $profile_id == ""){
            return response(['status'=>0,'message'=>"profile_id is required"]);
        }
        $comments = profile_comments::select(
            'profile_comments.id as id',
            'profile_comments.comment as comment',
            'profile_comments.comment_id as comment_id',
            'profile_comments.profile_id as profile_id',
            'profile_comments.user_id as user_id',
            'profile_comments.platform as platform',
            'profile_comments.rate as rate',
            'profile_comments.created_at as date',
            'users.name as user_name',
            'users.file as user_image',
        )->join('users','users.id','=','profile_comments.user_id')->where('profile_comments.status','1')->where('profile_id',$profile_id)->where('comment_id',0)->orderBy('id','desc')->get();
        foreach ($comments as $key => $value) {
            $value->user_image = $value->user_image == null ? "" : "/assets/users/".$value->user_id."/".$value->user_image;
            $value->sub_comments = profile_comments::select(
                'profile_comments.id as id',
                'profile_comments.comment as comment',
                'profile_comments.comment_id as comment_id',
                'profile_comments.profile_id as profile_id',
                'profile_comments.user_id as user_id',
                'profile_comments.platform as platform',
                'profile_comments.rate as rate',
                'profile_comments.created_at as date',
                'users.name as user_name',
                'users.file as user_image',
            )->join('users','users.id','=','profile_comments.user_id')->where('profile_comments.status','1')->where('comment_id',$value->id)->orderBy('id','desc')->get();
            foreach ($value->sub_comments as $key2 => $value2) {
                $value2->user_image = $value2->user_image == null ? "" : "/assets/users/".$value2->user_id."/".$value2->user_image;
            }
        }
        return response(['status'=>1,'message'=>"comments","data"=>$comments]);
    }

    // profile certificates
    public function certificatesPage(Request $request){
        $user_id = $request->header('user_id');
        $certificates = certificates::select(
            'certificates.id as id',
            'certificates.name as name',
            'certificates.description as description',
            'certificates.start_date as start_date',
            'certificates.end_date as end_date',
            'certificates.file as file',
            'certificates.user_id as user_id',
            'certificates.created_at as date',
            'users.name as user_name',
            'users.file as user_image',
        )->join('users','users.id','=','certificates.user_id')->where('certificates.status','1')->orderBy('id','desc')->get();
        return response(['status'=>1,'message'=>"certificates page","data"=>$certificates]);
    }

    // profile add certificate
    public function addCertificate(Request $request){
        $user_id = $request->header('user_id');
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'file' => 'required',
        ]);
        $certificate = new certificates;
        $certificate->name = $name;
        $certificate->description = $description;
        $certificate->start_date = $start_date;
        $certificate->end_date = $end_date;
        $certificate->file = $file;
        $certificate->user_id = $user_id;
        $certificate->save();
        return response(['status'=>1,'message'=>"certificate added"]);
    }

}
