<?php
	ob_start();
	error_reporting(E_ALL);
	ini_set("display_errors",1);
    require "System/Core/Autoload.php";
    require "vendor/autoload.php";
    require "App/Router.php";

    Route::routeNow();