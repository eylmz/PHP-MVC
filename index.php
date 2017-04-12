<?php
	ob_start();
	error_reporting(E_ALL);
	ini_set("display_errors",1);

    require "vendor/autoload.php";
    //require "System/Core/Autoload.php";
    require "App/Router.php";

    new System\Core\Mvc();