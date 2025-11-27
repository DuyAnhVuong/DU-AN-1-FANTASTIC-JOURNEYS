<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Tạo Booking Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f4f6f8;
        }

        .card {
            border-radius: 12px;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <h3 class="mb-3">Tạo Booking Mới (Khách lẻ / Đoàn)</h3>
                        <form action="<?= BASE_URL_ADMIN . '?act=add-booking' ?>" method="POST">

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card p-3">
                        <div class="section-title">Thông tin khách hàng</div>
                        <input type="hidden" name="id" value="<?= $Tour['TourID'] ?>">
                        <label class="form-label">Tên khách</label>
                        <input type="text" class="form-control mb-2" name="TenNguoiDat" placeholder="Nhập Tên Người Đặt">
                        <?php if (isset($_SESSION['error']['TenNguoiDat'])) { ?>
                            <p class="text-danger"><?= $_SESSION['error']['TenNguoiDat'] ?></p>
                        <?php } ?>

                        <label class="form-label">Số lượng khách</label>
                        <input type="number" class="form-control mb-2" name="TongSoKhach" placeholder="Nhập số khách">
                        <?php if (isset($_SESSION['error']['TongSoKhach'])) { ?>
                            <p class="text-danger"><?= $_SESSION['error']['TongSoKhach'] ?></p>
                        <?php } ?>


                        <label class="form-label">Loại khách</label>
                        <select class="form-select mb-2" id="customerType" name="LoaiKhach">
                            <option value="0">Chọn loại khách</option>
                            <option value="1">Khách lẻ</option>
                            <option value="2">Khách đoàn</option>
                        </select>

                        <label class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control mb-2" name="SDT" placeholder="Nhập số điện thoại">
                        <?php if (isset($_SESSION['error']['SDT'])) { ?>
                            <p class="text-danger"><?= $_SESSION['error']['SDT'] ?></p>
                        <?php } ?>

                        <label class="form-label">Email</label>
                        <input type="email" class="form-control mb-2" name="Email" placeholder="Nhập email">
                        <?php if (isset($_SESSION['error']['Email'])) { ?>
                            <p class="text-danger"><?= $_SESSION['error']['Email'] ?></p>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card p-3 mb-3">
                        <div class="section-title">Chọn tour</div>

                        <div class="row g-2">
                            <div class="col-12 mb-3">
                                <label for="TourID">Tên tour</label>
                                <select id="TourID" name="TourID" class="form-control custom-select">
                                    <?php foreach ($listTour as $Tour): ?>
                                        <option <?= $Tour['TourID'] == $listBooking['TourID'] ? 'selected' : '' ?>value="<?= $Tour['TourID'] ?>">
                                            <?= $Tour['TenTour'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        <div class="row g-2">
                            <div class="col-12 mb-3">
                                <label for="NCC_TourID">Tên Nhà cung cấp</label>
                                <select id="NCC_TourID" name="NCC_TourID" class="form-control custom-select">
                                    <?php foreach ($listNCC as $NCC): ?>
                                        <option <?= $NCC['NCC_TourID'] == $listBooking['NCC_TourID'] ? 'selected' : '' ?>value="<?= $NCC['NCC_TourID'] ?>">
                                            <?= $NCC['TenNCC'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <label class="form-label">Ngày khởi hành dự kiến</label>
                                <input type="date" class="form-control"  name="NgayKhoiHanhDuKien" />
                                <?php if (isset($_SESSION['error']['NgayKhoiHanhDuKien'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['NgayKhoiHanhDuKien'] ?></p>
                                <?php } ?>
                            </div>

                          

                            <div class="col-md-3">
                                <label class="form-label">Ngày về</label>
                                <input type="date" class="form-control" name="NgayVe" />
                                <?php if (isset($_SESSION['error']['NgayVe'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['NgayVe'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="section-title">Thông tin hệ thống</div>
                        <div id="systemCheck" class="text-muted small">
                            Hệ thống đang kiểm tra chỗ trống...
                        </div>
                    </div>
                </div>

                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-success w-100">Xác nhận Booking</button>
                </div>
            </div>
             </form>
              </div> 
              <script>
        // Demo: tự động kiểm tra chỗ trống
        setTimeout(() => {
            document.getElementById("systemCheck").innerHTML =
                '<span class="text-success">✔ Chỗ trống: Còn nhận khách</span>';
        }, 1200);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>