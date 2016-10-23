<?php
    Class MakaleolusturController extends Controller{
        function __construct(){
            Session::Start();
            parent::__construct();
			
			$opt = ["siteUrl"=>$this->settings["siteUrl"]];
			$this->loadView("header",$opt);
        }

        function index(){
            if(!Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
			
			$data["hata"]="";
			
			if($_POST){
				$makaleAdi = addslashes(trim(strip_tags($_POST["makaleAdi"])));
				$makaleOzeti = addslashes(trim(strip_tags($_POST["makaleOzet"])));
				$makaleMetin = addslashes(trim($_POST["makaleMetin"]));
				
				if($makaleAdi && $makaleOzeti && $makaleMetin){
					$makaleOlustur = new MakaleModel();
					$ekle = $makaleOlustur->makaleCreate($makaleAdi,$makaleOzeti,$makaleMetin);
					if($ekle){
						$makaleOlustur->makaleUsersCreate($ekle,Session::Get("userID"));
						Router::Route($this->settings["siteUrl"]."makaleOlustur/adim2/".$ekle."/");
					}else $data["hata"] = "Bir sorun oluştu";
				}else $data["hata"]="Boş alan bırakmayınız";
			}
			$this->loadView("makaleOlustur1",$data); 	
        }
		
		function adim2($makaleID){
			if(!Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
		
			if(!$makaleID)
				Router::Route($this->settings["siteUrl"]);
		
			$uyeID = (int)Session::Get("userID");
			$basarili = "";
			$makaleModel = new MakaleModel();
			$makale = $makaleModel->getMakaleUser(["AND"=>["makaleID"=>$makaleID,"userID"=>$uyeID]]);
			if(!$makale)
				Router::Route($this->settings["siteUrl"]);

			if($_POST){
				$userEmail = addslashes(trim(strip_tags($_POST["userEmail"])));
				
				$userEmail = explode(",",$userEmail);
				
				$userModel = new UsersModel();
				$uyeler = $userModel->selectUsers(["OR"=>["userID"=>$userEmail]]);
				if($uyeler){
					
					$uyelerDizi = [];
					foreach($uyeler as $yaz){
						if($uyeID != $yaz["userID"])
							$uyelerDizi[] = ["makaleID"=>$makaleID,"userID"=>$yaz["userID"]];
					}
					$makaleOlustur = $makaleModel->makaleUserCreate($uyelerDizi);
					$basarili = "Makaleniz başarıyla tamamlanmıştır. Anasayfaya yönlendiriliyorsunuz..";
					Router::Route($this->settings["siteUrl"],3);
				}
			}
		
			$this->loadView("makaleOlustur2",["makaleID"=>$makaleID,"siteUrl"=>$this->settings["siteUrl"],"basarili"=>$basarili]);
		}
		
		function __destruct(){
			$opt = ["siteUrl"=>$this->settings["siteUrl"]];
			$this->loadView("footer",$opt);
		}
    }