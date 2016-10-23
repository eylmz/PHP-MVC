<?php
	ob_start();
	error_reporting(E_ALL);
	ini_set("display_errors",1);
    require "Core/Autoload.php";

    new Router();