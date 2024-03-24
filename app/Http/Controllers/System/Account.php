<?php

namespace App\Http\Controllers\System;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Account extends Controller
{
    public function Index(Request $request){

        $users_login = DB::table("users_login")->get();
        return view("system.account.index",[
            'users_login' => $users_login,
            'session' => request()->session()->get("auth_login")
        ]);
    }

    public function Create(Request $request){

        $method = request()->method();
        switch ($method) {
            case "POST" :
                if ( $request->get("password") === $request->get("confirm_password")){
                    $requestData = array(
                        'name' => $request->get("name"),
                        'email' => $request->get("email"),
                        'password' => $request->get("password")
                    );

                    $updated = DB::table("users_login")
                        ->insert($requestData);

                    if ($updated == 1){
                        return redirect("/system/account")
                            ->with("status", array(
                                'status' => true,
                                'code' => 200,
                                'msg' => "Berhasil menyimpan data"
                            ));
                    }else{
                        return redirect()
                            ->back()
                            ->with("status", array(
                                'status' => false,
                                'code' => 400,
                                'msg' => "Gagal Input Data Atau Data Sudah Ada"
                            ));
                    }
                }else{
                    return redirect()
                        ->back()
                        ->with("status", array(
                            'status' => false,
                            'code' => 400,
                            'msg' => "Password Konfirmasi Tidak sama"
                        ));
                }
            default :
                return view("system.account.create",[
                    'session' => request()->session()->get("auth_login"),
                    'status' => session()->has("status") ? session()->get("status") : null
                ]);
        }
    }

    public function Edit(Request $request){
        $method = request()->method();
        switch ($method){
            case "POST" :

                if ( $request->get("password") === $request->get("confirm_password")){
                    $requestData = array(
                        'name' => $request->get("name"),
                        'email' => $request->get("email"),
                        'password' => $request->get("password")
                    );

                    $updated = DB::table("users_login")
                        ->where('id',"=", $request->get("id"))
                        ->update($requestData);

                    if ($updated === 1){
                        return redirect("/system/account")
                            ->with("status", array(
                                'status' => true,
                                'code' => 200,
                                'msg' => "Berhasil Mengupdate data"
                            ));
                    }else{
                        return redirect()
                            ->back()
                            ->with("status", array(
                                'status' => false,
                                'code' => 400,
                                'msg' => "Gagal Mengupdate data atau data tidak berubah"
                            ));
                    }
                }else{
                    return redirect()
                        ->back()
                        ->with("status", array(
                            'status' => false,
                            'code' => 400,
                            'msg' => "Password Konfirmasi Tidak sama"
                        ));
                }
            default :
                if ($request->has('id')) {
                    $id = $request->input('id');
                    $users_login = DB::table("users_login")->where('id',"=",$id)->first();
                    if (!is_null($users_login)){
                        return response()->view("system.account.edit",[
                            'users_login' => $users_login,
                            'session' => request()->session()->get("auth_login"),
                            'status' => session()->has("status") ? session()->get("status") : null
                        ]);
                    }else{
                        abort(404, "ID Data Tidak Ditemukan");
                    }
                }else{
                    abort(400, "Metode Tidak Diperbolehkan");
                }
        }
    }

    public function Delete(Request $request){
        if ($request->has("id")){
            $idData = $request->input("id");
            $deletedAction = DB::table("users_login")->delete($idData);
            if ($deletedAction !== null){
                return response()->json(
                    array(
                        'status' => true,
                        'code' => 200,
                        'msg' => 'Berhasil Menghapus Data'
                    )
                );
            }else{
                return response()->json(
                    array(
                        'status' => false,
                        'code' => 404,
                        'msg' => 'Gagal Menghapus Data'
                    )
                );
            }
        }else{
            return response()->json(
                array(
                    'status' => false,
                    'code' => 400,
                    'msg' => 'require id data'
                )
            );
        }
    }
}
