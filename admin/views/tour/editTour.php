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
              <h3 class="card-title default_cursor_land">Sửa tour</h3>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=sua-tour' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body default_cursor_land">

                <div class="form-group">
                  <input type="hidden" name="TourID" value="<?= $tour['TourID'] ?>">

                  <label>Tên tour</label>
                  <input type="text" class="form-control" name="TenTour" placeholder="Nhập tên Tour"
                    value="<?= $tour['TenTour'] ?>">
                  <?php if (isset($_SESSION['error']['TenTour'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['TenTour'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group">
                  <label>Ảnh minh họa</label>
                  <input type="file" name="Image" placeholder="Chọn ảnh minh họa" value="<?= $tour['Image'] ?>">
                  <?php if (isset($_SESSION['error']['Image'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['Image'] ?></p>
                  <?php } ?>
                </div>
                <br>

                <div class="form-group default_cursor_land col-12">
                  <label for="LoaiTourID">Loại Tour</label>
                  <select class="form-control" name="LoaiTourID" id="LoaiTourID" value="<?= $tour['LoaiTourID'] ?>">
                    <option value="0" selected disabled>Chọn tour</option>
                    <option value="1">Tour Trong Nước</option>
                    <option value="2">Tour Nước Ngoài</option>
                    <option value="3">Tour Yêu Cầu</option>
                  </select>
                  <?php if (isset($_SESSION['error']['LoaiTourID'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['LoaiTourID'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group default_cursor_land col-12">
                  <label>Mô tả</label>
                  <input type="text" class="form-control" name="MoTa" placeholder="Nhập MoTa"
                    value="<?= $tour['MoTa'] ?>">
                  <?php if (isset($_SESSION['error']['MoTa'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['MoTa'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group default_cursor_land col-12">
                  <label>Ngày tạo</label>
                  <input type="date" class="form-control" name="NgayTao" placeholder="Nhập NgayTao"
                    value="<?= $tour['NgayTao'] ?>">
                  <?php if (isset($_SESSION['error']['NgayTao'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['NgayTao'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group default_cursor_land col-12">
                  <label>Giá</label>
                  <input type="text" class="form-control" name="Gia" placeholder="Nhập giá" value="<?= $tour['Gia'] ?>">
                  <?php if (isset($_SESSION['error']['Gia'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['Gia'] ?></p>
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