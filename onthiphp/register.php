<?php include_once("header.php") ?>

<div class="row" style="padding-top:100px;"> 
    <div class="col-lg-6 left-panel">

    </div>
    <div class="col-lg-6 right-panel">
        <h1 class="text-center">Đăng ký tài khoản</h1>
        <?php
            if(isset($_SESSION['user'])!=""){
                header("Location: index.php");
            }
            require_once("entities/user.class.php");
            if(isset($_POST['btn-signup'])){
                $u = $_POST['txtname'];
                $e = $_POST['txtemail'];
                $p = $_POST['txtpassword'];
                $account = new User($u, $e, $p);
                $rs = $account->save();
                if(!$rs){
                    ?>
                    <script>alert('Có lỗi xảy ram vui lòng kiểm tra dữ liệu');</script>
                    <?php
                }
                else{
                    $_SESSION['user'] = $u;
                    header("Location: index.php");
                }
            }
        
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" class="form-control" placeholder="Nhập tên" name="txtname">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Nhập email" name="txtemail">
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="txtpassword">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <input style="width:100%;" class="btn btn-primary" type="submit" name="btn-signup" value="Đăng ký"/>
            <div class="text-center">
                <a href="/onthiphp/login.php">Đã có tài khoản ! Đăng nhập!</a>
              </div>
        </form>
    </div>
</div>


<?php include_once("footer.php") ?>