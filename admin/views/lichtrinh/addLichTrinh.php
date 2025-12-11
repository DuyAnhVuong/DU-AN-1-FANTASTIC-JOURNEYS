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
              <div class="form-group">
                <label for="TenTour" class="form-label"> Tên tour<span class="required">*</span> </label>
                <select id="TenTour" name="TenTour" class="form-select">
                  <option value="">-- Chọn tour --</option>
                  <?php foreach ($listTour as $tour): ?>
                    <option value="<?= $tour['TenTour'] ?>">
                      <?= $tour['TenTour'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Ngày</label>
                <input type="text" class="form-control" name="Ngay" required>
              </div>

              <div class="form-group">
                <label>Thời gian</label>
                <input type="text" class="form-control" name="ThoiGian" required>
              </div>

              <div class="form-group">
                <label>Điểm đến</label>
                <textarea name="DiemThamQuan" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label>Hoạt động</label>
                <input type="text" class="form-control" name="HoatDong">
              </div>

              <button type="submit" class="btn btn-primary">Thêm</button>
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