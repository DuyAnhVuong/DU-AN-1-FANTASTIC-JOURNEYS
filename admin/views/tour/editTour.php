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
            <form action="<?= BASE_URL_ADMIN . '?act=sua-tour' ?>" 
      method="POST" 
      enctype="multipart/form-data">

    <!-- BẮT BUỘC PHẢI CÓ -->
    <input type="hidden" name="id" value="<?= $tour['TourID'] ?>">

    <div class="form-group">
        <label>Tên tour</label>
        <input type="text" class="form-control" 
               name="TenTour" value="<?= $tour['TenTour'] ?>">
    </div>

    <div class="form-group">
        <label>Ảnh minh họa</label><br>
        <img src="uploads/<?= $tour['Image'] ?>" width="120">
        <input type="file" name="Image">
        <!-- Ảnh cũ -->
        <input type="hidden" name="oldImage" value="<?= $tour['Image'] ?>">
    </div>

    <div class="form-group">
        <label>Loại Tour</label>
        <select class="form-control" name="LoaiTourID">
            <option value="1" <?= $tour['LoaiTourID'] == 1 ? "selected" : "" ?>>Tour Trong Nước</option>
            <option value="2" <?= $tour['LoaiTourID'] == 2 ? "selected" : "" ?>>Tour Nước Ngoài</option>
            <option value="3" <?= $tour['LoaiTourID'] == 3 ? "selected" : "" ?>>Tour Yêu Cầu</option>
        </select>
    </div>

    <div class="form-group">
        <label>Mô tả</label>
        <input type="text" class="form-control" name="MoTa" value="<?= $tour['MoTa'] ?>">
    </div>

    <div class="form-group">
        <label>Ngày tạo</label>
        <input type="date" class="form-control" name="NgayTao" value="<?= $tour['NgayTao'] ?>">
    </div>

    <div class="form-group">
        <label>Giá</label>
        <input type="text" class="form-control" name="Gia" value="<?= $tour['Gia'] ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
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