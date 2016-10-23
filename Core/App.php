<?php
    class App
    {
        protected $config;
        protected $url;
        protected $prettyUrls;
        private static $settings;
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
        }

        public function parseUrl()
        {
            if (isset($_GET["url"]))
                return explode("/", trim($_GET["url"], "/"));
        }

        public function fixPrettyUrls($className){
            if($className){
                foreach($this->prettyUrls as $key=>$values){
                    if($className == $key."Controller") {
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
		
		public static function getSetting($key){
			if(!self::$settings)
				self::$settings = App::loadFile("App/Config/Config");
			if(isset(self::$settings[$key]))
				return self::$settings[$key];
			return false;
		}
    }