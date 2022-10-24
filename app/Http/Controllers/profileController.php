<?php

namespace App\Http\Controllers;

use App\Models\infos;
use App\Models\users;
use App\Models\ticketMessages;
use App\Models\tickets;
use App\Models\carts;
use App\Models\favorites;
use App\Models\User;
use App\Models\asistans;
use App\Models\orders;
use App\Models\addresses;
use App\Models\reviews;
use App\Models\orderUpdates;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use ImageOptimizer;

class profileController extends Controller
{
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
    public function createPassword(Request $request,$mail = null,$token = null){
        if($mail == null || $token == null){
            toastr()->warning( 'Bilgiler sistemdeki bilgiler ile uyuşmamaktadır', 'Uyarı');
            return redirect()->route('index');
        }
        $user = User::where('email',$mail)->where('token',$token)->first();
        if ($user==null) {
            toastr()->warning( 'Kullanıcı Bulunamadı !', 'Uyarı');
            return redirect()->route('index');
        }
        if(!Auth::check()){
            $user->token = uniqid();
            $user->save();
        }
        $id = $user->id;	
        return view('auth.passwords.reset',compact('id'));
    }
    public function changePassword(Request $request)
    {
        $user = users::where('id',$request->id)->first();
        if($user == null){
            toastr()->warning( 'Kullanıcı Bulunamadı', 'Uyarı');
            return redirect()->route('index');
        }
        if ($request->password_confirmation == $request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
            toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
            return redirect()->route('login');
        }
        toastr()->error( 'Bir hata oluştu!', 'Hata');
        return redirect()->route('index');
    }
    public function updatePassword(Request $request)
    {
        array_shift($_POST);
        $update = users::find(Auth::id());
        if (Hash::check($request->oldPassword, $update->password ) ) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            $update->password = Hash::make($_POST['password']);
            $update->save();
        }else{
            toastr()->error( 'Mevcut şifre hatalı!', 'Başarısız');
            return redirect()->back();
        }
        toastr()->success( 'Şifreniz değiştirildi!', 'Başarılı');
        return redirect()->back();
    }
}