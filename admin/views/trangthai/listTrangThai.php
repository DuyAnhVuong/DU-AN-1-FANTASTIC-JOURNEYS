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
          <h1>Trạng thái booking</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=form-them-trang-thai' ?>">
                <button class="btn btn-success">Thêm trạng thái</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Trạng thái ID</th>
                    <th>Booking ID</th>
                    <th>Trạng thái booking</th>
                    <th>Thời gian cập nhật</th>
                    <th>Người cập nhật</th>
                    <th>Hành động</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($listTrangThai as $key => $trangThai): ?>
                    <tr>
                      <td><?= $trangThai['TrangThaiID'] ?></td>
                      <td><?= $trangThai['BookingID'] ?></td>
                      <td><?= $trangThai['TrangThai'] ?></td>
                      <td><?= $trangThai['ThoiGianCapNhat'] ?></td>
                      <td><?= $trangThai['TenDangNhap'] ?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN ?>?act=form-sua-trang-thai&id_trang_thai=<?= $trangThai['TrangThaiID'] ?>">
                          <button class="btn btn-warning">Sửa</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=xoa-trang-thai&id_trang_thai=' . $trangThai['TrangThaiID'] ?>"
                          onclick="return confirm('Bạn có đồng ý xóa hay không')">
                          <button class="btn btn-danger">Xóa</button>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>

                </tfoot>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->

</body>

</html>