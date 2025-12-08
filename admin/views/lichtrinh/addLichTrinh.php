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
          <h1>Quản lý lịch trình tour</h1>
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
              <h3 class="card-title default_cursor_land">Thêm lịch trình tour</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=them-lich-trinh' ?>" method="POST">
              <div class="card-body default_cursor_land">
                <div class="form-group default_cursor_land">
                  <label>Ngày</label>
                  <input type="text" class="form-control" name="Ngay" placeholder="Nhập ngày">
                  <?php if (isset($errors['Ngay'])) { ?>
                    <p class="text-danger"><?= $errors['Ngay'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group default_cursor_land">
                  <label>Thời gian</label>
                  <input type="text" class="form-control" name="ThoiGian" placeholder="Nhập thời gian">
                  <?php if (isset($errors['ThoiGian'])) { ?>
                    <p class="text-danger"><?= $errors['ThoiGian'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group default_cursor_land">
                  <label>Điểm đến</label>
                  <textarea name="DiemThamQuan" class="form-control" placeholder="Nhập điểm đến"></textarea>
                  <?php if (isset($errors['DiemThamQuan'])) { ?>
                    <p class="text-danger"><?= $errors['DiemThamQuan'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group default_cursor_land">
                  <label>Hoạt động</label>
                  <input type="text" class="form-control" name="HoatDong" placeholder="Nhập hoạt động">
                  <?php if (isset($errors['HoatDong'])) { ?>
                    <p class="text-danger"><?= $errors['HoatDong'] ?></p>
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