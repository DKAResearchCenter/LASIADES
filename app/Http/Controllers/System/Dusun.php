<?php

namespace App\Http\Controllers\System;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class Dusun extends Controller
{
    public function Index(){

        return view("system.dusun.index",[
            'session' => request()->session()->get("auth_login")
        ]);
    }
}
