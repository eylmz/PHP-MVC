<?php
    namespace System\Core;

    abstract class App
    {
        protected $config;
        protected $url;
        protected $prettyUrls;
        public static $settings;
        private static $moreSettings=[];
        public function __construct()
        {
            $this->url = $this->parseUrl();
            $this->prettyUrls = $this->loadFile("App/Config/PrettyUrls");

            self::$settings = $this->loadFile("App/Config/Config");
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

        public function parseUrl()
        {
            if (isset($_GET["url"]))
                return explode("/", trim($_GET["url"], "/"));
            return false;
        }

        public function fixPrettyUrls($className){
            if($className){
                foreach($this->prettyUrls as $key=>$values){
                    if($className == ucfirst($key."Controller")) {
                        $className = $values."Controller";
                        break;
                    }
                }
            }
            return $className;
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

        public static function getSetting($key,$file=null){
            if($file){
                if(!isset(self::$moreSettings[$file])){
                    $setting = new Setting($file);
                    self::$moreSettings = $setting->get();
                }

                if(isset(self::$moreSettings[$key]))
                    return self::$moreSettings[$key];
            }else{
                if(!isset(self::$settings)){
                    $setting = new Setting();
                    self::$settings = $setting->get();
                }

                if(isset(self::$settings[$key]))
                    return self::$settings[$key];

            }
        }
}