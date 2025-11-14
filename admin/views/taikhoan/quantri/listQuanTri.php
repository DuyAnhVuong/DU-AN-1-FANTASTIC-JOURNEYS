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
            <h1>Quản lý tài khoản Admin</h1>
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
                <a href="<?=BASE_URL_ADMIN .'?act=form-them-quan-tri' ?>">
                  <button class="btn btn-success">Thêm tài khoản</button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listTaiKhoan as $key=>$quanTri):?>
                  <tr>
                   <td><?=$key+1 ?></td>
                   <td><?=$quanTri['TenDangNhap']?></td>
                   <td><?=$quanTri['MatKhauHash']?></td>
                   <td><?=$quanTri['Email']?></td>
                   <td><?=$quanTri['VaiTro']==1 ?'Admin':'HDV'?></td>
                  
                   <td>
                    <a href="<?=BASE_URL_ADMIN .'?act=form-sua-quan-tri&id='.$quanTri['TaiKhoanID'] ?>">
                      <button class="btn btn-warning">Sửa</button>
                    </a>
                    </a>
                   </td>
                  </tr>
                  <?php endforeach?>
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
