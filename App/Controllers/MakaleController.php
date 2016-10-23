<?php
    Class MakaleController extends Controller{
        function __construct(){
            Session::Start();
            parent::__construct();
			
			$opt = ["siteUrl"=>$this->settings["siteUrl"]];
			$this->loadView("header",$opt);
        }

        function index(){
            echo ' Makale Oku ';
        }
		
		function __destruct(){
			$opt = ["siteUrl"=>$this->settings["siteUrl"]];
			$this->loadView("footer",$opt);
		}
    }