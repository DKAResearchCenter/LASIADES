<?php

namespace App\Http\Controllers\earsip;

use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TidakMampu extends Controller
{
    public function Index(){

        $session = request()->session()->get("auth_login");
        if ($session->level_access !== "ADMIN"){
            $tidakmampu = DB::table("surat_tidakmampu")->where("id_user","=",$session->id)->get();
        }else{
            $tidakmampu = DB::table("surat_tidakmampu")->get();
        }
        return view("e-arsip.TidakMampu.index", [
            'tidakmampu' => $tidakmampu,
            'session' => $session
        ]);
    }

    public function Create(Request $request){

        $method = request()->method();
        switch ($method) {
            case "POST" :
                $session = request()->session()->get("auth_login");
                $requestData = array_merge(
                    array(
                        'id_user' => $session->id,
                    ),
                    $request->except('_token')
                );

                try {
                    $updated = DB::table("surat_tidakmampu")
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
                }catch (Exception $e) {
                    echo $e;
                }
            default :
                return view("e-arsip.TidakMampu.create",[
                    'session' => request()->session()->get("auth_login"),
                    'status' => session()->has("status") ? session()->get("status") : null
                ]);
        }
    }

    public function Edit(Request $request){
        $method = request()->method();
        switch ($method){
            case "POST" :
                $session = request()->session()->get("auth_login");
                $requestData = array(
                    'no_kk' => $request->get("kk"),
                    'id_user' => $session->id,
                    'nama' => $request->get("nama"),
                    'email' => $request->get("email"),
                    'phone' => $request->get("phone"),
                    'jenis_kelamin' => $request->get("jenis_kelamin"),
                    'penghasilan_perbulan' => $request->get("penghasilan_perbulan"),
                    'status' => $request->get("status")
                );

                $updated = DB::table("surat_tidakmampu")
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
                    $tidakmampu = DB::table("surat_tidakmampu")->where('id',"=",$id)->first();
                    if (!is_null($tidakmampu)){
                        return response()->view("e-arsip.TidakMampu.edit",[
                            'tidakmampu' => $tidakmampu,
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

    public function Print(Request $request){
        if ($request->has('id')) {
            $id = $request->input('id');
            $tidakmampu = DB::table("surat_tidakmampu")->where('id',"=",$id)->first();
            if (!is_null($tidakmampu)){
                $pdf = Pdf::loadView('e-arsip.TidakMampu.print',[
                    'data' => $tidakmampu,
                ]);
                return $pdf->stream();
            }else{
                abort(404, "ID Data Tidak Ditemukan");
            }
        }else{
            abort(400, "Metode Tidak Diperbolehkan");
        }
    }

    public function Delete(Request $request){
        if ($request->has("id")){
            $idData = $request->input("id");
            $deletedAction = DB::table("surat_tidakmampu")->delete($idData);
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
