	<?php
		abstract Class Model{
			protected $db;
	
			protected static $connection;
			
			final protected function connect()
			{
				if ( self::$connection ) return self::$connection;
			
				$db = App::getSetting("database");
				if($db["dbname"] && $db["dbserver"] && $db["dbuser"])
				{
					try
					{
						return self::$connection = new Medoo([
							'database_type' => 'mysql',
							'database_name' => $db["dbname"],
							'server' => $db["dbserver"],
							'username' => $db["dbuser"],
							'password' => $db["dbpass"],
							'charset' => $db["dbcharset"]
						]);
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
		}
