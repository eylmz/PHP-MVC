<?php
    Class AdminUsersController extends AdminController{
        function __construct()
        {
            Session::Start();
            parent::__construct();
            if(!Session::Get("adminPanelYetki"))
                Router::Route($this->settings["siteUrl"]."admin");

            $data = [
                "siteUrl" => $this->settings["siteUrl"]
            ];
            $this->loadView("header",$data);
        }

        function index(){
            $uyeler = new UsersModel();
            $data["uyeler"] = $uyeler->uyeler();
            $data["siteUrl"] = $this->settings["siteUrl"];
            $this->loadView("userList",$data);
        }
		
		function duzenle($id){
			$uyeler = new UsersModel();
			$data["uye"] = $uyeler->uyeGetir(["uyeID"=>$id]);
			$data["hata"] = "";
			$data["mesaj"] = "";
			if($data["uye"]){
				if($_POST){
					$adSoyad = stripslashes(trim($_POST["adSoyad"]));
					$sifre = stripslashes(trim($_POST["sifre"]));
					$email = stripslashes(trim($_POST["email"]));
					$rutbe = (int)stripslashes(trim($_POST["rutbe"]));
					if($adSoyad && $email){
						if($sifre)
							$sifre = md5($sifre);
						else 
							$sifre = $data["uye"]["sifre"];
						
						$duzenle = $uyeler->duzenle($id,$adSoyad,$sifre,$email,$rutbe);
						if($duzenle){
							$data["mesaj"] = "Başarıyla düzenlendi";
							Router::Route($this->settings["siteUrl"]."admin/users/",3);
						}else $data["hata"] = "Bir sorun oluştu";
					}else $data["hata"] = "Boş alan bırakmayınız";
				}
				$this->loadView("userUpdate",$data);
			}else Router::Route($this->settings["siteUrl"]."admin/users");
		}
		
		function sil($id){
			$uyeler = new UsersModel();
			$data["uye"] = $uyeler->uyeGetir(["uyeID"=>$id]);
			$data["hata"] = "";
			$data["mesaj"] = "";
			if($data["uye"] && $id != 1){
	
				$sil = $uyeler->sil($id);
				if($sil){
					$data["mesaj"] = "Başarıyla silindi";
					Router::Route($this->settings["siteUrl"]."admin/users/",3);
				}else $data["hata"] = "Bir sorun oluştu";
				
				$this->loadView("userDelete",$data);
			}else Router::Route($this->settings["siteUrl"]."admin/users");
		}

        function __destruct()
        {
            $data = [
                "siteUrl" => $this->settings["siteUrl"]
            ];
            $this->loadView("footer",$data);
        }
    }
?>