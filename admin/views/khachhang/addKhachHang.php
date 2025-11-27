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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý khách hàng Tour</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">
            <div class="card-header default_cursor_land">
              <h3 class="card-title default_cursor_land">Thêm khách hàng Tour</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=them-khach-hang' ?>" method="POST">
              <div class="card-body default_cursor_land">
                <div class="form-group default_cursor_land">
                  <label>Tên khách hàng</label>
                  <input type="text" class="form-control" name="TenKH" placeholder="Nhập tên khách hàng">
                  <?php if (isset($errors['TenKH'])) { ?>
                    <p class="text-danger"><?= $errors['TenKH'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group default_cursor_land">
                  <label>Trạng thái cập nhập</label>
                  <select name="CheckInStatus" id="">
                    <option value="0">Nhập trạng thái cập nhập</option>
                    <option value="1">Chưa đến</option>
                    <option value="2">Đã đến</option>
                    <option value="3">Vắng mặt</option>
                  </select>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer default_cursor_land">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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