<?php

namespace App\Http\Controllers\auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Logout extends Controller {

    public function Index(Request $request) {
        $request->session()->flush();
        return redirect("/")
            ->with("status", array(
                'status' => true,
                'code' => 200,
                'msg' => "Akun Ditemukan"
            ));
    }
}
