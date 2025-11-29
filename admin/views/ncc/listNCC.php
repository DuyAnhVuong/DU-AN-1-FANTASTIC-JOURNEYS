
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
          <h1>Nhà cung cấp Tour</h1>
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
              <a href="<?= BASE_URL_ADMIN . '?act=form-them-ncc' ?>">
                <button class="btn btn-success">Thêm nhà cung cấp</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NCC_TourID </th>
                    <th>Tên Tour </th>
                    <th>LoaiDichVu</th>
                    <th>TenNCC</th>
                    <th>ThongTinLienHe</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listNCC as $key => $ncc): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $ncc['TenTour'] ?></td>
                      <td><?= $ncc['LoaiDichVu'] ?></td>
                      <td><?= $ncc['TenNCC'] ?></td>
                      <td><?= $ncc['ThongTinLienHe'] ?></td>



                      <td>
                        <div class="btn-group">



                          <a href="<?= BASE_URL_ADMIN . '?act=form-sua-ncc&id-ncc=' . $ncc['NCC_TourID'] ?>">
                            <button class="btn btn-warning">Sửa</button>
                          </a>
                          <a href="<?= BASE_URL_ADMIN . '?act=xoa-ncc&id_ncc=' . $ncc['NCC_TourID'] ?>"
                          onclick="return confirm('Bạn có đồng ý xóa hay không')">
                          <button class="btn btn-danger">Xóa</button>
                        </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>

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
