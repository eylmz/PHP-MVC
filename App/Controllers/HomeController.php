<?php
    namespace App\Controllers;

    use System\Core\Controller;
    use System\Helpers\Session;

    Class HomeController extends Controller
    {
        function __construct()
        {
            Session::Start();
            //$this->loadView("header");
        }

        function index(){
            $this->loadTemplate("test");
        }

        function __destruct()
        {
            //$this->loadView("footer");
        }
    }
