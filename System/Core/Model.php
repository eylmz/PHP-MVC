<?php
    namespace System\Core;

    use Medoo\Medoo;

    abstract Class Model{
        protected $db;
        private static $connection;

        final private function connect()
        {
            if ( self::$connection ) return self::$connection;

            $db = [
                "database_type" => DB_CONNECTION,
                "database_name" => DB_DATABASE,
                "server" => DB_HOST,
                "port" => DB_PORT,
                "username" => DB_USERNAME,
                "password" => DB_PASSWORD,
                "charset" >= DB_CHARSET
            ];

            try
            {
                return self::$connection = new Medoo($db);
            }
            catch( Exception $e )
            {
                exit($e->getMessage());
            }
        }

        public function __construct()
        {
            $this->db = $this->connect();;
        }

        public function errorMessage(){
            return $this->db->error()[2];
        }

        public function lastQuery(){
            return $this->db->last();
        }
    }
