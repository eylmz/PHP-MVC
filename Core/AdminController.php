<?php
class AdminController extends App{
    function __construct()
    {
        parent::__construct();
    }

    function loadView($fileName,$data=NULL,$returnHTML=false){
        $fileName = "App/Views/Admin/".$fileName.".php";
        if(file_exists($fileName)){
            if(is_array($data))
                extract($data);
            ob_start();
            include $fileName;
            $html = ob_get_contents();
            ob_end_clean();
            if($returnHTML)
                return $html;
            echo $html;
        }else echo '<b>'.$fileName.'</b> isimli dosya bulunamadı!';
    }
}