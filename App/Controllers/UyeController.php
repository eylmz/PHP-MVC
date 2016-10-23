<?php
    Class UyeController extends Controller{
        function __construct(){
            Session::Start();
            parent::__construct();
			
			$opt = ["siteUrl"=>$this->settings["siteUrl"]];
			$this->loadView("header",$opt);
        }

        function index(){
            echo ' Üye Profili ';
        }
		
		function girisYap(){
			if(Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
			
			$data["hata"] = "";
			$data["basarili"] = "";
			if($_POST){
				$userEmail = addslashes(trim(strip_tags($_POST["userEmail"])));
				$userPassword = addslashes(trim(strip_tags($_POST["userPassword"])));
				
				if($userEmail && $userPassword){
					$userPassword = md5(sha1($userPassword));
					$usersModel = new UsersModel();
					$getir = $usersModel->getUser(["AND" => ["userEmail" => $userEmail, "userPassword"=> $userPassword]]);
					if($getir){
						$data["basarili"] = "Başarıyla giriş yaptınız. Anasayfaya yönlendiriliyorsunuz";
						Session::Create("login",true);
						Session::Create("userID",$getir["userID"]);
						Session::Create("userRank",$getir["userRank"]);
						Session::Create("userName",$getir["userName"]);
						Router::Route($this->settings["siteUrl"],3);
					}else 
						$data["hata"] = "E-Posta adresiniz ve ya şifreniz yanlış";
				}else $data["hata"] = "Boş alan bırakmayınız";
			}
			
			$this->loadView("girisYap",$data);
		}
		
		function cikisYap(){
			Session::DeleteAll();
			Router::Route($this->settings["siteUrl"]);
		}
		
		function kayitOl(){
			if(Session::Get("login"))
                Router::Route($this->settings["siteUrl"]);
			
			$data["hata"] = "";
			$data["basarili"] = "";
			if($_POST){
				$userName = addslashes(trim(strip_tags($_POST["userName"])));
				$userEmail = addslashes(trim(strip_tags($_POST["userEmail"])));
				$userPassword = addslashes(trim(strip_tags($_POST["userPassword"])));
				$userPassword2 = addslashes(trim(strip_tags($_POST["userPassword2"])));
				
				if($userName && $userEmail && $userPassword){
					if($userPassword == $userPassword2){
						if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
							$usersModel = new UsersModel();
							$flag = $usersModel->getUser(["userEmail"=>$userEmail]);
							if(!$flag){
								$userPassword = md5(sha1($userPassword));
								$olustur = $usersModel->userCreate($userName,$userEmail,$userPassword);
								if($olustur)
									$data["basarili"] = "Üyeliğiniz başarıyla oluşturulmuştur";
								else 
									$data["hata"] = "Bir sorun oluştu";
							}else $data["hata"] = "Bu e-postayla daha önce kayıt olunmuş";
						}else $data["hata"] = "E-Posta adresiniz standartlara uymamaktadır";
					}else $data["hata"] = "Parolalarınız birbiriyle uyuşmamaktadır";
				}else $data["hata"] = "Boş alan bırakmayınız";
			}
			
			$this->loadView("kayitOl",$data);
		}
		
		function __destruct(){
			$opt = ["siteUrl"=>$this->settings["siteUrl"]];
			$this->loadView("footer",$opt);
		}
    }