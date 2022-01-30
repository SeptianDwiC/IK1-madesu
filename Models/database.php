<?php
    class database {
        public $host = "localhost";
        public $username = "root";
        public $pass = "";
        public $dbname = "apotek";
        public $conn;

        function __construct()
        {
            $this->conn = new mysqli($this->host, $this->username, $this->pass, $this->dbname);
            if(!$this->conn){
                return false;
            }else{
                return true;
            }
        }
    }
?>