<?php
abstract class Autoload{
    public static function loadSystemCore($fileName){
        $fileName = "System/Core/".$fileName.".php";
        if(file_exists($fileName))
            return require $fileName;
    }

    public static function loadSystemPlugins($fileName){
        $fileName = "System/Plugins/".$fileName.".php";
        $fileName2 = "System/Plugins/'.$fileName.'/".$fileName.".php";
        if(file_exists($fileName))
            return require $fileName;
        else if( file_exists($fileName2) )
            return require $fileName2;
    }

    public static function loadSystemHelpers($fileName){
        $fileName = "System/Helpers/".$fileName.".php";
        if(file_exists($fileName))
            return require $fileName;
    }

    public static function loadMyCore($fileName){
        $fileName = "App/Core/".$fileName.".php";
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

    public static function loadClasses($fileName){
        $fileName = "App/Classes/" . $fileName . ".php";
        if (file_exists($fileName))
            return require $fileName;
    }
}

spl_autoload_register("Autoload::loadSystemCore");
spl_autoload_register("Autoload::loadSystemPlugins");
spl_autoload_register("Autoload::loadSystemHelpers");
spl_autoload_register("Autoload::loadMyCore");
spl_autoload_register("Autoload::loadModel");
spl_autoload_register("Autoload::loadController");
spl_autoload_register("Autoload::loadAdminController");
spl_autoload_register("Autoload::loadClasses");