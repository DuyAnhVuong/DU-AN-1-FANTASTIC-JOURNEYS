    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin - Tạo Booking Mới</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

        <style>
            /* CSS CŨ GIỮ NGUYÊN */
            body {
                background: #f4f6f8;
                /* BỎ padding-top vì menu không còn cố định */
            }

            .card {
                border-radius: 12px;
            }

            .section-title {
                font-weight: 600;
                margin-bottom: 8px;
                font-size: 1.15rem;
                color: #2c3e50;
            }

            /* --------------------------------- */
            /* CSS CHO MENU MỚI - Tối Giản/Thanh Lịch */
            /* --------------------------------- */
            .main-menu-container {
                /* LOẠI BỎ position: fixed và top: 0 */
                background-color: #ffffff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
                border-bottom: 1px solid #eee;
                width: 100%;
                margin-bottom: 20px;
                /* Thêm khoảng cách dưới menu */
            }

            .main-menu-container ul {
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                height: 50px;
                /* Chiều cao thanh menu thấp hơn một chút */
            }

            .main-menu-container li {
                margin: 0 5px;
            }

            .main-menu-container a {
                text-decoration: none;
                color: #555555;
                /* Màu chữ xám hơn */
                display: block;
                padding: 15px 15px;
                font-size: 14px;
                font-weight: 500;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                transition: all 0.3s ease;
                border-bottom: 3px solid transparent;
            }

            .main-menu-container a:hover {
                color: #000000;
                background-color: #f8f9fa;
                border-bottom: 3px solid #007bff;
            }

            /* Bỏ định kiểu logo-text vì menu không còn ở đầu trang */
            /* .logo-text { ... } */
        </style>
    </head>

    <body>

        <div class="container py-4">
            <h3 class="mb-3">Sửa Booking Mới (Khách lẻ / Đoàn)</h3>

            <div class="main-menu-container">
                <div class="container d-flex align-items-center px-0">
                    <ul class="d-flex mb-0">
                        <li><a href="#trangchu">Booking</a></li>
                        <li><a href="#booking" style="border-bottom: 3px solid #007bff;">Tạo Booking </a></li>
                        <li><a href="#danhsach">Danh sách</a></li>
                        <li><a href="#thongke">Thống kê</a></li>
                    </ul>
                </div>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=edit-booking' ?>" method="POST" enctype="multipart/form-data">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="card p-3">
                            <div class="section-title">Thông tin khách hàng</div>
                            <input type="hidden" name="id" value="<?= $detailBooking['BookingID'] ?>">
                            <label class="form-label">Tên khách</label>
                            <input type="text" class="form-control mb-2" name="TenNguoiDat" placeholder="Nhập Tên Người Đặt"
                                value="<?= $detailBooking['TenNguoiDat'] ?>" >
                            <?php if (isset($_SESSION['error']['TenNguoiDat'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['TenNguoiDat'] ?></p>
                            <?php } ?>

                            <label class="form-label">Số lượng khách</label>
                            <input type="number" class="form-control mb-2" name="TongSoKhach" placeholder="Nhập số khách"
                                value="<?= $detailBooking['TongSoKhach'] ?>" >
                            <?php if (isset($_SESSION['error']['TongSoKhach'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['TongSoKhach'] ?></p>
                            <?php } ?>


                            <label class="form-label">Loại khách</label>
                            <select class="form-select mb-2" id="customerType" name="LoaiKhach"
                                value="<?= $detailBooking['LoaiKhach'] ?>" >
                                <option value="<?= $detailBooking['LoaiKhach'] ?>"><?= $detailBooking['LoaiKhach'] ?></option>

                            </select>




                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control mb-2" name="SDT" placeholder="Nhập số điện thoại"
                                value="<?= $detailBooking['SDT'] ?>" >
                            <?php if (isset($_SESSION['error']['SDT'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['SDT'] ?></p>
                            <?php } ?>

                            <label class="form-label">Email</label>
                            <input type="email" class="form-control mb-2" name="Email" placeholder="Nhập email"
                                value="<?= $detailBooking['Email'] ?>" >
                            <?php if (isset($_SESSION['error']['Email'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['Email'] ?></p>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card p-3 mb-3">
                            <div class="section-title">
                                Chọn tour
                            </div>

                            <div class="row g-2">
                                <div class="col-12 mb-3">
                                    <label for="TourID">Tên tour</label>
                                    <select name="TourID" id="" class="form-select">
                                        <?php foreach ($listTour as $tour): ?>
                                            <option value="<?= $tour['TourID'] ?>" <?= $tour['TourID'] == $detailBooking['TourID'] ? 'selected' : '' ?>>
                                                <?= $tour['TenTour'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                
                                </div>


                                    <div class="col-md-3">
                                        <label class="form-label">Ngày khởi hành dự kiến</label>
                                        <input type="date" class="form-control" name="NgayKhoiHanhDuKien"
                                            value="<?= $detailBooking['NgayKhoiHanhDuKien'] ?>"  />
                                        <?php if (isset($_SESSION['error']['NgayKhoiHanhDuKien'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['NgayKhoiHanhDuKien'] ?></p>
                                        <?php } ?>
                                    </div>



                                    <div class="col-md-3">
                                        <label class="form-label">Ngày về</label>
                                        <input type="date" class="form-control" name="NgayVe" value="<?= $detailBooking['NgayVe'] ?>"
                                            />
                                        <?php if (isset($_SESSION['error']['NgayVe'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['NgayVe'] ?></p>
                                        <?php } ?>
                                    </div>
                                </div>



                                <div class="col-md-4">
                                <label for="id_ks" class="form-label">NCC Khách sạn</label>
                                <select id="id_ks" name="id_ks" class="form-select">
                                    <?php foreach ($NCCKS as $nccks): ?>
                                        <option value="<?= $nccks['id_ks'] ?>">
                                            <?= $nccks['NameKS'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="id_dichvu" class="form-label">NCC Dịch vụ</label>
                                <select id="id_dichvu" name="id_dichvu" class="form-select">
                                    <?php foreach ($NCCDV as $nccDV): ?>
                                        <option value="<?= $nccDV['id_dichvu'] ?>">
                                            <?= $nccDV['Name_DV'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label for="id_pt" class="form-label">NCC Phương tiện</label>
                                <select id="id_pt" name="id_pt" class="form-select">
                                    <?php foreach ($NCCPT as $nccpt): ?>
                                        <option value="<?= $nccpt['id_pt'] ?>">
                                            <?= $nccpt['Name_PhuongTien'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="col-md-4">
                                <label for="id_trang_thai" class="form-label">NCC Phương tiện</label>
                                <select id="id_trang_thai" name="id_trang_thai" class="form-select">
                                    <?php foreach ($listTrangThai as $trangthai): ?>
                                        <option value="<?= $trangthai['id_trang_thai'] ?>" <?= $trangthai['id_trang_thai'] == $detailBooking['id_trang_thai'] ? 'selected' : '' ?>>
                                            <?= $trangthai['status'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                                <!-- <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-lich-trinh&id=' . $detailBooking['TourID'] ?>">
                                    <button class="btn btn-primary">Chi tiết</button>
                                </a> -->
                            </div>

                            <div class="mt-3">
                                <div class="section-title">Thông tin hệ thống</div>
                                <div id="systemCheck" class="text-muted small">
                                    Hệ thống đang kiểm tra chỗ trống...
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 d-flex gap-2">
                            
                                <button type="submit" class="btn btn-dark">Sửa booking</button>
                            
                        </div>
                        <div class="mt-3 d-flex gap-2">
                            <a href="<?= BASE_URL_ADMIN . "?act=list-booking" ?>">
                                <button class="btn btn-dark">Quay lại</button>
                            </a>
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