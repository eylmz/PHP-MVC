<?php
    class AdminHomeController extends Controller{
        function __construct()
        {
            Session::Start();

            if(!Session::Get("adminPanelYetki"))
                Router::Route(App::GetSetting("siteUrl")."admin/login/");

            $this->loadView("admin/header");
        }

        function index(){
            echo 'Anasayfa';
        }

        function __destruct()
        {
            $this->loadView("admin/footer");
        }
    }
