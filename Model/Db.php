<?php 
    class Db{
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $database = 'milktea';
        
        private $conn = NULL;

        public function connect(){
            $this->conn=new mysqli($this->host, $this->user, $this->pass, $this->database);
            if(!$this->conn){
                echo "Kết nối thất bại!";
                exit();
            }else{
                mysqli_set_charset($this->conn,'utf-8');
            }
            return $this->conn;
        }
    }
?>