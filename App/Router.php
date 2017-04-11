<?php
    Route::get("deneme/{id}/{method?}/{deneme}","{?}@{?}")
        ->where("id","[0-9a-zA-Z]+")
        ->where("method","[0-9a-zA-Z]+")
        ->name("emre");

    Route::get("/",function($deneme="emre"){
        return ["deneme"=>["asdasd"=>"sa","merhaba"=>"as"],"asdasd"=>"merhaba"];
    });