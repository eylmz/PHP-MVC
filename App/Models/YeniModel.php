<?php 
	Class YeniModel extends Model{
		function deneme(){
			return $this->db->select("uyeler","*");
		}
	}

?>