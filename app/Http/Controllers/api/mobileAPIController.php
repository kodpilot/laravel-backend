<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\cv_infos;
use App\Models\cv_details;
use App\Models\profile_comments;
use App\Models\certificates;
use App\Models\personal_informations;
use App\Models\contact;
use App\Models\social_media;
use App\Models\skills;
use App\Models\education;
use App\Models\employment_history;
use App\Models\training;
use App\Models\cv_references;
use App\Models\interests;
use App\Models\cv_languages;
use App\Models\phone_codes;
use App\Models\app_connections;


use ImageOptimizer;

class mobileAPIController extends Controller
{
    public function index(Request $request){
        return response(['status'=>1,'message'=>"hello world"]);
    }

    public function appPage(Request $request){
        return response(['status'=>1,'message'=>"hello world"]);
    }

    public function test(Request $request){
        $detail = cv_details::where('id',1)->first();
        $detail->verification(['ehe'=>"ehe"]);
        return response(['status'=>1,'message'=>$detail]);
        return response(['status'=>1,'message'=>"key work properly"]);
    }

    public function verifyPhone(Request $request){
        $request->validate([
            'tel' => 'required|numeric',
        ]);
        $tel = $request->tel;
        $check = User::where('tel',$tel)->first();
        if($check){
            return response(['status'=>0,'message'=>"phone number already exist"]);
        }
        $code = random_int(100000, 999999);
        $code_obj = phone_codes::where('phone',$tel)->firstOrNew();
        $code_obj->phone = $tel;
        $code_obj->code = $code;
        $code_obj->save();
        try {
            sendMessage("Profile Wallet verification code:".$code,$tel);
        } catch (\Throwable $th) {
            return response(['status'=>0,'message'=>"code could not sent"]);
        }
        return response(['status'=>1,'message'=>"code sent"]);
    }

    public function verifyCode(Request $request){
        $request->validate([
            'tel' => 'required|numeric',
            'code' => 'required|numeric'
        ]);
        $tel = $request->tel;
        $code = $request->code;
        $code_control = phone_codes::where('phone',$tel)->where('code',$code)->first();
        if($code_control == null){
            return response([
                'status'=>0,
                'message'=>'Code could not verified'
            ]);
        }
        return response(['status'=>1,'message'=>"code verified"]);
    }

    // register function
    public function register(Request $request){
        $request->validate([
            'email'=>'required|unique:users|email',
            'username'=>'required|unique:users',
            'tel'=>'required|numeric',
            'code'=>'required|numeric|digits:6',
            'password'=>'required|min:6|confirmed',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
        ]);
        $request->middle_name == null ? $request->middle_name = "" : null;

        $code = phone_codes::where('phone',$request->tel)->where('code',$request->code)->first();
        if($code == null){
            return response(['status'=>0,'message'=>"code is not valid"]);
        }
        // $code->delete();
        $user = new User;
        $user->name = $request->name;
        $user->middlename = $request->middle_name;
        $user->surname = $request->surname;
        $user->tel = $request->tel;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->api_private = uniqid();
        $user->api_public = Hash::make($user->api_private);
        $user->save();
        return response(['status'=>1,'message'=>"user created",'api_public'=>$user->api_public,'user_id'=>$user->id]);
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

    // logout function
    public function logout(Request $request){
        $user_id = $request->header('user_id');
        $user = User::where('id', $user_id)->first();
        $user->api_private = null;
        $user->api_public = null;
        $user->save();
        return response(['status'=>1,'message'=>"user logged out"]);
    }

    //forgot password function
    public function forgotPassword(Request $request){
        $request->validate([
            'email'=>'required|email',
        ]);
        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($user == null){
            return response(['status'=>0,'message'=>"user not found"]);
        }
        
        $mailArray = [
            'mail'		=>$user->email,
            'token'     =>$user->token
        ];
        try {
            Mail::send('admin.mail.forgotMail', $mailArray, function ($message) use ($user) {
                $message->from(env('MAIL_FROM_ADDRESS'), config('app.name'));
                $message->subject("Password Reset");
                $message->to($user->email, config('app.name'));
            });
            return response(['status'=>1,'message'=>"successfully sent"]);
        } catch (\Throwable $th) {
            return response(['status'=>0,'message'=>"unexcepted error"]);
        }
    }

    // create card
    public function createNftCard(Request $request){
        return response(['status'=>1,'message'=>"card created","tx_id"=>"0x123456789"]);
    }

    // get card info
    public function getNftCard(Request $request){
        return response(['status'=>1,'message'=>"card info",'tx_id'=>"0x123456789"]);
    }

    // update card
    public function updateNftCard(Request $request){
        return response(['status'=>1,'message'=>"card created","tx_id"=>"0x123456789"]);
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

    public function cvDetailPage(Request $request, $cv_id = null){
        $user_id = $request->header('user_id'); 
        $data = getCvDetail($user_id,$cv_id);
        return response(['status'=>1,'message'=>"cv detail page",'data'=>$data]);
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

        $video = "";
        if ($request->hasFile('video')) {
            try {
                $video = uniqid().'.'.$request->file('video')->getClientOriginalExtension();
                $request->file('video')->move(public_path('/assets/cv/') ,$video);
                $path= public_path('/assets/cv/').$video;
            } catch (\Throwable $th) {
                \Log::error($th);
                return response(['status'=>0,'message'=>"unexcepted error occured when video save"]);
            }
        }
        if($video == ""){
            return response(['status'=>0,'message'=>"video is required"]);
        }

        $cv = new cv_infos;
        $cv->name = $name;
        $cv->description = $description;
        $cv->file = $file;
        $cv->video = $video;
        $cv->user_id = $user_id;
        $cv->save();
        return response(['status'=>1,'message'=>"cv added"]);
    }

    // cv edit function
    public function cvEdit(Request $request , $cv_id = null){
        $user_id = $request->header('user_id');
        $name = $request->name;
        if($name == null || $name == ""){
            return response(['status'=>0,'message'=>"name is required"]);
        }
        $description = $request->description;
        if($description == null || $description == ""){
            return response(['status'=>0,'message'=>"description is required"]);
        }
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $file = $cv->file;
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
        $video = $cv->video;
        if ($request->hasFile('video')) {
            try {
                $video = uniqid().'.'.$request->file('video')->getClientOriginalExtension();
                $request->file('video')->move(public_path('/assets/cv/') ,$video);
                $path= public_path('/assets/cv/').$video;
            } catch (\Throwable $th) {
                \Log::error($th);
                return response(['status'=>0,'message'=>"unexcepted error occured when video save"]);
            }
        }
        $cv->name = $name;
        $cv->video = $video;
        $cv->description = $description;
        $cv->file = $file;
        $cv->save();
        return response(['status'=>1,'message'=>"cv edited"]);
    }

    // cv delete function 
    public function cvDelete(Request $request , $cv_id = null){
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        if($cv->status=='0'){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        if($cv->selected == '1'){
            cv_infos::where('user_id',$cv->user_id)->where('id','!=',$cv->id)->update(['selected'=>'1']);
        }
        $cv->status = '0';
        $cv->save();
        return response(['status'=>1,'message'=>"cv deleted"]);
    }

    public function updatePersonalInformation(Request $request){
        $user_id = $request->header('user_id');
        $request->validate([
            "cv_id" => "required",
            "date_of_birth" => "required",
            "nl_number" => "required",
            "city_of_birth" => "required",
            "driving_licence" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }

        $personal_informations = personal_informations::where('cv_id',$cv_id)->firstOrNew();
        
        $nl_file = $personal_informations->nl_file;
        if($request->hasFile('nl_file')){
            try{
                $nl_file = uniqid().'.'.$request->file('nl_file')->getClientOriginalExtension();
                $request->file('nl_file')->move(public_path('/assets/personal-informations/') ,$nl_file);
                $path= public_path('/assets/personal-informations/').$nl_file;
                ImageOptimizer::optimize($path);
                $personal_informations->nl_file = $nl_file;
                $personal_informations->nl_number_check = '0';
                
            }
            catch (\Exception $e){
                \Log::error($e);
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }

        $driving_licence_file = $personal_informations->driving_licence_file;
        if($request->hasFile('driving_licence_file')){
            try{
                $driving_licence_file = uniqid().'.'.$request->file('driving_licence_file')->getClientOriginalExtension();
                $request->file('driving_licence_file')->move(public_path('/assets/personal-informations/') ,$driving_licence_file);
                $path= public_path('/assets/personal-informations/').$driving_licence_file;
                ImageOptimizer::optimize($path);
                $personal_informations->driving_licence_file = $driving_licence_file;
                $personal_informations->driving_licence_check = '0';
            }
            catch (\Exception $e){
                \Log::error($e);
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }

        $request->date_of_birth != $personal_informations->date_of_birth ? $personal_informations->date_of_birth_check = '0' : null;
        $personal_informations->date_of_birth = $request->date_of_birth;
        $request->nl_number != $personal_informations->nl_number ? $personal_informations->nl_number_check = '0' : null;
        $personal_informations->nl_number = $request->nl_number;
        $request->city_of_birth != $personal_informations->city_of_birth ? $personal_informations->city_of_birth_check = '0' : null;
        $personal_informations->city_of_birth = $request->city_of_birth;
        $request->driving_licence != $personal_informations->driving_licence ? $personal_informations->driving_licence_check = '0' : null;
        $personal_informations->driving_licence = $request->driving_licence;
        $personal_informations->save();
        return response(['status'=>1,'message'=>"personal informations updated"]);
    }

    public function updateContactInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $contact_informations = contact::where('cv_id',$cv_id)->firstOrNew();  
        $request->email != $contact_informations->email ? $contact_informations->email_check = '0' : null;
        $contact_informations->email = $request->email;
        $request->phone != $contact_informations->phone ? $contact_informations->phone_check = '0' : null;
        $contact_informations->phone = $request->phone;
        $request->address != $contact_informations->address ? $contact_informations->address_check = '0' : null;
        $contact_informations->address = $request->address;
        $contact_informations->save();
        return response(['status'=>1,'message'=>"contact informations updated"]);
    }

    public function updateSocialInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "twitter" => "required",
            "instagram" => "required",
            "linkedin" => "required",
            "medium" => "required",
            "facebook" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $social_informations = social_media::where('cv_id',$cv_id)->firstOrNew();
        $request->twitter != $social_informations->twitter ? $social_informations->twitter_check = '0' : null;
        $social_informations->twitter = $request->twitter;
        $request->instagram != $social_informations->instagram ? $social_informations->instagram_check = '0' : null;
        $social_informations->instagram = $request->instagram;
        $request->linkedin != $social_informations->linkedin ? $social_informations->linkedin_check = '0' : null;
        $social_informations->linkedin = $request->linkedin;
        $request->medium != $social_informations->medium ? $social_informations->medium_check = '0' : null;
        $social_informations->medium = $request->medium;
        $request->facebook != $social_informations->facebook ? $social_informations->facebook_check = '0' : null;
        $social_informations->facebook = $request->facebook;
        $social_informations->save();

        return response(['status'=>1,'message'=>"social informations updated"]);
    }

    public function addSkillInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "name" => "required",
            "score" => "required",
            "description" => "required",
            "experience" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $file = "";
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/skills/') ,$file);
                $path= public_path('/assets/skills/').$file;
                ImageOptimizer::optimize($path);
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $skill_informations = new skills;
        $skill_informations->name = $request->name;
        $skill_informations->score = $request->score;
        $skill_informations->description = $request->description;
        $skill_informations->experience = $request->experience;
        $skill_informations->cv_id = $cv_id;
        $skill_informations->file = $file;
        $skill_informations->save();
        return response(['status'=>1,'message'=>"skill informations created"]);
    }

    public function updateSkillInformation(Request $request){
        $request->validate([
            "skill_id" => "required",
            "name" => "required",
            "score" => "required",
            "description" => "required",
            "experience"  => "required",
        ]);
        $skill_id = $request->skill_id;
        $skill_informations = skills::where('id',$skill_id)->first();
        if($skill_informations == null){
            return response(['status'=>0,'message'=>"skill not found"]);
        }
        $file = $skill_informations->file;
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/skills/') ,$file);
                $path= public_path('/assets/skills/').$file;
                ImageOptimizer::optimize($path);
                $skill_informations->file = $file;
                $skill_informations->verification = '0';
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }


        $request->name != $skill_informations->name ? $skill_informations->verification = '0' : null;
        $skill_informations->name = $request->name;
        $request->score != $skill_informations->score ? $skill_informations->verification = '0' : null;
        $skill_informations->score = $request->score;
        $request->description != $skill_informations->description ? $skill_informations->verification = '0' : null;
        $skill_informations->description = $request->description;
        $request->experience != $skill_informations->experience ? $skill_informations->verification = '0' : null;
        $skill_informations->experience = $request->experience;
        $skill_informations->save();
        return response(['status'=>1,'message'=>"skill informations updated"]);
    }

    public function addEmploymentInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "company_name" => "required",
            "position" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "description" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $file = "";
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/employment_history/') ,$file);
                $path= public_path('/assets/employment_history/').$file;
                ImageOptimizer::optimize($path);
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $employment_informations = new employment_history;
        $employment_informations->company_name = $request->company_name;
        $employment_informations->position = $request->position;
        $employment_informations->start_date = $request->start_date;
        $employment_informations->end_date = $request->end_date;
        $employment_informations->description = $request->description;
        $employment_informations->cv_id = $cv_id;
        $employment_informations->file = $file;
        $employment_informations->save();
        return response(['status'=>1,'message'=>"employment informations created"]);
    }
    
    public function updateEmploymentInformation(Request $request){
        $request->validate([
            "employment_id" => "required",
            "company_name" => "required",
            "position" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "description" => "required",
        ]);
        $employment_id = $request->employment_id;
        $employment_informations = employment_history::where('id',$employment_id)->first();
        if($employment_informations == null){
            return response(['status'=>0,'message'=>"employment not found"]);
        }
        $file = $employment_informations->file;
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/employment_history/') ,$file);
                $path= public_path('/assets/employment_history/').$file;
                ImageOptimizer::optimize($path);
                $employment_informations->file = $file;
                $employment_informations->verification = '0';
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $request->company_name != $employment_informations->company_name ? $employment_informations->verification = '0' : null;
        $employment_informations->company_name = $request->company_name;
        $request->position != $employment_informations->position ? $employment_informations->verification = '0' : null;
        $employment_informations->position = $request->position;
        $request->start_date != $employment_informations->start_date ? $employment_informations->verification = '0' : null;
        $employment_informations->start_date = $request->start_date;
        $request->end_date != $employment_informations->end_date ? $employment_informations->verification = '0' : null;
        $employment_informations->end_date = $request->end_date;
        $request->description != $employment_informations->description ? $employment_informations->verification = '0' : null;
        $employment_informations->description = $request->description;
        $employment_informations->save();
        return response(['status'=>1,'message'=>"employment informations updated"]);
    }

    public function addEducationInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "school_name" => "required",
            "program" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "description" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $file = "";
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/education/') ,$file);
                $path= public_path('/assets/education/').$file;
                ImageOptimizer::optimize($path);
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $education_informations = new education;
        $education_informations->school_name = $request->school_name;
        $education_informations->program = $request->program;
        $education_informations->start_date = $request->start_date;
        $education_informations->end_date = $request->end_date;
        $education_informations->description = $request->description;
        $education_informations->cv_id = $cv_id;
        $education_informations->file = $file;
        $education_informations->save();
        return response(['status'=>1,'message'=>"education informations created"]);
    }

    public function updateEducationInformation(Request $request){
        $request->validate([
            "education_id" => "required",
            "school_name" => "required",
            "program" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "description" => "required",
        ]);
        $education_id = $request->education_id;
        $education_informations = education::where('id',$education_id)->first();
        if($education_informations == null){
            return response(['status'=>0,'message'=>"education not found"]);
        }
        $file = $education_informations->file;
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/education/') ,$file);
                $path= public_path('/assets/education/').$file;
                ImageOptimizer::optimize($path);
                $education_informations->file = $file;
                $education_informations->verification = '0';
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $request->school_name != $education_informations->school_name ? $education_informations->verification = '0' : null;
        $education_informations->school_name = $request->school_name;
        $request->program != $education_informations->program ? $education_informations->verification = '0' : null;
        $education_informations->program = $request->program;
        $request->start_date != $education_informations->start_date ? $education_informations->verification = '0' : null;
        $education_informations->start_date = $request->start_date;
        $request->end_date != $education_informations->end_date ? $education_informations->verification = '0' : null;
        $education_informations->end_date = $request->end_date;
        $request->description != $education_informations->description ? $education_informations->verification = '0' : null;
        $education_informations->description = $request->description;
        $education_informations->save();
        return response(['status'=>1,'message'=>"education informations updated"]);
    }

    public function addTrainingInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "training_name" => "required",
            "program" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "description" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $file = "";
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/training/') ,$file);
                $path= public_path('/assets/training/').$file;
                ImageOptimizer::optimize($path);
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $training_informations = new training;
        $training_informations->training_name = $request->training_name;
        $training_informations->program = $request->program;
        $training_informations->start_date = $request->start_date;
        $training_informations->end_date = $request->end_date;
        $training_informations->description = $request->description;
        $training_informations->cv_id = $cv_id;
        $training_informations->file = $file;
        $training_informations->save();
        return response(['status'=>1,'message'=>"training informations created"]);
    }

    public function updateTrainingInformation(Request $request){
        $request->validate([
            "training_id" => "required",
            "training_name" => "required",
            "program" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "description" => "required",
        ]);
        $training_id = $request->training_id;
        $training_informations = training::where('id',$training_id)->first();
        if($training_informations == null){
            return response(['status'=>0,'message'=>"training not found"]);
        }
        $file = $training_informations->file;
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/training/') ,$file);
                $path= public_path('/assets/training/').$file;
                ImageOptimizer::optimize($path);
                $training_informations->file = $file;
                $training_informations->verification = '0';
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $request->training_name != $training_informations->training_name ? $training_informations->verification = '0' : null;
        $training_informations->training_name = $request->training_name;
        $request->program != $training_informations->program ? $training_informations->verification = '0' : null;
        $training_informations->program = $request->program;
        $request->start_date != $training_informations->start_date ? $training_informations->verification = '0' : null;
        $training_informations->start_date = $request->start_date;
        $request->end_date != $training_informations->end_date ? $training_informations->verification = '0' : null;
        $training_informations->end_date = $request->end_date;
        $request->description != $training_informations->description ? $training_informations->verification = '0' : null;
        $training_informations->description = $request->description;
        $training_informations->save();
        return response(['status'=>1,'message'=>"training informations updated"]);
    }

    public function addReferenceInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "company" => "required",
            "position" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }

        $file = "";
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/cv_references/') ,$file);
                $path= public_path('/assets/cv_references/').$file;
                ImageOptimizer::optimize($path);
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }

        $reference_informations = new cv_references;
        $reference_informations->name = $request->name;
        $reference_informations->email = $request->email;
        $reference_informations->phone = $request->phone;
        $reference_informations->company = $request->company;
        $reference_informations->position = $request->position;
        $reference_informations->cv_id = $cv_id;
        $reference_informations->file = $file;
        $reference_informations->save();
        
        return response(['status'=>1,'message'=>"reference informations created"]);
    }

    public function updateReferenceInformation(Request $request){
        $request->validate([
            "reference_id" => "required",
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "company" => "required",
            "position" => "required",
        ]);
        $reference_id = $request->reference_id;
        $reference_informations = cv_references::where('id',$reference_id)->first();
        if($reference_informations == null){
            return response(['status'=>0,'message'=>"reference not found"]);
        }

        $file = $reference_informations->file;
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/cv_references/') ,$file);
                $path= public_path('/assets/cv_references/').$file;
                ImageOptimizer::optimize($path);
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }


        $reference_informations->name = $request->name;
        $reference_informations->email = $request->email;
        $reference_informations->phone = $request->phone;
        $reference_informations->company = $request->company;
        $reference_informations->position = $request->position;
        $reference_informations->file = $file;
        $reference_informations->save();
        return response(['status'=>1,'message'=>"reference informations updated"]);
    }

    public function addInterestInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "interest" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $interest_informations = new interests;
        $interest_informations->interest = $request->interest;
        $interest_informations->cv_id = $cv_id;
        $interest_informations->save();
        return response(['status'=>1,'message'=>"interest informations created"]);
    }

    public function updateInterestInformation(Request $request){
        $request->validate([
            "interest_id" => "required",
            "interest" => "required",
        ]);
        $interest_id = $request->interest_id;
        $interest_informations = interests::where('id',$interest_id)->first();
        if($interest_informations == null){
            return response(['status'=>0,'message'=>"interest not found"]);
        }
        $interest_informations->interest = $request->interest;
        $interest_informations->save();
        return response(['status'=>1,'message'=>"interest informations updated"]);
    }

    public function addLanguageInformation(Request $request){
        $request->validate([
            "cv_id" => "required",
            "language" => "required",
            "score" => "required",
            "experience" => "required",
        ]);
        $cv_id = $request->cv_id;
        $cv = cv_infos::where('id',$cv_id)->first();
        if($cv == null){
            return response(['status'=>0,'message'=>"cv not found"]);
        }
        $file = "";
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/languages/') ,$file);
                $path= public_path('/assets/languages/').$file;
                ImageOptimizer::optimize($path);
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $language_informations = new cv_languages;
        $language_informations->language = $request->language;
        $language_informations->score = $request->score;
        $language_informations->cv_id = $cv_id;
        $language_informations->file = $file;
        $language_informations->experience = $request->experience;
        $language_informations->save();
        return response(['status'=>1,'message'=>"language informations created"]);

    }

    public function updateLanguageInformation(Request $request){
        $request->validate([
            "language_id" => "required",
            "language" => "required",
            "score" => "required",
            "experience" => "required",
        ]);
        $language_id = $request->language_id;
        $language_informations = cv_languages::where('id',$language_id)->first();
        if($language_informations == null){
            return response(['status'=>0,'message'=>"language not found"]);
        }
        $file = $language_informations->file;
        if($request->hasFile('file')){
            try{
                $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/assets/languages/') ,$file);
                $path= public_path('/assets/languages/').$file;
                ImageOptimizer::optimize($path);
                $language_informations->file = $file;
                $language_informations->verification = '0';
            }
            catch (\Exception $e){
                return response(['status'=>0,'message'=>"file not uploaded"]);
            }
        }
        $request->language != $language_informations->language ? $language_informations->verification = '0' : null;
        $language_informations->language = $request->language;
        $request->score != $language_informations->score ? $language_informations->verification = '0' : null;
        $language_informations->score = $request->score;
        $request->experience != $language_informations->experience ? $language_informations->verification = '0' : null;
        $language_informations->experience = $request->experience;
        $language_informations->save();
        return response(['status'=>1,'message'=>"language informations updated"]);
    }

    public function addAppConnection(Request $request){
        $user_id = $request->header('user-id');
        $request->validate([
            "app_name" => "required",
            "app_url" => "required",
        ]);
        $connection = new app_connections;
        $connection->app_name = $request->app_name;
        $connection->user_id = $user_id;
        $connection->api_private = uniqid();
        $connection->api_public = Hash::make($connection->api_private);
        $connection->app_url = $request->app_url;
        $connection->save();
        return response(['status'=>1,'message'=>"app connection added"]);
    }
    
    public function Connections(Request $request){
        $user_id = $request->header('user-id');
        $connections = app_connections::select([
            'app_name as name',
            'connected as connected',
            'created_at as date',
            'id as id'
        ])->where('user_id',$user_id)->get();
        return response(['status'=>1,'message'=>"app connections",'data'=>$connections]);
    }

    public function Connect(Request $request){
        $request->validate([
            'id'=>'required',
        ]);
        $connection = app_connections::where('id',$request->id)->first();
        if($connection == null){
            return response(['status'=>0,'message'=>"connection not found"]);
        }
        $control = $connection->status != '1';
        $redirect_url = $connection->app_url.'/profile-wallet-connect/'.'?api_private='.Str::slug($connection->api_private).'&connect='.$control.'&user_id='.$request->header('user-id').'&app_id='.$connection->id;
        return response(['status'=>1,'message'=>"redirecting",'redirect_url'=>$redirect_url]);
    }

    // // cv details function
    // public function cvDetails(Request $request , $cv_id = null){
    //     $user_id = $request->header('user_id');
    //     $cv = cv_infos::where('id',$cv_id)->first();
    //     if($cv == null){
    //         return response(['status'=>0,'message'=>"cv not found"]);
    //     }
    //     $cv_details = cv_details::select(
    //         'cv_details.parameter as parameter',
    //         'cv_details.parent as parent',
    //         'cv_details.icon as icon',
    //         'cv_details.value as value',
    //         'cv_details.checked as checked',
    //         'cv_details.created_at as date',
    //     )->where('cv_id',$cv_id)->get();
    //     return response(['status'=>1,'message'=>"cv details","file_path"=>"/assets/cv/cv-".$cv_id."/",'data'=>$cv_details]);
    // }

    // // cv details add
    // public function cvDetailsAdd(Request $request,$cv_id=null){
    //     $user_id = $request->header('user_id');
    //     if($cv_id == null || $cv_id == ""){
    //         return response(['status'=>0,'message'=>"cv_id is required"]);
    //     }
    //     $request->validate([
    //         'parameter' => 'required',
    //         'value' => 'required',
    //         'parent' => 'required',
    //         'icon' => 'required',
    //     ]);
    //     $cv = new cv_details;
    //     $cv->parameter = $request->parameter;
    //     $cv->value = $request->value;
    //     $cv->cv_id = $cv_id;
    //     $cv->parent = $request->parent;
    //     $cv->icon = $request->icon;
    //     $cv->save();
    //     return response(['status'=>1,'message'=>"cv details added"]);
    // }

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

    // // profile certificates
    // public function certificatesPage(Request $request){
    //     $user_id = $request->header('user_id');
    //     $certificates = certificates::select(
    //         'certificates.id as id',
    //         'certificates.name as name',
    //         'certificates.description as description',
    //         'certificates.start_date as start_date',
    //         'certificates.end_date as end_date',
    //         'certificates.file as file',
    //         'certificates.user_id as user_id',
    //         'certificates.created_at as date',
    //         'users.name as user_name',
    //         'users.file as user_image',
    //     )->join('users','users.id','=','certificates.user_id')->where('certificates.status','1')->orderBy('id','desc')->get();
    //     return response(['status'=>1,'message'=>"certificates page","file_path"=>"/assets/certificates/","data"=>$certificates]);
    // }

    // // profile add certificate
    // public function addCertificate(Request $request){
    //     $user_id = $request->header('user_id');
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'start_date' => 'required',
    //         'end_date' => 'required',
    //     ]);

    //     $file = "";

    //     if ($request->hasFile('file')) {
    //         try {
    //             $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
    //             $request->file('file')->move(public_path('/assets/certificates/') ,$file);
    //             $path= public_path('/assets/certificates/').$file;
    //             ImageOptimizer::optimize($path);
    //         } catch (\Throwable $th) {
    //             \Log::error($th);
    //             return response(['status'=>0,'message'=>"unexcepted error occured when file save"]);
    //         }
    //     }
    //     if ($file == "") {
    //         return response(['status'=>0,'message'=>"file is required"]);
    //     }

    //     $certificate = new certificates;
    //     $certificate->name = $request->name;
    //     $certificate->description = $request->description;
    //     $certificate->start_date = $request->start_date;
    //     $certificate->end_date = $request->end_date;
    //     $certificate->file = $file;
    //     $certificate->user_id = $user_id;
    //     $certificate->save();
    //     return response(['status'=>1,'message'=>"certificate added"]);
    // }

    // // profile edit certificate
    // public function editCertificate(Request $request , $certificate_id=null){
    //     $user_id = $request->header('user_id');
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'start_date' => 'required',
    //         'end_date' => 'required',
    //     ]);
    //     $certificate = certificates::where('id',$certificate_id)->first();
    //     if($certificate == null){
    //         return response(['status'=>0,'message'=>"certificate not found"]);
    //     }
    //     $file = $certificate->file;

    //     if ($request->hasFile('file')) {
    //         try {
    //             $file = uniqid().'.'.$request->file('file')->getClientOriginalExtension();
    //             $request->file('file')->move(public_path('/assets/certificates/') ,$file);
    //             $path= public_path('/assets/certificates/').$file;
    //             ImageOptimizer::optimize($path);
    //         } catch (\Throwable $th) {
    //             \Log::error($th);
    //             return response(['status'=>0,'message'=>"unexcepted error occured when file save"]);
    //         }
    //     }
    //     $certificate->name = $request->name;
    //     $certificate->description = $request->description;
    //     $certificate->start_date = $request->start_date;
    //     $certificate->end_date = $request->end_date;
    //     $certificate->file = $file;
    //     $certificate->user_id = $user_id;
    //     $certificate->save();
    //     return response(['status'=>1,'message'=>"certificate edited"]);
    // }

    // // profile delete certificate
    // public function deleteCertificate(Request $request , $certificate_id=null){
    //     $user_id = $request->header('user_id');
    //     $certificate = certificates::where('id',$certificate_id)->first();
    //     if($certificate == null){
    //         return response(['status'=>0,'message'=>"certificate not found"]);
    //     }
    //     $certificate->status = '0';
    //     $certificate->save();
    //     return response(['status'=>1,'message'=>"certificate deleted"]);
    // }

}
