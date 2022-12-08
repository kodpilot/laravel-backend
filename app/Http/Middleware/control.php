<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\app_connections;
use Illuminate\Support\Facades\Hash;


class control
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$process)
    {   
        /* 
        connection for app
            -app_key app-private-key
            -user-id
            -app-id
            -token
        */
        if($process == "app"){
            $key = $request->header("app_key");
            if ($key == null || $key == "") {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            $user_id = $request->header('user-id');
            $user = User::find($user_id);
            if ($user == null) {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            $app_id = $request->header('app-id');
            $app = app_connections::where('user_id',$user_id)->where('id',$app_id)->first();
            if ($app == null) {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            if($app->connected == '0'){
                return response(['status'=>0,'message'=>"Not connected"]);
            }
            if (!Hash::check($app->api_private,$key)) {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            return $next($request);
        }

        /*
            check connections for our apps
            -token
        */
        if ($request->header("token") == null) {
            return response(['status'=>0,'message'=>"unauthorized"]);
        }
        if (!Hash::check(getinfos()->mobile_api_private, $request->header("token"))) {
            return response(['status'=>0,'message'=>"unauthorized"]);
        }
        /*
            check connections for our apps
            -key user-private-key
            -user-id
        */
        if ($process == "key") {
            $key = $request->header("key");
            if ($key == null || $key == "") {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            $user_id = $request->header('user-id');
            $user = User::find($user_id);
            if ($user == null) {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            if (!Hash::check($user->api_private,$key)) {
                return response(['status'=>0,'message'=>"unauthorized"]);
            }
            return $next($request);
        }
        
        return $next($request);
    }
}
