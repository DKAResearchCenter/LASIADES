<?php

namespace App\Http\Controllers\earsip;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class domisili extends Controller
{
    public function Index(){

        $session = request()->session()->get("auth_login");
        if ($session->level_access !== "ADMIN"){
            $domisili = DB::table("surat_domisili")->where("id","=",$session->id)->get();
        }else{
            $domisili = DB::table("surat_domisili")->get();
        }
        return view("e-arsip.domisili.index", [
            'domisili' => $domisili,
            'session' => $session
        ]);
    }

    public function Create(Request $request){

        $method = request()->method();
        switch ($method) {
            case "POST" :
                $requestData = array(
                    'no_kk' => $request->get("no_kk"),
                    'nik_pemohon' => $request->get("nik_pemohon"),
                    'nama_lengkap' => $request->get("nama_lengkap"),
                    'alamat' => $request->get("alamat"),

                    'alasan_pindah' => $request->get("alasan_pindah"),
                    'alamat_tujuan' => $request->get("alamat_tujuan"),
                    'klarifikasi_pindah' => $request->get("klarifikasi_pindah"),
                    'jenis_kepindahan' => $request->get("jenis_kepindahan"),
                    'status_kk_tidak_pindah' => $request->get("status_kk_tidak_pindah"),
                    'status_kk_yang_pindah' => $request->get("status_kk_yang_pindah"),

                    'keluarga_pindah_nik' => $request->get("keluarga_pindah_nik"),
                    'keluarga_pindah_nama' => $request->get("keluarga_pindah_nama"),
                    'keluarga_pindah_tempat_lahir' => $request->get("keluarga_pindah_tempat_lahir"),
                    'keluarga_pindah_tanggal_lahir' => $request->get("keluarga_pindah_tanggal_lahir"),

                    'status' => $request->get("status")
                );

                $updated = DB::table("surat_domisili")
                    ->insert($requestData);

                if ($updated == 1){
                    return redirect("/e-arsip/domisili")
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
                    'no_kk' => $request->get("no_kk"),
                    'nik_pemohon' => $request->get("nik_pemohon"),
                    'nama_lengkap' => $request->get("nama_lengkap"),
                    'alamat' => $request->get("alamat"),

                    'alasan_pindah' => $request->get("alasan_pindah"),
                    'alamat_tujuan' => $request->get("alamat_tujuan"),
                    'klarifikasi_pindah' => $request->get("klarifikasi_pindah"),
                    'jenis_kepindahan' => $request->get("jenis_kepindahan"),
                    'status_kk_tidak_pindah' => $request->get("status_kk_tidak_pindah"),
                    'status_kk_yang_pindah' => $request->get("status_kk_yang_pindah"),

                    'keluarga_pindah_nik' => $request->get("keluarga_pindah_nik"),
                    'keluarga_pindah_nama' => $request->get("keluarga_pindah_nama"),
                    'keluarga_pindah_tempat_lahir' => $request->get("keluarga_pindah_tempat_lahir"),
                    'keluarga_pindah_tanggal_lahir' => $request->get("keluarga_pindah_tanggal_lahir"),

                    'status' => $request->get("status")
                );

                $updated = DB::table("surat_domisili")
                    ->where('id',"=", $request->get("id"))
                    ->update($requestData);

                if ($updated === 1){
                    return redirect("/e-arsip/domisili")
                        ->with("status", array(
                            'status' => true,
                            'code' => 200,
                            'msg' => "Berhasil Mengupdate data"
                        ));
                }else{
                    //return response()->json($requestAll);
                    return redirect()
                        ->back()
                        ->with("status", array(
                            'status' => false,
                            'code' => 400,
                            'msg' => "Gagal mengupdate Data"
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
