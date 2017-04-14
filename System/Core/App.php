<?php
    namespace System\Core;

    class App
    {
        protected $config;
        protected $url;
        protected $prettyUrls;

        public function __construct()
        {
            Route::routeNow();
        }

        public static function loadFile($fileName)
        {
            if (file_exists($fileName . ".php"))
                return require $fileName . ".php";
            return false;
        }

        public static function writeFile($file,$string){
            $file = fopen($file.".php","w+");
            fwrite($file,$string);
            fclose($file);
        }

        public function fixClass($className)
        {
            if($className) {
                $className = strtolower($className);
                $className = str_replace(["-","_","%20"," "],["","",""],$className);
                $className = ucfirst($className)."Controller";
            }
            return $className;
        }

        public function fixMethod($methodName){
            if($methodName) {
                $methodName = strtolower($methodName);
                $methodName = str_replace(["-","_","%20"," "],["","",""],$methodName);
            }
            return $methodName;
        }
}