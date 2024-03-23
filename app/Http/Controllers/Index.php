<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class Index extends Controller {

    public function index(){
        return view("index",[
            'session' => request()->session()->get("auth_login")
        ]);
    }
}
