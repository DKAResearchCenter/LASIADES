<?php

namespace App\Http\Controllers\earsip;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TidakMampu extends Controller
{
    public function Index(){
        return view("e-arsip.tidakmampu.index",[
            'session' => request()->session()->get("auth_login")
        ]);
    }
}
