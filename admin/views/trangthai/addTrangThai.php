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
          <h1>Quản lý trạng thái booking</h1>
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
              <h3 class="card-title default_cursor_land">Thêm trạng thái booking</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=them-trang-thai' ?>" method="POST">
              <div class="card-body default_cursor_land">
                <div class="form-group default_cursor_land">
                  <label>Booking ID</label>

                  <input type="text" class="form-control" name="BookingID" placeholder="Nhập Booking ID">
                  <?php if (isset($errors['BookingID'])) { ?>
                    <p class="text-danger"><?= $errors['BookingID'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group default_cursor_land">
                  <label>Trạng thái</label>
                  <select name="TrangThai" class="form-control">
                    <option value="">-- Chọn trạng thái --</option>
                    <option value="chờ xác nhận">Chờ xác nhận</option>
                    <option value="đã cọc">Đã cọc</option>
                    <option value="hoàn tất">Hoàn tất</option>
                    <option value="huỷ">Huỷ</option>
                  </select>

                  <?php if (isset($errors['TrangThai'])) { ?>
                    <p class="text-danger"><?= $errors['TrangThai'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group default_cursor_land">
                  <label>Thời gian cập nhật</label>
                  <input type="date" class="form-control" name="ThoiGianCapNhat" placeholder="Nhập thời gian cập nhật">
                  <?php if (isset($errors['ThoiGianCapNhat'])) { ?>
                    <p class="text-danger"><?= $errors['ThoiGianCapNhat'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group default_cursor_land">
                  <label>Người cập nhật ID</label>
                  <input type="text" class="form-control" name="NguoiCapNhatID" placeholder="Nhập người cập nhật ID">
                  <?php if (isset($errors['NguoiCapNhatID'])) { ?>
                    <p class="text-danger"><?= $errors['NguoiCapNhatID'] ?></p>
                  <?php } ?>
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