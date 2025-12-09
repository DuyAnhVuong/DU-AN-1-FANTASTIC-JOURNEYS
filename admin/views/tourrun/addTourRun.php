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
                            <h3 class="card-title default_cursor_land">Thêm Tour run</h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=them-tourrun' ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="card-body default_cursor_land">


                                <div class="form-group">
                                    <label for="BookingID">BookingID</label>
                                    <select id="BookingID" name="BookingID" class="form-control custom-select">
                                        <?php foreach ($listBooking as $Booking): ?>
                                            <option value="<?= $Booking['BookingID'] ?>">
                                                <?= $Booking['BookingID'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="HDVID">Tên tour</label>
                                    <select id="HDVID" name="TourID" class="form-control custom-select">
                                        <?php foreach ($listTour as $Tour): ?>
                                            <option value="<?= $Tour['TourID'] ?>">
                                                <?= $Tour['TenTour'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="HDVID">Hướng dẫn viên</label>
                                    <select id="HDVID" name="HDVID" class="form-control custom-select">
                                        <?php foreach ($listHuongDanVien as $HuongDanVien): ?>
                                            <option value="<?= $HuongDanVien['HDVID'] ?>">
                                                <?= $HuongDanVien['HoTen'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>



                                <div class="form-group default_cursor_land col-12">
                                    <label>Ngày khởi hành thực tế</label>
                                    <input type="date" class="form-control" name="NgayKhoiHanhThucTe"
                                        placeholder="Nhập NgayKhoiHanhThucTe">
                                    <?php if (isset($_SESSION['error']['NgayKhoiHanhThucTe'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['NgayKhoiHanhThucTe'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group default_cursor_land col-12">
                                    <label>Ngày kết thúc</label>
                                    <input type="date" class="form-control" name="NgayKetThuc"
                                        placeholder="Nhập NgayKetThuc">
                                    <?php if (isset($_SESSION['error']['NgayKetThuc'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['NgayKetThuc'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group default_cursor_land col-12">
                                    <label>Điểm tập chung</label>
                                    <input type="text" class="form-control" name="DiemTapTrung"
                                        placeholder="Nhập DiemTapTrung">
                                    <?php if (isset($_SESSION['error']['DiemTapTrung'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['DiemTapTrung'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group default_cursor_land col-12">
                                    <label>Trạng thái vận hành</label>
                                    <input type="text" class="form-control" name="TrangThaiVanHanh"
                                        placeholder="Nhập TrangThaiVanHanh">
                                    <?php if (isset($_SESSION['error']['TrangThaiVanHanh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['TrangThaiVanHanh'] ?></p>
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