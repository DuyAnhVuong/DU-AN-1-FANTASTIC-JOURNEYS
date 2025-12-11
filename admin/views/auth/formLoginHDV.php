<!DOCTYPE html>
<html lang="en">
  <style>
    .login-box{
        background: #000;
    }
</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập hệ thống</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box - accent-dark">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">Đăng nhập</a>
    </div>
    <div class="card-body">
      <?php if (isset($_SESSION['error'])) { ?>
          <p class="text-danger">
              <?= is_array($_SESSION['error']) ? implode('<br>', $_SESSION['error']) : $_SESSION['error']; ?>
          </p>
        <?php }else{?><p class="login-box-msg">Vui lòng đăng nhập</p>
      <?php } ?>

      <form action="<?= BASE_URL . '?act=check-loginHDV' ?>" method="post">
        
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $_POST['email'] ?? '' ?>"> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
          </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">Quên mật khẩu</a>
      </p>

    </div>
    </div>
  </div>
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./assets/dist/js/adminlte.min.js"></script>
</body>
</html>