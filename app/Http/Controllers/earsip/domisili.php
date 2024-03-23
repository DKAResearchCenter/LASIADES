<?php

namespace App\Http\Controllers\earsip;

use Illuminate\Routing\Controller;

class domisili extends Controller
{
    public function Index(){
        return view("e-arsip.domisili.index",[
            'session' => request()->session()->get("auth_login")
        ]);
    }

    public function Create(){
        return view("e-arsip.domisili.create",[
            'session' => request()->session()->get("auth_login")
        ]);
    }
}
