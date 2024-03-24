<?php

namespace App\Http\Controllers\earsip;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class domisili extends Controller
{
    public function Index(){

        $domisili = DB::table("surat_domisili")->get();
        return view("e-arsip.domisili.index", [
            'domisili' => $domisili,
            'session' => request()->session()->get("auth_login")
        ]);
    }

    public function Create(Request $request){

        $method = request()->method();
        switch ($method) {
            case "POST" :
                $requestData = array(
                    'no_kk' => $request->get("kk"),
                    'nama' => $request->get("nama"),
                    'email' => $request->get("email"),
                    'phone' => $request->get("phone"),
                    'jenis_kelamin' => $request->get("jenis_kelamin"),
                    'penghasilan_perbulan' => $request->get("penghasilan_perbulan"),
                    'status' => $request->get("status")
                );

                $updated = DB::table("surat_domisili")
                    ->insert($requestData);

                if ($updated == 1){
                    return redirect("/e-arsip/tidak-mampu")
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
                return view("e-arsip.domisili.create",[
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
                    'no_kk' => $request->get("kk"),
                    'nama' => $request->get("nama"),
                    'email' => $request->get("email"),
                    'phone' => $request->get("phone"),
                    'jenis_kelamin' => $request->get("jenis_kelamin"),
                    'penghasilan_perbulan' => $request->get("penghasilan_perbulan"),
                    'status' => $request->get("status")
                );

                $updated = DB::table("surat_domisili")
                    ->where('id',"=", $request->get("id"))
                    ->update($requestData);

                if ($updated === 1){
                    return redirect("/e-arsip/tidak-mampu")
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
                    $domisili = DB::table("surat_domisili")->where('id',"=",$id)->first();
                    if (!is_null($domisili)){
                        return response()->view("e-arsip.domisili.edit",[
                            'domisili' => $domisili,
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
            $deletedAction = DB::table("surat_domisili")->delete($idData);
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
