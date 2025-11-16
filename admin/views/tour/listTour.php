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
                    <h1>Quản lý Tour</h1>
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>TourID </th>
                                        <th>TenTour</th>
                                        <th>Image</th>
                                        <th>LoaiTourID</th>
                                        <th>MoTa</th>
                                        <th>NgayTao</th>
                                        <th>Gia</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listTour as $key => $tourr): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $tourr['TenTour'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $image['hinh_anh'] ?>" style="width:100px" alt=""
                                                    onerror="this.onerror=null; this.src='https://azpet.com.vn/wp-content/uploads/2024/11/z6015559978898_aaaa70a3bca6d9869da9a49f1deb9567-1536x1536.jpg'">
                                            </td>
                                            <td><?= $tourr['LoaiTourID'] ?></td>
                                            <td><?= $tourr['MoTa'] ?></td>
                                            <td><?= $tourr['NgayTao'] ?></td>
                                            <td><?= $tourr['Gia'] ?></td>


                                            <td>
                                                <div class="btn-group">
                                                    <a
                                                        href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                                        <button class="btn btn-primary">Thêm</button>
                                                    </a>
                                                    <a
                                                        href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                                        <button class="btn btn-warning">Sửa</button>
                                                    </a>
                                                    <a
                                                        href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                                        <button class="btn btn-primary">Xóa</button>
                                                    </a>

                                                    <a
                                                        href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                                        <button class="btn btn-warning">Chi tiết</button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>

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