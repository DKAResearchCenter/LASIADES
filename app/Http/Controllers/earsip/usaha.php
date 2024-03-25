<?php

namespace App\Http\Controllers\earsip;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usaha extends Controller
{
    public function Index(){

        $session = request()->session()->get("auth_login");
        if ($session->level_access !== "ADMIN"){
            $surat_usaha = DB::table("surat_usaha")->where("id","=",$session->id)->get();
        }else{
            $surat_usaha = DB::table("surat_usaha")->get();
        }

        return view("e-arsip.usaha.index", [
            'surat_usaha' => $surat_usaha,
            'session' => $session
        ]);
    }

    public function Create(Request $request){

        $method = request()->method();
        switch ($method) {
            case "POST" :
                $requestData = array(
                    'nik' => $request->get("nik"),
                    'nama' => $request->get("nama"),
                    'email' => $request->get("email"),
                    'phone' => $request->get("phone"),
                    'jenis_kelamin' => $request->get("jenis_kelamin"),
                    'pekerjaan' => $request->get("pekerjaan"),
                    'tempat_lahir' => $request->get("tempat_lahir"),
                    'tanggal_lahir' => $request->get("tanggal_lahir"),
                    'alamat' => $request->get("alamat"),
                    'status' => $request->get("status")
                );

                $updated = DB::table("surat_usaha")
                    ->insert($requestData);

                if ($updated == 1){
                    return redirect("/e-arsip/usaha")
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
                            'msg' => $requestData
                        ));
                }
            default :
                return view("e-arsip.usaha.create",[
                    'session' => request()->session()->get("auth_login"),
                    'status' => session()->has("status") ? session()->get("status") : null
                ]);
        }
    }

    public function Edit(Request $request){
        $method = request()->method();
        switch ($method){
            case "POST" :
                $requestData = array(
                    'nik' => $request->get("nik"),
                    'nama' => $request->get("nama"),
                    'email' => $request->get("email"),
                    'phone' => $request->get("phone"),
                    'jenis_kelamin' => $request->get("jenis_kelamin"),
                    'pekerjaan' => $request->get("pekerjaan"),
                    'tempat_lahir' => $request->get("tempat_lahir"),
                    'tanggal_lahir' => $request->get("tanggal_lahir"),
                    'alamat' => $request->get("alamat"),
                    'status' => $request->get("status")
                );

                $updated = DB::table("surat_usaha")
                    ->where('id',"=", $request->get("id"))
                    ->update($requestData);

                if ($updated === 1){
                    return redirect("/e-arsip/usaha")
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
            default :
                if ($request->has('id')) {
                    $id = $request->input('id');
                    $usaha = DB::table("surat_usaha")->where('id',"=",$id)->first();
                    if (!is_null($usaha)){
                        return response()->view("e-arsip.usaha.edit",[
                            'usaha' => $usaha,
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
            $deletedAction = DB::table("surat_usaha")->delete($idData);
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
