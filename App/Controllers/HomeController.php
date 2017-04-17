<?php
    namespace App\Controllers;

    use App\Core\MyController;
    use System\Helpers\Session;

    Class HomeController extends MyController
    {
        function index(){
            $this->loadTemplate("test",["deneme"=>"<b>Emre</b>"]);


            $this->loadView("index");
        }
    }
