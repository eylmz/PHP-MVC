<?php
    use System\Core\Route;
    /*
        $ana = Route::get("{baslik}/{controller}/{method}",function($var,$controller,$method){
            $controller = "App\\Controllers\\".$controller;
            $controller = new $controller();
            call_user_func_array([$controller,$method],[]);
        })->name("ana");
        $ana->where("baslik","[a-zA-Z0-9-]+");
    */

    Route::get("{controller}/{method}/{baslik}","{1}@{2}");

    Route::any("",function(){

    });