<?php
require './views/layout/header.php';
include './views/layout/navbar.php';
include './views/layout/sidebar.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách Yêu Cầu Đặc Biệt</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="<?= BASE_URL_ADMIN . '?act=form-them-yeu-cau' ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm Yêu Cầu Mới
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Yêu Cầu ID</th>
                    <th>Khách Hàng</th>
                    <th>Mã Booking</th>
                    <th>Loại Yêu Cầu</th>
                    <th>Chi Tiết</th>
                    <th>Thao Tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  if (!empty($listYeuCau)):
                    ?>
                    <?php foreach ($listYeuCau as $key => $yc): ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $yc['YeuCauID'] ?></td>
                        <td><?= $yc['HoTen'] ?? 'N/A' ?></td>
                        <td><?= $yc['BookingID'] ?? 'N/A' ?></td>
                        <td><?= $yc['LoaiYeuCau'] ?></td>
                        <td><?= $yc['ChiTiet'] ?></td>

                        <td>
                          <div class="btn-group">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-yeu-cau&id_yeucau=' . $yc['YeuCauID'] ?>">
                              <button class="btn btn-warning">Cập nhật</button>
                            </a>
                          </div>
                          <div class="btn-group">
                            <a href="<?= BASE_URL_ADMIN . '?act=xoa-yeu-cau&id=' . $yc['YeuCauID'] ?>"
                              onclick="return confirm('Bạn có đồng ý xóa hay không')">
                              <button class="btn btn-danger">Xóa</button>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="8" class="text-center">Không có yêu cầu đặc biệt nào.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include './views/layout/footer.php';
?>
<!-- <script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script> -->
</body>

</html>