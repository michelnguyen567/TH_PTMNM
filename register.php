<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản!</h1>
              </div>
              
              <?php
                
                if(isset($_SESSION['user'])!="")
                {
                  //người dùng đã đăng nhập, trả về trang chủ
                  header("Location: list_product.php");
                }
                require_once("entities/user.class.php");  
                //Kiểm tra giá trị được gửi từ form đăng ký
                if(isset($_POST['btn-signup']))
                {
                  $u_name = $_POST['txtname'];
                  $u_email = $_POST['txtemail'];
                  $u_pass = $_POST['txtpass'];
                  $account = new User($u_name, $u_email, $u_pass);
                  $result = $account->save();
                  if(!$result)
                  {
                    ?>
                      <script>alert('Có lỗi xảy ra, vui lòng kiểm tra dữ liệu');</script>
                    <?php
                  }
                  else{
                    //Đăng ký tài khoản thành công, chuyển về trang chủ, lưu session user
                    $_SESSION['user'] = $u_name;
                    header("Location: list_product.php");
                  }
                }

              ?>
              <!-- form dang ky -->
              <form class="user" method="post">
                <div class="form-group row">
                  <label for="txtname" class="col-sm-12 form-control-label">Tên đăng nhập</label>
                  <div class="col-sm-12">
                    <input type="text" name="txtname" class="form-control form-control-user" placeholder="Username">
                  </div>
                </div>
                <div class="form-group row">
                <label for="txtemail" class="col-sm-12 form-control-label">Email</label>
                  <div class="col-sm-12">
                    <input type="text" name="txtemail" class="form-control form-control-user" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                <label for="txtpass" class="col-sm-12 form-control-label">Mật khẩu</label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control form-control-user" name="txtpass" placeholder="Password">
                  </div>
                </div>
                
                  <div class="col-sm-12">
                      <input class="btn btn-primary btn-user btn-block" type="submit" name="btn-signup" value="Đăng ký"/>
                  </div>
                
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="/TH/tuan2_lab3/login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>
