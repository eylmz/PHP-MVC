<?php
    Class TestModel extends Model{		
		function selectUser($userID){
			$user = $this->db->get("uyeler","*",["uyeID"=>$userID]);
			if($user){
				return $user;
			}
			return false;
		}
	}
?>