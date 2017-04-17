<?php
    namespace App\Models;
    use System\Core\Model;

    class TestModel extends Model{
		function selectUser($userID){
		    return $userID;
        }
	}
?>