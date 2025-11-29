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
              <h3 class="card-title default_cursor_land">Sửa nhà cung cấp</h3>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=sua-ncc' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body default_cursor_land">
                <input type="hidden" name="NCC_TourID" value="<?= $listNCC['NCC_TourID'] ?>">
                <div class="form-group">

                  <label for="TourID">Tên tour</label>
                  <select id="TourID" name="TourID" class="form-control custom-select">
                    <?php foreach ($listTour as $Tour): ?>
                      <option selected <?= $Tour['TourID'] == $listNCC['TourID'] ?>value="<?= $Tour['TourID'] ?>">

                        <?= $Tour['TenTour'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>LoaiDichVu</label>
                  <input type="text" class="form-control" name="LoaiDichVu" placeholder="LoaiDichVu"
                    value="<?= $listNCC['LoaiDichVu'] ?>">
                  <?php if (isset($_SESSION['error']['LoaiDichVu'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['LoaiDichVu'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group default_cursor_land col-12">
                  <label>TenNCC</label>
                  <input type="text" class="form-control" name="TenNCC" placeholder="Nhập TenNCC"
                    value="<?= $listNCC['TenNCC'] ?>">
                  <?php if (isset($_SESSION['error']['TenNCC'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['TenNCC'] ?></p>
                  <?php } ?>
                </div>




                <div class="form-group default_cursor_land col-12">
                  <label>ThongTinLienHe</label>
                  <input type="text" class="form-control" name="ThongTinLienHe" placeholder="Nhập ThongTinLienHe"
                    value="<?= $listNCC['ThongTinLienHe'] ?>">
                  <?php if (isset($_SESSION['error']['ThongTinLienHe'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ThongTinLienHe'] ?></p>
                  <?php } ?>
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