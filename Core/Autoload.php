<?php

    class Autoload{
        public static function loadCore($fileName){
            $fileName = "Core/".$fileName.".php";
            if(file_exists($fileName))
                return require $fileName;
        }

        public static function loadModel($fileName){
            $fileName = "App/Models/".$fileName.".php";
            if(file_exists($fileName))
                return require $fileName;
        }

        public static function loadController($fileName)
        {
            $fileName = "App/Controllers/" . $fileName . ".php";
            if (file_exists($fileName))
                return require $fileName;
        }

        public static function loadAdminController($fileName)
        {
            $fileName = "App/Controllers/Admin/" . $fileName . ".php";
            if (file_exists($fileName))
                return require $fileName;
        }
    }

    spl_autoload_register("Autoload::loadCore");
    spl_autoload_register("Autoload::loadModel");
    spl_autoload_register("Autoload::loadController");
    spl_autoload_register("Autoload::loadAdminController");