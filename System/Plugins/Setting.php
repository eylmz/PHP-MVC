<?php
    namespace System\Plugins;

    use System\Core\App;

    class Setting{
        private $dir = "App/Config/";
        private $file = "Config";
        private $settings = [];
        function __construct($file = "Config"){
            $this->file = $file;
            $this->load($this->file);
        }

        function load($file){
            $this->settings = App::loadFile($this->dir.$file);
        }

        function get($key=null){
            if($key)
                return stripslashes($this->settings[$key]);
            else return $this->settings;
        }

        function set($key,$value){
            $this->settings[$key] = $value;
        }

        function drop(){
            $this->settings = [];
        }

        function truncate(){
            foreach($this->settings as $key => $value)
                $this->settings[$key] = null;
        }

        function copy($arr = []){
            foreach($arr as $key => $value)
                $this->settings[$key] = $value;
        }

        function save($arr = null){
            if($arr)
                $this->copy($arr);

            $string = '<?php
        return [
    ';
            foreach($this->settings as $key => $value){
                $string .= '      "' . $key . '"=>"' . $value . '",
    ';
            }
            $string .= '    ];';
            App::writeFile($this->dir.$this->file,$string);
        }
    }