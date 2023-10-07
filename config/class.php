<?php
    class DB{
        private static $host = null;
        private static $user = null;
        private static $password = null;
        private static $dbname = null;

        private static $conn = null;
        function __construct(){
            $bool = self::get_conn();
        }

        private static function get_conn(){
            self::$host = getenv("db_host");
            self::$user = getenv("db_user");
            self::$password = getenv("db_pass");
            self::$dbname = getenv("db_db");
            self::$conn = new mysqli(self::$host, self::$user, self::$password, self::$dbname);
            if (self::$conn->connect_error) {
                return false;
            }
            return true;
        }
        

        public function table_exists($table_name){    
            $query = "SHOW TABLES LIKE '$table_name'";
            $
            $this->conn->bind_param("s",$table_name);
            $result = self::$conn->query($query);
            return $result->num_rows > 0;
        }

        public function insert($table_name = "table_name", $data = "fun"){
            if(self::$conn === null) { // check connection 
                echo self::get_conn();
            }

            if($this->table_exists($table_name)){
                echo "table exists";
            }else{
                echo "table not exists";
            }
        }

    }

    $obj = new DB();
    $obj->insert();