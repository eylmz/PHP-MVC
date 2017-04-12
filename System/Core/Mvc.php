<?php
    namespace System\Core;

    class Mvc{
        function __construct(){
            Route::routeNow();
        }
    }