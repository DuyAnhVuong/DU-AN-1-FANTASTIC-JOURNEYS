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
                                        <th>Tên tour</th>
                                        <th>Ảnh tour</th>
                                        <th>Loại tour</th>
                                        <th>Mô tả</th>
                                        <th>Ngày tạo</th>
                                        <th>Giá</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <a href="<?= BASE_URL_ADMIN . '?act=form-tour' ?>">
                                        <button class="btn btn-primary">Thêm</button>
                                    </a>
                                    <?php foreach ($listTour as $key => $tourr): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $tourr['TenTour'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $tourr['Image'] ?>"
                                                    style="width:150px; height: 100px;" alt="">
                                            </td>

                                            <td><?= $tourr['LoaiTourID'] ?></td>
                                            <td class="mota"><?= $tourr['MoTa'] ?></td>
                                            <td><?= $tourr['NgayTao'] ?></td>
                                            <td><?= $tourr['Gia'] ?></td>


                                            <td>
                                                <div class=" btn-group">

                                                    <a
                                                        href="<?= BASE_URL_ADMIN . '?act=form-sua-tour&id=' . $tourr['TourID'] ?>">
                                                        <button class="btn btn-warning">Sửa</button>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=xoa-tour&id=' . $tourr['TourID'] ?>"
                                                        onclick="return confirm('Bạn có đồng ý xóa hay không')">
                                                        <button class="btn btn-danger">Xóa</button>
                                                    </a>

                                                    <a href="">
                                                        <button class="btn btn-primary">Chi tiết</button>
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
<style>
    .mota {
        /* Đặt chiều rộng cố định */
        width: 550px;
        /* HOẶC đặt chiều rộng tối đa */
        max-width: 550px;
        /* Giúp ẩn nội dung thừa, nhưng nội dung dài sẽ bị cắt */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

</html>