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
              <h3 class="card-title default_cursor_land">Sửa khách hàng Tour</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=sua-khach-hang' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body default_cursor_land">
                <div class="form-group default_cursor_land">
                   <input type="hidden" name="DSSK_ID" value="<?= $khachHang['DSSK_ID'] ?>">
                  <label>Tên khách hàng</label>
                  <input type="text" class="form-control" name="TenKH" placeholder="Nhập tên khách hàng" value="<?= $khachHang['TenKH'] ?>">
                  <?php if (isset($errors['TenKH'])) { ?>
                    <p class="text-danger"><?= $errors['TenKH'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group default_cursor_land">
                  <label>Trạng thái cập nhập</label value="<?= $khachHang['CheckInStatus'] ?>">
                  <select name="CheckInStatus" id="">
                    
                    <option value="0">Nhập trạng thái cập nhập</option>
                    <option value="1" <?= $khachHang['CheckInStatus'] == 1 ? 'selected' : '' ?>>Chưa đến</option>
                    <option value="2" <?= $khachHang['CheckInStatus'] == 2 ? 'selected' : '' ?>>Đã đến</option>
                    <option value="3" <?= $khachHang['CheckInStatus'] == 3 ? 'selected' : '' ?>>Vắng mặt</option>
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
<<<<<<< HEAD
=======

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
            <div class="card card-primary">
              <div class="card-header default_cursor_land">
                <h3 class="card-title default_cursor_land">Sửa mục sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=BASE_URL_ADMIN .'?act=sua-danh-muc' ?>" method="POST">
                <input type="text"name="id" VALUE="<?= $danhMuc['id']?>" hidden>
                <div class="card-body default_cursor_land">
                  <div class="form-group default_cursor_land">
                    <label >Tên danh mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc" value="<?= $danhMuc['ten_danh_muc']?>" placeholder="Nhập tên danh mục">
                    <?php if(isset($errors['ten_danh_muc'])) { ?>
                        <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                   <?php }?>
                  </div>
                  <div class="form-group default_cursor_land">
                    <label >Mô tả</label>
                    <textarea name="mo_ta" id=""class="form-control" placeholder="Nhập mô tả"><?= $danhMuc['ten_danh_muc']?></textarea>
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
>>>>>>> 1f46222933dd6afcbeb4e4023b1f412f3b132254
