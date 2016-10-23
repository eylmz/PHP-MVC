<?php
    Class AdminLoginController extends AdminController{
        function __construct()
        {
            Session::Start();

            parent::__construct();
        }

        function index(){
            if(Session::Get("adminPanelYetki"))
                Router::Route(App::GetSetting("siteUrl")."admin");

            $hata = "";
            if($_POST){
                $email = strip_tags(trim($_POST["email"]));
                $sifre = md5($_POST["email"]);

                $uyeModel = new UsersModel();
                $uyeGiris = $uyeModel->uyeGiris($email,$sifre);

                if($uyeGiris){
                    if($uyeGiris["rutbe"] == 3 || $uyeGiris["rutbe"] == 2){
                        Session::Create("adminPanelYetki",true);
                        Session::Create("uyeID",$uyeGiris["uyeID"]);
                        Session::Create("adSoyad",$uyeGiris["adSoyad"]);
                        Session::Create("email",$uyeGiris["email"]);
                        Session::Create("login",true);

                        Router::Route($this->settings["siteUrl"]."admin");
                    }else
                        $hata = "Yönetim paneline giriş yetkiniz bulunmamaktadır!";
                }else $hata = "Girilen bilgiler yanlış!";
            }

            $data = [
                "siteUrl" => $this->settings["siteUrl"],
                "hata" => $hata
            ];
            $this->loadView("login",$data);
        }

        function logout(){
            if(!Session::Get("adminPanelYetki"))
                Router::Route(App::GetSetting("siteUrl")."admin");
            Session::DeleteAll();
            Router::Route(App::GetSetting("siteUrl")."admin");
        }
    }
