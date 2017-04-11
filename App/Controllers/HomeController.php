<?php
    Class HomeController extends Controller
    {
        function __construct()
        {
            Session::Start();
            //$this->loadView("header");
        }

        function index($deneme){
            $this->loadTemplate("test");
        }

        function __destruct()
        {
            //$this->loadView("footer");
        }
    }
