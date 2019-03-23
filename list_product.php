<?php 
    require_once("entities/product.class.php"); 
    require_once("entities/category.class.php"); 
?>
<?php include_once("header-client.php"); 
    if(!isset($_GET["cateid"])){
        $prods = Product::list_product();
    }
    else{
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateid($cateid);
    }
    $cates = Category::list_category();
?>

  <div class="menu">
      <ul id="dc_mega-menu-orange" class="dc_mm-orange">
          <li><a href="index.html">Home</a></li>
          <li><a href="products.html">Category</a>
            <ul>
        <!-- <li><a href="products.html">Mobile Phones</a>
                  <ul>
                    <li><a href="preview-2.html">Product 1</a></li>
                    <li><a href="preview-3.html">Product 2</a></li>
                    <li><a href="#">Product 3</a></li>
                    <li><a href="#">Product 4</a></li>
                    <li><a href="preview-6.html">Product 5</a></li>
                    <li><a href="#">Product 6</a></li>
                  </ul>
                </li> -->
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
        <!-- <li><a href="faq.html">Services</a>
          <ul>
            <li><a href="#">Service 1</a>
              <ul>
                <li><a href="#">Service Detail A</a></li>
                <li><a href="#">Service Detail B</a></li>
              </ul>
            </li>
            <li><a href="#">Service 2</a>
              <ul>
                <li><a href="#">Service Detail C</a></li>
              </ul>
            </li>
            <li><a href="#">Service 3</a>
              <ul>
                <li><a href="#">Service Detail D</a></li>
                <li><a href="#">Service Detail E</a></li>
                <li><a href="#">Service Detail F</a></li>
              </ul>
            </li>
            <li><a href="#">Service 4</a></li>
          </ul>
        </li>
        <li><a href="about.html">About</a></li>
         <li><a href="#">Delivery</a></li>
        <li><a href="faq.html">FAQS</a></li>
        <li><a href="contact.html">Contact</a> </li> -->
        <div class="clear"></div>
      </ul>
  </div>
</div>
  <div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
            <h3>Danh sách sản phẩm</h3>
            </div>
            <div class="sort">
            <p>Sort by:
                <select>
                    <option>Lowest Price</option>
                    <option>Highest Price</option>
                    <option>Lowest Price</option>
                    <option>Lowest Price</option>
                    <option>Lowest Price</option>
                    <option>In Stock</option>                               
                </select>
            </p>
            </div>
            <div class="show">
            <p>Danh mục:
           <select>
            <option>4</option>
            <option>8</option>
            <option>12</option>
            <option>16</option>
            <option>20</option>
            <option>In Stock</option>                   
          </select>



            </p>
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
        <?php
          foreach ($prods as $item) {
                //echo("<p>Ten san pham ".$item["ProductName"]."</p>");
                //echo("<p>Gia san pham ".$item["Price"]."</p>");
                //echo("<p>SL san pham ".$item["Quantity"]."</p>");
                //echo("<p>Mo ta san pham ".$item["Description"]."</p>");
                //echo("<p>Hinh san pham ".$item["Picture"]."</p>");
          ?>
          <div class="grid_1_of_4 images_1_of_4">
            <a href="/TH/tuan2_lab3/product_detail.php?id=<?php echo $item["ProductID"]; ?>">
              <img style="height:200px;" src="<?php echo $item["Picture"]; ?>" alt="" /></a>
            <h2 style="height:50px;"><?php echo $item["ProductName"]; ?></h2>
            <p style="height:100px;"><?php echo $item["Description"]; ?></p>
            <p><span class="price">SL: <?php echo $item["Quantity"]; ?></span><span class='price'><?php echo $item["Price"] ?>đ</span></p>
            <div class='button'><span><img src='images/cart.jpg' alt='' /><a href='preview-3.html' class='cart-button'>Add to Cart</a></span> </div>
            <div class='button'><span><a href='preview-3.html' class='details'>Details</a></span></div>
          </div>      
        <?php } ?>
        </div>
    </div>
  </div>  
</div>

 <?php include_once("footer-client.php"); ?>

 
