<?php 
    require_once("config/db.class.php");
    class User{
        public $id;
        public $un;
        public $pw;
        public $email;
        public function __construct($u, $e, $p){
            $this->un = $u;
            $this->email = $e;
            $this->pw = $p;
        }

        public function save(){
            $db = new Db();
            $sql = "INSERT INTO users (UserName, Email, Password) 
                VALUES('".mysqli_real_escape_string($db->connect(), 
                $this->un)."', '".mysqli_real_escape_string($db->connect(),
                $this->email)."', '".md5(mysqli_real_escape_string($db->connect(), 
                $this->pw))."')";
            $rs = $db->query_execute($sql);
            return $rs;
        }

        public static function checkLogin($u, $p){
            $pass = md5($p);
            echo ($pass);
            $db = new Db();
            $sql = "SELECT * FROM users WHERE UserName='$u' AND Password='$pass'";
            $rs = $db->query_execute($sql);
            return $rs;
        }
    }
?>