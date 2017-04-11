<?php
    Route::get("deneme/emre/{selam?}/emre-{deneme?}/{hahaha}","{?}@{?}")
        ->where("deneme","[a-z]+")
        ->where("selam","[a-z]+");

    Route::get("deneme/emre/yilmaz",function(){
        echo 'deneme 2';
    });

    Route::get("/",function($deneme="emre"){
        return ["deneme"=>["asdasd"=>"sa","merhaba"=>"as"],"asdasd"=>"merhaba"];
    });