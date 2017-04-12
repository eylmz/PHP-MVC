<?php
    namespace System\Core;

    use System\Helpers\Template;

    abstract class Controller{
        function loadView($fileName,$data=array(),$returnHTML=false){
            $fileName = "App/Views/".$fileName.".php";
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

        function loadTemplate($fileName,$data=array(),$returnHTML=false){
            if(file_exists("App/Views/".$fileName.".edge.php")){
                $template = new Template();
                $render = $template->render($fileName,$data);
                if($returnHTML)
                    return $render;
                echo $render;
            }else echo '<b>'.$fileName.'</b> isimli dosya bulunamadı!';
        }

    }