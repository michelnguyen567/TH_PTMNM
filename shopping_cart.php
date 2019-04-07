<?php include_once('header-client.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<?php 
    require_once("entities/product.class.php"); 
    require_once("entities/category.class.php"); 

    $cates = Category::list_category();
//Khởi động Session
   // session_start();
//Hiển thị lỗi
    error_reporting(E_ALL);
    ini_set('display_errors','1');
//Thêm mới sản phẩm vào giỏ hàng
    if(isset($_GET["id"])){
        $pro_id = $_GET["id"];
        //Biến xác nhận sản phẩm đã tồn tại trong giỏ hàng hay chưa
        //was_found = true -->  sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
        //was_found = false --> sản phẩm chưa có trong giỏ hàng, thêm sản phẩm vào giỏ hàng, mặc định số lượng là 1
        $was_found = false;
        $i = 0;
        //Kiểm tra session được khởi tạo hay chưa
        if(!isset($_SESSION["cart_items"]) || count($_SESSION["cart_items"]) < 1)
        {
            $_SESSION["cart_items"] = array(0 => array("pro_id" => $pro_id, "quantity" =>1));

        }
        else{
            //Giỏ hàng đã được khởi tạo
            //Duyệt tất cả các sản phẩm trong giỏ hàng
            //Nếu đã tồn tại sản phẩm thì tăng số lượng lên 1
            //Nếu chưa  tồn tại thì sẽ thêm mới sản phẩm vào giỏ hàng với sl là 1
            foreach($_SESSION["cart_items"] as $item){
                $i++;
                while(list($key,$value) = each($item)){
                    if($key == "pro_id" && $value==$pro_id){
                        //Sản phẩm đã tồn tại trong giỏ hàng, tổng số lượng lên 1
                        array_splice($_SESSION["cart_items"], $i-1, 1, array(array("pro_id" => $pro_id, "quantity" => $item["quantity"]+1)));
                        $was_found = true;
                    }
                }
            }
            if($was_found == false){
                array_push($_SESSION["cart_items"], array("pro_id" => $pro_id, "quantity" => 1));
            }
        }
        header("location: shopping_cart.php");
    }
?>



    <div class="menu">
      <ul id="dc_mega-menu-orange" class="dc_mm-orange">
          <li><a href="/TH/tuan2_lab3/list_product.php">Home</a></li>
          <li><a href="products.html">Category</a>
            <ul>
                <?php 
                      foreach ($cates as $item) {
                          # code...
                          echo "
                          <li><a href=/TH/tuan2_lab3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a>
                              <ul>
                                  <li><a href='preview-2.html'>Product 1</a></li>
                                  <li><a href='preview-3.html'>Product 2</a></li>
                              </ul>
                          </li>";
                      }
                 ?>
              </ul>
          </li>
        <div class="clear"></div>
      </ul>
    </div>
</div>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
            <h3>Chi tiết giỏ hàng</h3>
            </div>
            <div class="page-no">
                <p>Result Pages:<ul>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li>[<a href="#"> Next>>></a >]</li>
                    </ul></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <div class="container">
                <table class="table table-striped">
                    <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_money = 0;
                            if(isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0)
                            {
                                foreach ($_SESSION["cart_items"] as $item) {
                                    # code...
                                    $id = $item["pro_id"];
                                    $product = Product::get_product($id);
                                    $prod = reset($product);
                                    $total_money += $item["quantity"] * $prod["Price"];
                                    echo "<tr>
                                            <td>".$prod["ProductName"]."</td>
                                            <td><img style='width:90px; height:80px' src=".$prod["Picture"]."></></td>
                                            <td>".$item["quantity"]."</td>
                                            <td>".$prod["Price"]."</td>
                                            <td>".$total_money."</td>
                                        </tr>";
                                        
                                } 
                                echo "<tr>
                                        <td colspan=5><p class='text-right text-danger'>Tổng tiền: ".$total_money."</td>
                                    </tr>";  
                                echo "<tr>
                                        <td>
                                            <button type='button' class='btn btn-primary'>Tiếp tục mua hàng</button>
                                            <button type='button' class='btn btn-success'>Thanh toán</button>
                                        </td>
                                    </tr>";
                            }
                            else{
                                echo "Không có sản phẩm nào trong giỏ hàng";
                            }    
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>  
</div>


<?php include_once('footer-client.php') ?>