<?php
    class Db
    {
        //Biến kết nối DB
        protected static $con;

        //Hàm khởi tạo kết nối
        public function connect()
        {
            //Kết nối tới CSDL trong trường hợp kết nối chưa được khởi tạo
            if(!isset(self::$con))
            {
                //Lấy thông tin kết nối từ tập tin config.ini
                $config = parse_ini_file("config.ini");
                self::$con = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]); 
            }
            //Xử lý nếu không kết nối được tới CSDL
            if(self::$con == false)
            {
                //Xử lý ghi file tại đây
                echo "Không kết nối được CSDL";
                return false;
            }
            return self::$con;
        }
        //Hàm thực thi câu truy vấn
        public function query_execute($qr){
            //Khởi tạo kết nối
            $con = $this->connect();
            //Thực hiện execute truy vấn
            $con->query("SET NAMES utf8");
            $result = $con->query($qr);
            //$con->close();
            return $result;
        }
    }
?>