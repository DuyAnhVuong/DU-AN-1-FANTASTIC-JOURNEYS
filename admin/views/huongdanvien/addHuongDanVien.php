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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-dark">
            <div class="card-header default_cursor_land">
              <h3 class="card-title default_cursor_land">Thêm hướng dẫn viên</h3>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=them-huongdanvien' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body default_cursor_land">
                <div class="row g-2">
                  <div class="form-group">
                    <label for="TaiKhoanID">Tên đăng nhập</label>
                    <select id="TaiKhoanID" name="TaiKhoanID" class="form-control custom-select">
                      <?php foreach ($listTaiKhoan as $TaiKhoan): ?>
                        <option <?= ($TaiKhoan['TaiKhoanID'] == $listHuongDanVien['TaiKhoanID']) ? 'selected' : '' ?>
                          value="<?= $TaiKhoan['TaiKhoanID'] ?>">
                          <?= $TaiKhoan['TenDangNhap'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>

                  </div>

                  <div class="col-md-6 mb-2">
                    <label class="form-label">Họ tên</label>
                    <input type="text" class="form-control" name="HoTen" placeholder="Nhập Họ tên">
                    <?php if (isset($_SESSION['error']['HoTen'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['HoTen'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" name="NgaySinh" placeholder="Nhập Ngày sinh">
                    <?php if (isset($_SESSION['error']['NgaySinh'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['NgaySinh'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="SDT" placeholder="Nhập Số điện thoại">
                    <?php if (isset($_SESSION['error']['SDT'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['SDT'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="Email" placeholder="Nhập Email">
                    <?php if (isset($_SESSION['error']['Email'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['Email'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="form-label">Ảnh</label>
                    <input type="file" class="form-control" name="Avatar" placeholder="Thêm Avatar">
                    <?php if (isset($_SESSION['error']['Avatar'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['Avatar'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="form-label">Chứng chỉ</label>
                    <input type="text" class="form-control" name="ChungChi" placeholder="Nhập chứng chỉ">
                    <?php if (isset($_SESSION['error']['ChungChi'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['ChungChi'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="form-label">Kinh Ngiệm</label>
                    <input type="text" class="form-control" name="KinhNghiem" placeholder="Nhập kinh nghiệm">
                    <?php if (isset($_SESSION['error']['KinhNghiem'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['KinhNghiem'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="form-label">Ngôn ngữ</label>
                    <input type="text" class="form-control" name="NgonNgu" placeholder="Nhập Ngôn ngữ">
                    <?php if (isset($_SESSION['error']['NgonNgu'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['NgonNgu'] ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="form-label">Phân loại</label>
                    <input type="text" class="form-control" name="PhanLoai" placeholder="Nhập phân loại">
                    <?php if (isset($_SESSION['error']['PhanLoai'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['PhanLoai'] ?></p>
                    <?php } ?>
                  </div>


                  <div class="card-footer default_cursor_land">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
// Đảm bảo xóa session lỗi sau khi hiển thị (nếu bạn dùng session)
// Nếu bạn chỉ dùng biến cục bộ $errors trong Controller, thì không cần xóa session ở đây.
// if (isset($_SESSION['error'])) {
//     unset($_SESSION['error']);
// }
include './views/layout/footer.php';
?>
</body>

</html>