<?php
    namespace System\Helpers;

    class Session{
        public static function Start(){
            session_start();
        }

        public static function Create($key,$data){
            $_SESSION[$key] = $data;
        }

        public static function Get($key){
            if(isset($_SESSION[$key]))
                return $_SESSION[$key];
            return false;
        }

        public static function Delete($name){
            if(isset($_SESSION[$name]))
                unset($_SESSION[$name]);
        }

        public static function DeleteAll(){
            session_destroy();
        }

        public static function isExists($name){
            if(isset($_SESSION[$name]))
                return true;
            return false;
        }
    }
