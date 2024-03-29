<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class Index extends Controller {

    public function index(){
        $domisili = DB::table("surat_domisili")->get();
        $tidakmampu = DB::table("surat_tidakmampu")->get();
        $surat_usaha = DB::table("surat_usaha")->get();
        return view("index",[
            'domisili' => $domisili,
            'tidakmampu' => $tidakmampu,
            'usaha' => $surat_usaha,
            'session' => request()->session()->get("auth_login")
        ]);
    }
}
