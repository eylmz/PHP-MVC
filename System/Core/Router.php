<?php
    class Router extends App{
        function __construct()
        {
            parent::__construct();
            $this->RouteNow();
        }

        function RouteNow(){
            $controller=null;
            $admin = false;

            if($this->fixClass(@$this->url[0]) == "AdminController"){
                $admin = true;
                unset($this->url[0]);
                $this->url = array_values($this->url);
                if(isset($this->url[0]))
                    $controller = "Admin".$this->fixPrettyUrls($this->fixClass(@$this->url[0]));
                else $controller = "AdminHomeController";
            }else {
                $controller = $this->fixPrettyUrls($this->fixClass(@$this->url[0]));
            }

            $method = $this->fixMethod(@$this->url[1]);
            if(class_exists($controller)){
                if(isset($method) && method_exists($controller,$method)){
                    $parameters = $this->url;
                    unset($parameters[0]);
                    unset($parameters[1]);
                    $parameters = array_values($parameters);
                    $controller = new $controller();
                    call_user_func_array([$controller,$method],$parameters);
                }else{
                    $controller = new $controller();
                    if(method_exists($controller,"index"))
                        $controller->index();
                    else exit("<b>".get_class($controller)."</b> isimli controller ın index metodu bulunamadı!");
                }
            }else{
                if($admin == false)
                    $controller = new HomeController();
                else
                    $controller = new AdminHomeController();
                if(method_exists($controller,"index"))
                    $controller->index();
                else exit("<b>".get_class($controller)."</b> isimli controller ın index metodu bulunamadı!");
            }
        }

        static function Route($url,$time=0){
            if($time > 0)
                header("Refresh:$time; url=$url");
            else
                header("Location:$url");
        }

        static function sefLink($string)
        {
            $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
            $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
            $string = strtolower(str_replace($find, $replace, $string));
            $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
            $string = trim(preg_replace('/\s+/', ' ', $string));
            $string = str_replace(' ', '-', $string);
            return $string;
        }
    }
