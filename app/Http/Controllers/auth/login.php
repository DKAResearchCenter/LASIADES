<?php

namespace App\Http\Controllers\auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller {

    public function Index(Request $request) {
        if (!$request->session()->exists("auth_login")){
            return view("auth.index", [
                'status' => session()->has("status") ? session()->get("status") : null,
                'session' => request()->session()->get("auth_login")
            ]);
        }else{
            return redirect("/")
                ->with("status", array(
                    'status' => true,
                    'code' => 200,
                    'msg' => "Anda Telah Login"
                ));
        }
    }

    public function Validate(Request $request){

        if($request->has("email") && strlen($request->get("email")) > 0){
            if($request->has("password") && strlen($request->get("password")) > 0){
                $auth = DB::table("users_login")
                    ->where("email","=",$request->get("email"))
                    ->where("password","=",$request->get("password"))
                    ->first();

                //return response()->json($auth,200);
                if ($auth !== null){
                    $request->session()->put("auth_login", $auth);
                    return redirect("/")
                        ->with("status", array(
                            'status' => true,
                            'code' => 200,
                            'msg' => "Akun Ditemukan"
                        ));
                }else{
                    return redirect("/auth")
                        ->with("status", array(
                            'status' => false,
                            'code' => 404,
                            'msg' => "Akun Tidak Ditemukan"
                        ));
                }
            }else{
                return redirect("/auth")
                    ->with("status", array(
                        'status' => false,
                        'code' => 400,
                        'msg' => "Password Wajib Diisi"
                    ));
            }
        }else{
            return redirect("/auth")
                ->with("status", array(
                    'status' => false,
                    'code' => 400,
                    'msg' => "email Wajib Diisi"
                ));
        }

    }
}
