<!-- header -->
<?php
require './views/layout/header.php';
?>
<!-- Navbar -->
<?php
include './views/layout/navbar.php';
?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php
include './views/layout/sidebar.php';
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-dark">
            <div class="card-header default_cursor_land">
              <h3 class="card-title default_cursor_land">Thêm tài khoản</h3>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST">
              <div class="card-body default_cursor_land">

                <div class="form-group">
                  <label>Họ tên</label>
                  <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
                  <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" name="password" placeholder="Nhập pw">
                  <?php if (isset($_SESSION['error']['password'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['password'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group default_cursor_land col-12">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Nhập email">
                  <?php if (isset($_SESSION['error']['email'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group default_cursor_land col-12">
                  <label for="VaiTro">Vai trò</label>
                  <select class="form-control" name="chuc_vu_id" id="VaiTro">
                    <option value="1">Admin</option>
                    <option value="2">Hướng Dẫn Viên</option>
                  </select>
                </div>


              </div>
              <div class="card-footer default_cursor_land">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php
include './views/layout/footer.php';
?>
<!-- endfooter -->
<!-- Page specific script -->
<!-- Code injected by live-server -->

</body>

</html>