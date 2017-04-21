<?php
    namespace System\Core;

    class Route{
        private static $name = [];
        private static $url = [];
        private static $function = [];
        private static $method = [];
        private static $where = [];

        private static $instance;

        private function __construct(){}

        static function routeNow(){
            $genericUrls = explode("?",urldecode($_SERVER["REQUEST_URI"]));
            $genericUrls = ltrim($genericUrls[0],"/");

            foreach(self::$url as $rID => $rUrl){
                if(count(self::$where[$rID])){
                    foreach(self::$where[$rID] as $key=>$value){
                        $rUrl = preg_replace("@{".$key."}@","(".$value.")",$rUrl);
                        $rUrl = preg_replace("@{".$key."\?}@","(".$value."|)",$rUrl);
                    }
                }

                $rUrl = preg_replace("@{([0-9a-zA-Z]+)}@","(.*?)",$rUrl);
                $rUrl = preg_replace("@{([0-9a-zA-Z]+)\?}@","(.*?|)",$rUrl);

                $rUrl = preg_replace("@{/}@","(/?)",$rUrl);

                if(!preg_match("@^".$rUrl."$@",$genericUrls,$return))
                    continue;

                unset($return[0]);
                $parameters = array_values($return);

                for($i = count($parameters); $i > 0 ;$i--){
                    if(isset($parameters[$i]) && ( $parameters[$i]=="/" || !$parameters[$i])) {
                        unset($parameters[$i]);
                    }
                }
                $parameters = array_values($parameters);


                if($_SERVER['REQUEST_METHOD'] == self::$method[$rID] || self::$method[$rID] == "ANY"){
                    if(is_string(self::$function[$rID])) {
                        if(preg_match("/^([{?}a-zA-Z0-9.]+)@([{?}a-zA-Z0-9]+)$/",self::$function[$rID],$result)){
                            if(isset($result[1]) && isset($result[2])) {
                                $controller = $result[1];

                                $unset = [];

                                if ($controller == "{?}") {
                                    if (isset($parameters[0])) {
                                        $controller = ucfirst(strtolower($parameters[0]));
                                        unset($parameters[0]);
                                    } else die("Controller parametresi bulunamadi!");
                                } else if (preg_match("@{([0-9]+)}@", $controller, $cont)) {
                                    if (isset($parameters[$cont[1]])) {
                                        $controller = ucfirst(strtolower($parameters[$cont[1]]));
                                        $unset[] = $cont[1];
                                    } else die("Controller parametresi bulunamadi!");
                                }
                                $parameters = array_values($parameters);
                                $controller .= "Controller";

                                $method = $result[2];

                                if ($method == "{?}") {
                                    if (isset($parameters[0])) {
                                        $method = strtolower($parameters[0]);
                                        unset($parameters[0]);
                                    } else die("Method parametresi bulunamadi!");
                                } else if (preg_match("@{([0-9]+)}@", $method, $meth)) {
                                    if (isset($parameters[$meth[1]])) {
                                        $method = strtolower($parameters[$meth[1]]);
                                        $unset[] = $meth[1];
                                    } else die("Method parametresi bulunamadi!");
                                }

                                if (count($unset)) {
                                    foreach ($unset as $un) {
                                        unset($parameters[$un]);
                                    }
                                }

                                $parameters = array_values($parameters);

                                $controller = explode(".",$controller);
                                $controller = array_map("ucfirst",$controller);
                                $controller = implode("\\",$controller);

                                $controller = ("App\\Controllers\\".$controller);

                                if (class_exists($controller)) {
                                    if (method_exists($controller, $method)) {
                                        $controller = new $controller();
                                        call_user_func_array([$controller,$method],$parameters);
                                    } else die("<b>" . $controller . "</b> isimli controllerin <b>" . $method . "</b> isimli methodu bulunamadi!");
                                } else die("<b>" . $controller . "</b> isimli controller bulunamadi!");
                            }else die("Router <b>controller@method</b> sorunu");
                        }
                    }else if(is_callable(self::$function[$rID])) {
                        $return = call_user_func_array(self::$function[$rID], $parameters);
                        if(is_array($return))
                            echo json_encode($return);
                    }
                    break;
                }
            }
        }

        static function getInstance(){
            if(self::$instance == null)
                self::$instance = new self;
            return self::$instance;
        }

        static function any($method, $function){
            $instance = self::getInstance();

            self::$name[] = "";
            self::$url[] = trim($method,"/");
            self::$function[] = $function;
            self::$method[] = "ANY";
            self::$where[] = null;

            return $instance;
        }

        static function get($method, $function){
            $instance = self::getInstance();

            self::$name[] = "";
            self::$url[] = trim($method,"/");
            self::$function[] = $function;
            self::$method[] = "GET";
            self::$where[] = null;

            return $instance;
        }

        static function post($method, $function){
            $instance = self::getInstance();

            self::$name[] = "";
            self::$url[] = trim($method,"/");
            self::$function[] = $function;
            self::$method[] = "POST";
            self::$where[] = null;

            return $instance;
        }

        function name($name){
            self::$name[ count(self::$name) - 1 ] = $name;
            return $this;
        }

        function where($name,$where=null){
            $id = count(self::$where) - 1;
            if($where === null && is_array($name))
                self::$where[ $id ] = $name;
            else
                self::$where[$id][$name] = $where;

            return $this;
        }

        static function route($name,$parameters=null){
            $id = array_search($name,self::$name);
            if($id !== false) {
                $url = self::$url[$id];
                if(count($parameters)) {
                    foreach ($parameters as $key => $value) {
                        $url = preg_replace("@{" . $key . "}@", $value, $url);
                        $url = preg_replace("@{" . $key . "\?}@", $value, $url);
                    }
                }
                $url = preg_replace("@{/}@","/",$url);
                $url = preg_replace("@{([0-9a-zA-Z]+)\?}@","",$url);

                if(!preg_match_all("@{(.*?)}@",$url,$matches))
                    return $url;
                else{
                    $str = "Eksik Parametre : ";
                    foreach ($matches[1] as $id=>$match)
                        $str .= ($id != 0?', ':null).$match;
                    return $str;
                }
            }
        }
    }