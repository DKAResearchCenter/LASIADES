<?php

use App\Http\Controllers;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> '/','middleware' => CheckIsLogged::class], function (){
    Route::get('/', [Controllers\Index::class, 'index']);
    Route::group(['prefix'=>'e-arsip'], function (){
        Route::group(['prefix'=>'domisili'], function (){
            Route::get('/', [Controllers\earsip\domisili::class, 'index']);
            Route::get('/print', [Controllers\earsip\domisili::class, 'print']);
            Route::delete("/",[Controllers\earsip\domisili::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\earsip\domisili::class, 'create']);
                Route::post('/', [Controllers\earsip\domisili::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\earsip\domisili::class, 'edit']);
                Route::post("/",[Controllers\earsip\domisili::class, 'edit']);
            });
        });
        Route::group(['prefix'=>'tidak-mampu'], function (){
            Route::get('/', [Controllers\earsip\TidakMampu::class, 'index']);
            Route::get('/print', [Controllers\earsip\TidakMampu::class, 'print']);
            Route::delete("/",[Controllers\earsip\TidakMampu::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\earsip\TidakMampu::class, 'create']);
                Route::post('/', [Controllers\earsip\TidakMampu::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\earsip\TidakMampu::class, 'edit']);
                Route::post("/",[Controllers\earsip\TidakMampu::class, 'edit']);
            });
        });
        Route::group(['prefix'=>'usaha'], function (){
            Route::get('/', [Controllers\earsip\usaha::class, 'index']);
            Route::get('/print', [Controllers\earsip\domisili::class, 'print']);
            Route::delete("/",[Controllers\earsip\usaha::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\earsip\usaha::class, 'create']);
                Route::post('/', [Controllers\earsip\usaha::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\earsip\usaha::class, 'edit']);
                Route::post("/",[Controllers\earsip\usaha::class, 'edit']);
            });
        });
    });
    Route::group(['prefix'=>'system'], function () {
        Route::group(['prefix'=>'account'], function (){

            Route::get('/', [Controllers\System\Account::class, 'index']);
            Route::delete("/",[Controllers\System\Account::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\System\Account::class, 'create']);
                Route::post('/', [Controllers\System\Account::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\System\Account::class, 'edit']);
                Route::post("/",[Controllers\System\Account::class, 'edit']);
            });



        });

        Route::group(['prefix'=>'dusun'], function (){
            Route::get('/', [Controllers\System\Dusun::class, 'index']);
        });
    });
});
Route::group(['prefix'=>'auth'], function (){
    Route::get("/", [ Controllers\auth\login::class,'index']);
    Route::post("/", [ Controllers\auth\login::class,'validate']);
});
Route::get("/logout",[ Controllers\auth\Logout::class,'index']);
