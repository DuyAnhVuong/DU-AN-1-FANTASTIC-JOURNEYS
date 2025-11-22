<?php
require './views/layout/header.php';
?>
<?php
include './views/layout/navbar.php';
?>
<?php
include './views/layout/sidebar.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý nhà cung cấp</h1>
        </div>
      </div>
    </div></section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">
            <div class="card-header default_cursor_land">
              <h3 class="card-title default_cursor_land">Thêm nhà cung cấp</h3>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=them-ncc' ?>" method="POST">
              <div class="card-body default_cursor_land">
                
                <div class="form-group default_cursor_land">
                  <label>Tour ID</label>
                  <input type="text" class="form-control" name="TourID" placeholder="Nhập ID Tour mà NCC cung cấp dịch vụ" value="<?= isset($_POST['TourID']) ? htmlspecialchars($_POST['TourID']) : '' ?>">
                  <?php if (isset($errors['TourID'])) { ?>
                    <p class="text-danger"><?= $errors['TourID'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group default_cursor_land">
                  <label>Loại Dịch Vụ</label>
                  <input type="text" class="form-control" name="LoaiDichVu" placeholder="nhập loại dịch vụ" value="<?= isset($_POST['LoaiDichVu']) ? htmlspecialchars($_POST['LoaiDichVu']) : '' ?>">
                  <?php if (isset($errors['LoaiDichVu'])) { ?>
                    <p class="text-danger"><?= $errors['LoaiDichVu'] ?></p>
                  <?php } ?>
                </div>
                
                <div class="form-group default_cursor_land">
                  <label>Tên Nhà Cung Cấp</label>
                  <input type="text" class="form-control" name="TenNCC" placeholder="Nhập tên nhà cung cấp" value="<?= isset($_POST['TenNCC']) ? htmlspecialchars($_POST['TenNCC']) : '' ?>">
                  <?php if (isset($errors['TenNCC'])) { ?>
                    <p class="text-danger"><?= $errors['TenNCC'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group default_cursor_land">
                  <label>Thông Tin Liên Hệ</label>
                  <textarea name="ThongTinLienHe" class="form-control" placeholder="Nhập thông tin liên hệ "><?= isset($_POST['ThongTinLienHe']) ? htmlspecialchars($_POST['ThongTinLienHe']) : '' ?></textarea>
                  <?php if (isset($errors['ThongTinLienHe'])) { ?>
                    <p class="text-danger"><?= $errors['ThongTinLienHe'] ?></p>
                  <?php } ?>
                </div>

              </div>
              <div class="card-footer default_cursor_land">
                <button type="submit" class="btn btn-primary">Thêm nhà cung cấp</button>
              </div>
            </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
<?php
include './views/layout/footer.php';
?>
</body>

</html>