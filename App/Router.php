<?php
    NewRoute::get("deneme/emre",function(){
        echo 'deneme';
    });

    NewRoute::get("deneme/emre/yilmaz",function(){
        echo 'deneme 2';
    });

    NewRoute::get("/",function($deneme="emre"){
        return ["deneme"=>["asdasd"=>"sa","merhaba"=>"as"],"asdasd"=>"merhaba"];
    });