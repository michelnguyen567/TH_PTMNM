<?php 
	require_once("entities/product.class.php"); 
    require_once("entities/category.class.php"); 
 ?>
<?php 
	include_once("header-client.php"); 
	
	if(!isset($_GET["id"])){
		//Đường dẫn xem chi tiết sản phẩm không đúng
		//Dẫn tới trang not_found	
		header('Location: not_found.php');
	}
	else{
		$id = $_GET["id"];
		//$prod = reset(Product::get_product($id));
		$temp = Product::get_product($id);
		$prod = reset($temp);
		$prods_relate = Product::list_product_relate($prod["CateID"], $id);
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
	    		<div class="back-links">
	    		<p><a href="index.html">Home</a> >> <a href="#">Electronics</a></p>
	    	    </div>
	    		
	    		<div class="clear"></div>
	    	</div>
	    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="<?php echo $prod["Picture"]; ?>" alt="" />
					</div>
					<div class="desc span_3_of_2">
						<h2><?php echo $prod["ProductName"]; ?></h2>
						<p><?php echo $prod["Description"]; ?></p>					
						<div class="price">
							<p>Price: <span><?php echo $prod["Price"]; ?>đ</span></p>
						</div>
						<div class="available">
							<p>Available Options :</p>
						<ul>
							<li>Color:
								<select>
								<option>Silver</option>
								<option>Black</option>
								<option>Dark Black</option>
								<option>Red</option>
							</select></li>
							<li>Size:<select>
								<option>Large</option>
								<option>Medium</option>
								<option>small</option>
								<option>Large</option>
								<option>small</option>
							</select></li>
							<li>Quality:<select>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select></li>
						</ul>
						</div>
						<div class="share">
							<p>Share Product :</p>
							<ul>
						    	<li><a href="#"><img src="images/youtube.png" alt=""></a></li>
						    	<li><a href="#"><img src="images/facebook.png" alt=""></a></li>
						    	<li><a href="#"><img src="images/twitter.png" alt=""></a></li>
						    	<li><a href="#"><img src="images/linkedin.png" alt=""></a></li>
				    		</ul>
						</div>
						<div class="add-cart">
							<div class="rating">
								<p>Rating:<img src="images/rating.png" alt="" /><span>[3 of 5 Stars]</span></p>
							</div>
							<div class="button"><span><a href="#">Add to Cart</a></span></div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="product-desc">
						<h2>Product Details</h2>
						<p><?php echo $prod["Description"]; ?></p>
				    </div>
				    <div class="product-tags">
						<h2>Product Tags</h2>
						<h4>Add Your Tags:</h4>
						<div class="input-box">
							<input type="text" value="" />
						</div>
						<div class="button"><span><a href="#">Add Tags</a></span></div>
				    </div>
				    <div class="product-desc">
				    	<h2>Product Relate</h2>
				    </div>	
		    
				</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				        <?php 
				        	foreach ($cates as $item) {
				        		# code...
				        		echo "<li><a href=/TH/tuan2_lab3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
				        	}
				         ?>
					</ul>
					<div class="subscribe">
						<h2>Newsletters Signup</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.......</p>
						    <div class="signup">
							    <form>
							    	<input type="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';"><input type="submit" value="Sign up">
							    </form>
						    </div>
						</div>
						<div class="community-poll">
						 	<h2>Community POll</h2>
						 	<p>What is the main reason for you to purchase products online?</p>
						 	<div class="poll">
						 		<form>
						 			<ul>
									<li>
									<input type="radio" name="vote" class="radio" value="1">
									<span class="label"><label>More convenient shipping and delivery </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="2">
									<span class="label"><label for="vote_2">Lower price</label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio"  value="3">
									<span class="label"><label for="vote_3">Bigger choice</label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio"  value="5">
									<span class="label"><label for="vote_5">Payments security </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="6">
									<span class="label"><label for="vote_6">30-day Money Back Guarantee </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="7">
									<span class="label"><label for="vote_7">Other.</label></span>
									</li>
									</ul>
						 		</form>
						 	</div>
						 </div>
					</div>
	 		</div>
	 		<div class="section group">
		    	<?php 
		    		foreach ($prods_relate as $item) {
		    			# code...
		    		?>
				 <div class="grid_1_of_4 images_1_of_4">
		            <a href="/TH/tuan2_lab3/product_detail.php?id=<?php echo $item["ProductID"]; ?>">
		              <img style="height:200px;" src="<?php echo $item["Picture"]; ?>" alt="" /></a>
		            <h2 style="height:50px;"><?php echo $item["ProductName"]; ?></h2>
		            <p style="height:100px;"><?php echo $item["Description"]; ?></p>
		            <p><span class="price">SL: <?php echo $item["Quantity"]; ?></span><span class="price"><?php echo $item["Price"] ?>đ</span></p>
		            <div class="button"><span><img src="images/cart.jpg" alt='' /><a href="preview-3.html" class="cart-button">Thêm giỏ</a></span> </div>
		            <div class="button"><span><a href="/TH/tuan2_lab3/product_detail.php?id=<?php echo $item["ProductID"]; ?>" class="details">Details</a></span></div>
		         </div>   
		    	<?php } ?>			
		    </div>
	 	</div>
	</div>	
</div>
 <?php include_once("footer-client.php"); ?>
