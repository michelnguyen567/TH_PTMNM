<?php

    require_once("entities/product.class.php");
    require_once("entities/category.class.php");

    if(isset($_POST["btnsubmit"])){
        //Lay gia tri tu form collection
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $descrip = $_POST["txtdesc"];
        $picture = $_FILES["txtpic"];
        //Khoi tao doi tuong product
        $newProduct = new Product($productName, $cateID, $price, $quantity, $descrip, $picture);
        //Luu xuong CSDL
        $result = $newProduct->save();
        if(!$result)
        {
            //truy van loi
            header("Location: add_product.php?failure");
        }
        else{
            header("Location: add_product.php?inserted");
        }
    }
?>
<?php include_once("admin/header-admin.php"); ?>

<?php 
    if(isset($_GET["inserted"]))
    {
        echo "<h2>Thêm sản phẩm thành công</h2>";
    }
?>
<!-- form sản phẩm-->
<form method="post" enctype="multipart/form-data">
	<div class="col-lg-6">
        <div class="row">
            <div class="form-group">
              <label for="usr">Tên sản phẩm:</label>
              <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "";  ?>" />
            </div>
            <div class="form-group">
              <label for="pwd">Mô tả sản phẩm:</label>
              <textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "";  ?>"></textarea>
            </div>
            <div class="form-group">
              <label for="usr">Số lượng sản phẩm:</label>
              <input type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "";  ?>" />
            </div>
            <div class="form-group">
              <label for="usr">Giá sản phẩm:</label>
              <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "";  ?>" />
            </div>
            <div class="form-group">
              <label for="usr">Loại sản phẩm:</label>
              <select name="txtCateID">
                <option value="" selected>--Chọn loại--</option>
                <?php 
                    $cates = Category::list_category();
                    foreach ($cates as $item) {
                      # code...
                      echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
                    }

                 ?>
              </select>
            </div>
            <div class="form-group">
                  <label>Hình ảnh</label>
              <input type="file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.jpg">
            </div>
        </div>
        <input type="submit" name="btnsubmit" value="Thêm sản phẩm" class="btn btn-success">
        <a href="/TH/tuan2_lab3/list_product.php">Danh sách sản phẩm</a>
        
    </div>
</form>


<?php include_once("admin/footer-admin.php"); ?>