
<?php include_once("header.php") ?>

<div class="row" style="padding-top:100px;">
  <div class="col-lg-12 right-panel">  
      Bạn đã đăng ký thành công
      <?php
        // session_start();
        if(isset($_SESSION['user'])!="")
        {
          echo "<h2>Xin chào: ".$_SESSION['user']."</h2><a href='/onthiphp/logout.php'>Đăng xuất</a>";
        }
        else{
          echo "<h2>Bạn chưa đăng nhập</h2>
						<a href='/onthiphp/login.php'>Đăng nhập</a> - <a href='/onthiphp/register.php'>Đăng ký</a>";
        }
      ?>
  </div>
</div> 

<?php include_once("footer.php") ?>