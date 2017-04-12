<?php
    use System\Core\Route;

    $ana = Route::get("haber/{baslik}-{id}{/}{sayfa?}",function($var,$id,$sayfa=2){
        //var_dump(Route::route("ana",["baslik"=>"test"]));
    })->name("ana");
    $ana->where("baslik","[a-zA-Z0-9-]+");
    $ana->where("id","[0-9]+");
    $ana->where("sayfa","[0-9]+");

    Route::get("deneme/emre/yilmaz","Home@index");

    Route::get("/",function($deneme="emre"){
        return ["deneme"=>["asdasd"=>"sa","merhaba"=>"as"],"asdasd"=>"merhaba"];
    });