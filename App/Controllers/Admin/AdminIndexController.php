<?php
class AdminIndexController extends AdminController{
    function __construct()
    {
        Session::Start();

        if(!Session::Get("adminPanelYetki"))
            Router::Route(App::GetSetting("siteUrl")."admin/login/");

        parent::__construct();

        $data = [
            "siteUrl" => $this->settings["siteUrl"]
        ];
        $this->loadView("header",$data);
    }

    function index(){
        echo 'Anasayfa';
    }

    function __destruct()
    {
        $data = [
            "siteUrl" => $this->settings["siteUrl"]
        ];
        $this->loadView("footer",$data);
    }
}
