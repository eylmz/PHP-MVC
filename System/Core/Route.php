<?php
    class Route{
        private static $name = [];
        private static $url = [];
        private static $function = [];
        private static $method = [];
        private static $where = [];

        private static $instance;

        private function __construct(){}

        static function routeNow(){
            $genericUrls = explode("?",$_SERVER["REQUEST_URI"]);
            $genericUrls = trim($genericUrls[0],"/");

            foreach(self::$url as $rID => $rUrl){
                if(count(self::$where[$rID])){
                    foreach(self::$where[$rID] as $key=>$value){
                        $rUrl = preg_replace("@{".$key."}@","(".$value.")",$rUrl);
                        $rUrl = preg_replace("@{".$key."\?}@","(".$value."|)",$rUrl);
                    }
                }

                $rUrl = preg_replace("@{([0-9a-zA-Z]+)}@","(.*?)",$rUrl);
                $rUrl = preg_replace("@{([0-9a-zA-Z]+)\?}@","(.*?|)",$rUrl);

                if(!preg_match("@^".$rUrl."$@ies",$genericUrls,$return))
                    continue;

                unset($return[0]);
                $parameters = array_values($return);

                if($_SERVER['REQUEST_METHOD'] == self::$method[$rID]){
                    if(is_string(self::$function[$rID])) {
                        if(preg_match("/([{?}a-zA-Z0-9]+)@([{?}a-zA-Z0-9]+)/",self::$function[$rID],$result)){
                            if(isset($result[1]) && isset($result[2])) {
                                $controller = $result[1];
                                if($controller == "{?}"){
                                    if(isset($parameters[0])){
                                        $controller = ucfirst( strtolower( $parameters[0] ) );
                                        unset($parameters[0]);
                                    }else die("Controller parametresi bulunamadi!");
                                }
                                $parameters = array_values($parameters);
                                $controller .= "Controller";

                                $method = $result[2];

                                if($method == "{?}"){
                                    if(isset($parameters[0])){
                                        $method = strtolower( $parameters[0] );
                                        unset($parameters[0]);
                                    }else die("Method parametresi bulunamadi!");
                                }
                                $parameters = array_values($parameters);

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
                $urls = explode("/",self::$url[$id]);
                $rUrl = "";

                if(count($urls) > 0){
                    foreach($urls as $url){
                        if(preg_match("@{([0-9a-zA-Z?]+)}@",$url,$param)){
                            $param = $param[1];
                            if( $param[ strlen($param) - 1] == '?'){
                                $param = substr($param,0,strlen($param) - 1);
                                if(isset($parameters[$param]))
                                    $rUrl .= $parameters[$param]."/";
                            }else{
                                if(isset($parameters[$param])){
                                    $rUrl .= $parameters[$param]."/";
                                }else return false;
                            }
                        }else $rUrl .= $url . "/";
                    }
                    return trim($rUrl,"/");
                }else return "";
            }
        }
    }