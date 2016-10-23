<?php
    Class AjaxController extends Controller{
        function __construct(){
            Session::Start();
            parent::__construct();
        }

		function dosyasil(){
			if(!Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
			
			$return["hata"]="";
			
			$dosyaID = explode("-",$_POST["dosyaID"]);
			$dosyaID = (int)$dosyaID[1];
			
			$makaleModel = new MakaleModel();
			$makaleDosya = $makaleModel->getMakaleDosya(["makaleDosyaID"=>$dosyaID]);
			
			if($makaleDosya){
				$makale = $makaleModel->getMakaleUser(["AND"=>["makaleID"=>$makaleDosya["makaleID"],"userID"=>Session::Get("userID")]]);
				if($makale){
					@unlink("Public/Upload/".$makaleDosya["dosyaAdi"]);
					$sil = $makaleModel->deleteMakaleDosya($dosyaID);
					if(!$sil)
						$return["hata"] = "Bir sorun oluştu";
				}else $return["hata"] = "Makale bulunamadı";
			}else $return["hata"] = "Dosya bulunamadı";
			
			echo json_encode($return);
		}
		
		function dosyaupload(){
			if(!Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
			
			$makaleID = (int)$_POST["makaleID"];
			$uyeID = Session::Get("userID");
			
			$return["hata"]="";
			$makaleModel = new MakaleModel();
			$makale = $makaleModel->getMakaleUser(["AND"=>["makaleID"=>$makaleID,"userID"=>$uyeID]]);
			if(!$makale){
				$return["hata"]="Bu makaleye dosya yükleyemezsiniz";
			}else{
				$return["dosyaAdi"]="";
				$return["makaleID"]=$makaleID;
				$return["dosyaTur"]=0;
				$return["dosyaAdres"]="";
				$return["dosyaID"]=0;
				
				if ( isset( $_POST ) ) {
					$image = new Upload( $_FILES[ 'dosya' ] );
					if ( $image->uploaded ) {
						$dosyaAdi = explode(".",$_FILES['dosya']["name"]);
						$uzanti = end($dosyaAdi);
						switch($uzanti){
							case "jpg":
							case "png":
							case "gif":
								$return["dosyaTur"]=1;
							break;
							
							case "mp4":
							case "avi":
							case "flv":
							case "mov":
								$return["dosyaTur"]=2;
							break;
							
							default:
								$return["dosyaTur"]=0;
						}
						$image->file_new_name_body = $makaleID."-".Router::sefLink($dosyaAdi[0]);
						
						//$image->allowed = array ( 'image/*' );
						
						$image->Process( 'Public/Upload/' );
						if ( $image->processed ) {
							$ekle = new MakaleDosyaModel();
							$ekle = $ekle->MakaleDosyaCreate($makaleID,$image->file_dst_name,$return["dosyaTur"]);
							$return["dosyaAdi"]=$image->file_dst_name;
							$return["dosyaAdres"]=$this->settings["siteUrl"].$image->file_dst_path . $image->file_dst_name;
							$return["dosyaID"]=$ekle;
							$return["siteAdres"]=$this->settings["siteUrl"];
						} else {
							$return["hata"] = 'Bir sorun oluştu: ' . $image->error;
						}
					}
				}
			}
			echo json_encode($return);
		}
		
		function uyeler2(){
			$uyeModel = new UsersModel();
			$uyeler = $uyeModel->selectUsers("");
			$uyelerDizi = array();
			foreach($uyeler as $yaz){
				$uyelerDizi[] = [
					"value" => $yaz["userID"],
					"text" => $yaz["userEmail"],
					"continent" => "Uye",
				];
			}
			echo json_encode($uyelerDizi);
		}
		
        function index(){
            Router::Route($this->settings["siteUrl"]);
        }
		
		function urlekle(){
			if(!Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
			
			
			$return["hata"]="";
			$return["link"]="";
			$return["linkID"]="";
			$return["siteAdres"]=$this->settings["siteUrl"];
			
			$makaleID = (int)$_POST["makaleID"];
			$uyeID = (int)Session::Get("userID");
			$link = addslashes(trim(strip_tags($_POST["url"])));
			if($makaleID && $link){
				$makaleModel = new MakaleModel();
				$makale = $makaleModel->getMakaleUser(["AND"=>["makaleID"=>$makaleID,"userID"=>$uyeID]]);
				if(!$makale){
					$return["hata"]="Bu makaleye link yükleyemezsiniz";
				}else{
					$ekle = $makaleModel->makaleLinkCreate($link,$makaleID);
					if($ekle){
						$return["link"] = $link;
						$return["linkID"] = $ekle;
					}else $return["hata"] = "Bir sorun oluştu";
				}
			}else $return["hata"] = "Boş alan bırakmayınız";
			echo json_encode($return);
		}
		
		function urlsil(){
			if(!Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
			
			$return["hata"]="";
			
			$linkID = (int)$_POST["linkID"];
			$uyeID = (int)Session::Get("userID");
			$makaleModel = new MakaleModel();
			$makale = $makaleModel->getMakaleLink(["makaleLinkID"=>$linkID]);
			if(!$makale){
				$return["hata"]="Link bulunamadı";
			}else{
				$makale = $makaleModel->getMakaleUser(["AND" => ["makaleID"=>$makale["makaleID"],"userID"=>$uyeID]]);
				if($makale){
					$makaleModel->deleteMakaleLink($linkID);
				}else $return["hata"] = "Silmeye yetkiniz yoktur";
			}
			echo json_encode($return);
		}
		
		
		function uyeekle(){
			if(!Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
			
			
			$return["hata"]="";
			$return["eposta"]="";
			$return["userID"]="";
			$return["siteAdres"]=$this->settings["siteUrl"];
			
			$makaleID = (int)$_POST["makaleID"];
			$uyeID = (int)Session::Get("userID");
			$eposta = addslashes(trim(strip_tags($_POST["eposta"])));
			if($makaleID && $eposta){
				$makaleModel = new MakaleModel();
				$makale = $makaleModel->getMakaleUser(["AND"=>["makaleID"=>$makaleID,"userID"=>$uyeID]]);
				if(!$makale){
					$return["hata"]="Bu makaleye üye yükleyemezsiniz";
				}else{
					$uyeModel = new UsersModel();
					$uye = $uyeModel->getUser(["userEmail"=>$eposta]);
					if($uye){
						if($uye["userID"] != $uyeID){
							
							$uyeVarMi = $makaleModel->getMakaleUser(["AND"=>["makaleID"=>$makaleID,"userID"=>$uye["userID"]]]);
							if($uyeVarMi){
								 $return["hata"] = "Bu üye zaten eklenmiş";
							}else{
								$ekle = $makaleModel->makaleUserCreate($makaleID,$uye["userID"]);
								if($ekle){
									$return["eposta"] = $eposta;
									$return["userID"] = $ekle;
								}else $return["hata"] = "Bir sorun oluştu";
							}
						}else $return["hata"] = "Kendinizi ekleyemezsiniz";
						
					}else $return["hata"] = "Üye bulunamadı";
				}
			}else $return["hata"] = "Boş alan bırakmayınız";
			echo json_encode($return);
		}
		
		function uyesil(){
			if(!Session::Get("login"))
				Router::Route($this->settings["siteUrl"]);
			
			$return["hata"]="";
			
			$makaleUserID = (int)$_POST["userID"];
			$uyeID = (int)Session::Get("userID");
			$makaleModel = new MakaleModel();
			$makale = $makaleModel->getMakaleUser(["makaleUserID"=>$makaleUserID]);
			if(!$makale){
				$return["hata"]="Üye kaydı bulunamadı";
			}else{
				$makale = $makaleModel->getMakaleUser(["AND" => ["makaleID"=>$makale["makaleID"],"userID"=>$uyeID]]);
				if($makale){
					$makaleModel->deleteMakaleUser($makaleUserID);
				}else $return["hata"] = "Silmeye yetkiniz yoktur";
			}
			echo json_encode($return);
		}
    }