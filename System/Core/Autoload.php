<?php
    namespace System\Core;

    class Autoload{
        public static function register()
        {
            return spl_autoload_register(__NAMESPACE__ . "\\Autoload::run");
        }

        public static function run($className)
        {
            $className = ltrim($className, '\\');
            $fileName  = '';
            $namespace = '';
            if ($lastNsPos = strrpos($className, '\\')) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
            $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

            if(file_exists($fileName))
                require $fileName;
            else die("'<b>{$fileName}</b>' dosyası bulunamadı!");
        }
    }

    Autoload::register();