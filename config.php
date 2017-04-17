<?php
    define("APP_URL", "http://localhost/");
    define("PUBLIC_URL", APP_URL."Public/");

    define("ENVIRONMENT", "development"); // development or production

    define("BASE_DIR",'/');
    define("ROOT_DIR", realpath(".") ."/");
    define("SYSTEM_DIR", ROOT_DIR ."System/");
    define("APP_DIR", ROOT_DIR ."App/");
    define("PUBLIC_DIR", ROOT_DIR . "Public/");

    define("DB_CONNECTION", "mysql");
    define("DB_HOST", "localhost");
    define("DB_PORT", "3306");
    define("DB_DATABASE", "mvc");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_CHARSET", "utf8");