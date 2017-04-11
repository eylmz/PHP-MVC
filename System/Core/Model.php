<?php
    use Medoo\Medoo;
    abstract Class Model{
        protected $db;

        protected static $connection;

        final protected function connect()
        {
            if ( self::$connection ) return self::$connection;

            $setting = new Setting("Database");
            $db = $setting->get();

            if($db["database_name"] && $db["server"] && $db["username"])
            {
                try
                {
                    return self::$connection = new Medoo($db);
                }
                catch( Exception $e )
                {
                    exit($e->getMessage());
                }
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
            return $this->db->last_query();
        }
    }
