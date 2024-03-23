<?php

namespace App\Http\Controllers\earsip;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class usaha extends Controller
{
    public function Index(){
        return view("e-arsip.usaha.index",[
            'session' => request()->session()->get("auth_login")
        ]);
    }
}
