<?php
	require_once("config/db.class.php");
	class Product
	{
		public $productID;
		public $productName;
		public $cateID;
		public $price;
		public $quantity;
		public $description;
		public $picture;

		public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture)
		{
			$this->productName = $pro_name;
			$this->cateID = $cate_id;
			$this->price = $price;
			$this->quantity = $quantity;
			$this->description = $desc;
			$this->picture = $picture;
		}
		//Luu san pham
		public function save()
		{
			//Xử lý upload hình ảnh
			//tmp_name: biến tạm lưu tên file
			//name: tên của file trên máy
			$file_temp = $this->picture['tmp_name'];
			$user_file = $this->picture['name'];
			$timestamp = date("Y").date("d").date("h").date("i").date("s");
			$filepath = "images/uploads/".$timestamp.$user_file;
			if(move_uploaded_file($file_temp, $filepath)==false){
				return false;
			}

			//end upload file
			$db = new Db();
			//Them product vao CSDL
			$sql = "INSERT INTO Product (ProductName, CateID, Price, Quantity, Description, Picture) VALUES ('$this->productName',
				'$this->cateID',
				'$this->price',
				'$this->quantity',
				'$this->description',
				'$filepath')";
			$result = $db->query_execute($sql);
			return $result;
		}
		public static function list_product(){
			$db=new Db();
			$sql="SELECT * FROM product";
			$result = $db->select_to_array($sql);
			return $result;
		}
		//Lấy danh sách sản phẩm theo loại sp
		public static function list_product_by_cateid($cateid){
			$db = new Db();
			$sql = "SELECT * FROM product WHERE CateID ='$cateid'";
			$result = $db->select_to_array($sql);
			return $result;
		}
		//Lấy danh sách sản phẩm cùng loại
		public static function list_product_relate($cateid, $id){
			$db = new Db();
			$sql = "SELECT * FROM product WHERE CateID='$cateid' AND productID!='$id'";
			$result = $db->select_to_array($sql);
			return $result;
		}
		public static function get_product($id){
			$db = new Db();
			$sql = "SELECT * FROM product WHERE productID='$id'";
			$result = $db->select_to_array($sql);
			return $result;
		}
	}
?>