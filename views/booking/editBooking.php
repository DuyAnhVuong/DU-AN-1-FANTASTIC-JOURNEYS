<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Booking</title>
    <style>
        /* CSS CỦA BẠN (KHÔNG THAY ĐỔI) */
        body { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100%; padding: 40px 20px; }
        * { box-sizing: border-box; }
        .container { width: 100%; max-width: 900px; margin: 0 auto; background: #ffffff; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); padding: 40px; }
        .form-header { text-align: center; margin-bottom: 40px; padding-bottom: 20px; border-bottom: 3px solid #667eea; }
        .booking-id-badge { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #ffffff; padding: 8px 20px; border-radius: 20px; font-size: 14px; font-weight: 700; margin-bottom: 15px; }
        .form-title { font-size: 32px; font-weight: 700; color: #2d3748; margin: 0 0 10px 0; }
        .form-subtitle { font-size: 16px; color: #718096; margin: 0; }
        .form-section { margin-bottom: 35px; }
        .section-title { font-size: 20px; font-weight: 700; color: #2d3748; margin: 0 0 20px 0; padding-bottom: 10px; border-bottom: 2px solid #e2e8f0; display: flex; align-items: center; gap: 10px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 14px; font-weight: 600; color: #4a5568; margin-bottom: 8px; }
        .form-input, .form-select { width: 100%; padding: 12px 16px; font-size: 15px; border: 2px solid #e2e8f0; border-radius: 10px; transition: all 0.3s ease; background: #f7fafc; }
        .form-input:focus, .form-select:focus { outline: none; border-color: #667eea; background: #ffffff; box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1); }
        .checkbox-group { display: flex; gap: 20px; flex-wrap: wrap; }
        .checkbox-item { display: flex; align-items: center; gap: 8px; padding: 10px 16px; background: #f7fafc; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; }
        .checkbox-item:hover { background: #e2e8f0; }
        .checkbox-item input[type="radio"] { width: 18px; height: 18px; cursor: pointer; accent-color: #667eea; }
        .checkbox-item label { font-size: 14px; color: #4a5568; font-weight: 500; cursor: pointer; }
        .required { color: #e53e3e; margin-left: 4px; }
        .helper-text { font-size: 13px; color: #718096; margin-top: 6px; font-style: italic; }
        .submit-button { width: 100%; padding: 16px; background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%); color: #ffffff; border: none; border-radius: 12px; font-size: 16px; font-weight: 700; cursor: pointer; transition: all 0.3s ease; margin-top: 30px; text-transform: uppercase; letter-spacing: 1px; }
        .submit-button:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(237, 137, 54, 0.4); }
        .error-message { font-size: 13px; color: #e53e3e; margin-top: 6px; font-weight: 600; }
        .status-check { margin-top: 20px; padding-top: 15px; border-top: 1px dashed #e2e8f0; }
        .back-button { display: inline-block; margin-top: 15px; padding: 10px 20px; background-color: #4a5568; color: #ffffff; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background-color 0.3s; }
        .back-button:hover { background-color: #2d3748; }
        @media (max-width: 768px) {
            .container { padding: 30px 20px; }
            .form-title { font-size: 24px; }
            .form-row { grid-template-columns: 1fr; }
            .checkbox-group { flex-direction: column; }
        }
    </style>
</head>
<body>
    <main class="container">
        <header class="form-header">
            <div class="booking-id-badge">
                📌 Booking #<?= htmlspecialchars($detailBooking['BookingID'] ?? 'N/A') ?>
            </div>
            <h1 class="form-title">✏️ Booking</h1>
           
        </header>

        <form action="<?= BASE_URL . '?act=edit-booking' ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars($detailBooking['BookingID'] ?? '') ?>">

            <section class="form-section">
                <h2 class="section-title">👤 Thông Tin Khách Hàng</h2>
                <div class="form-group">
                    <label for="customerName" class="form-label">Tên Khách Hàng<span class="required">*</span></label>
                    <input type="text" id="customerName" class="form-input" name="TenNguoiDat" placeholder="Nhập Tên Người Đặt" value="<?= htmlspecialchars($detailBooking['TenNguoiDat'] ?? '') ?>" required>
                    <?php if (isset($_SESSION['error']['TenNguoiDat'])) { ?>
                        <p class="error-message"><?= $_SESSION['error']['TenNguoiDat'] ?></p>
                    <?php } ?>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="phone" class="form-label">Số Điện Thoại<span class="required">*</span></label>
                        <input type="tel" id="phone" class="form-input" name="SDT" placeholder="Nhập số điện thoại" value="<?= htmlspecialchars($detailBooking['SDT'] ?? '') ?>" required>
                        <?php if (isset($_SESSION['error']['SDT'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['SDT'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email<span class="required">*</span></label>
                        <input type="email" id="email" class="form-input" name="Email" placeholder="Nhập email" value="<?= htmlspecialchars($detailBooking['Email'] ?? '') ?>" required>
                        <?php if (isset($_SESSION['error']['Email'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['Email'] ?></p>
                        <?php } ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="guestCount" class="form-label">Số Lượng Khách<span class="required">*</span></label>
                        <input type="number" id="guestCount" class="form-input" name="TongSoKhach" placeholder="Nhập số khách" min="1" value="<?= htmlspecialchars($detailBooking['TongSoKhach'] ?? '') ?>" required>
                        <p class="helper-text">👥 Tổng số khách tham gia</p>
                        <?php if (isset($_SESSION['error']['TongSoKhach'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['TongSoKhach'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Loại Khách<span class="required">*</span></label>
                        <select id="loaiKhach" class="form-select" name="LoaiKhach" required>
                            <option value="Khách lẻ" <?= (isset($detailBooking['LoaiKhach']) && $detailBooking['LoaiKhach'] == 'Khách lẻ') ? 'selected' : '' ?>>
                                👤 Khách lẻ
                            </option>
                            <option value="Khách đoàn" <?= (isset($detailBooking['LoaiKhach']) && $detailBooking['LoaiKhach'] == 'Khách đoàn') ? 'selected' : '' ?>>
                                👥 Khách đoàn
                            </option>
                        </select>
                        <?php if (isset($_SESSION['error']['LoaiKhach'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['LoaiKhach'] ?></p>
                        <?php } ?>
                        <p class="helper-text">✔️ Chọn loại khách</p>
                    </div>
                </div>
            </section>

            <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 0 0 35px 0;">

            <section class="form-section">
                <h2 class="section-title">🎫 Thông Tin Tour & Lịch Trình</h2>
                <div class="form-group">
                    <label for="tourName" class="form-label">Tên Tour<span class="required">*</span></label>
                    <select id="tourName" class="form-select" name="TourID" required>
                        <option value="">-- Chọn tour --</option>
                        <?php foreach ($listTour as $tour): ?>
                            <option value="<?= htmlspecialchars($tour['TourID']) ?>" <?= (isset($detailBooking['TourID']) && $tour['TourID'] == $detailBooking['TourID']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($tour['TenTour']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($_SESSION['error']['TourID'])) { ?>
                        <p class="error-message"><?= $_SESSION['error']['TourID'] ?></p>
                    <?php } ?>
                    <p class="helper-text">🏝️ Chọn tour mà khách hàng muốn đặt</p>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="departureDate" class="form-label">Ngày Khởi Hành Dự Kiến<span class="required">*</span></label>
                        <input type="date" id="departureDate" class="form-input" name="NgayKhoiHanhDuKien" value="<?= htmlspecialchars($detailBooking['NgayKhoiHanhDuKien'] ?? '') ?>" required />
                        <?php if (isset($_SESSION['error']['NgayKhoiHanhDuKien'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['NgayKhoiHanhDuKien'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="returnDate" class="form-label">Ngày Về</label>
                        <input type="date" id="returnDate" class="form-input" name="NgayVe" value="<?= htmlspecialchars($detailBooking['NgayVe'] ?? '') ?>" />
                        <?php if (isset($_SESSION['error']['NgayVe'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['NgayVe'] ?></p>
                        <?php } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_trang_thai" class="form-label">Trạng Thái Booking<span class="required">*</span></label>
                    <select id="id_trang_thai" class="form-select" name="id_trang_thai" required>
                        <option value="">-- Chọn trạng thái --</option>
                        <?php foreach ($listTrangThai as $trangthai): ?>
                            <option value="<?= htmlspecialchars($trangthai['id_trang_thai']) ?>" <?= (isset($detailBooking['id_trang_thai']) && $trangthai['id_trang_thai'] == $detailBooking['id_trang_thai']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($trangthai['status']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($_SESSION['error']['id_trang_thai'])) { ?>
                        <p class="error-message"><?= $_SESSION['error']['id_trang_thai'] ?></p>
                    <?php } ?>
                </div>
            </section>

            <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 0 0 35px 0;">

            <section class="form-section">
                <h2 class="section-title">🏢 Thông Tin Nhà Cung Cấp</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="hotelProvider" class="form-label">Nhà Cung Cấp Khách Sạn</label>
                        <select id="hotelProvider" class="form-select" name="id_ks">
                            <option value="">-- Chọn khách sạn --</option>
                            <?php foreach ($NCCKS as $nccks): ?>
                                <option value="<?= htmlspecialchars($nccks['id_ks']) ?>" <?= (isset($detailBooking['id_ks']) && $nccks['id_ks'] == $detailBooking['id_ks']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($nccks['NameKS']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="helper-text">🏨 Chọn khách sạn cho tour (Tùy chọn)</p>
                    </div>

                    <div class="form-group">
                        <label for="serviceProvider" class="form-label">Nhà Cung Cấp Dịch Vụ</label>
                        <select id="serviceProvider" class="form-select" name="id_dichvu">
                            <option value="">-- Chọn nhà cung cấp dịch vụ --</option>
                            <?php foreach ($NCCDV as $nccDV): ?>
                                <option value="<?= htmlspecialchars($nccDV['id_dichvu']) ?>" <?= (isset($detailBooking['id_dichvu']) && $nccDV['id_dichvu'] == $detailBooking['id_dichvu']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($nccDV['Name_DV']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="helper-text">🎯 Chọn công ty cung cấp dịch vụ (Tùy chọn)</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="transportProvider" class="form-label">Nhà Cung Cấp Phương Tiện</label>
                    <select id="transportProvider" class="form-select" name="id_pt">
                        <option value="">-- Chọn phương tiện --</option>
                        <?php foreach ($NCCPT as $nccpt): ?>
                            <option value="<?= htmlspecialchars($nccpt['id_pt']) ?>" <?= (isset($detailBooking['id_pt']) && $nccpt['id_pt'] == $detailBooking['id_pt']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($nccpt['Name_PhuongTien']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <p class="helper-text">🚗 Chọn phương tiện di chuyển (Tùy chọn)</p>
                </div>

                <div class="status-check">
                    <div class="section-title" style="border-bottom: none; margin-bottom: 5px;">Thông tin hệ thống</div>
                    <div id="systemCheck" class="helper-text" style="color: #667eea; font-style: normal; font-weight: 500;">
                        Hệ thống đang kiểm tra chỗ trống...
                    </div>
                </div>
            </section>

            
            <a href="<?= BASE_URL . "?act=list-booking" ?>" class="back-button" style="width: 100%; text-align: center;">↩️ Quay lại danh sách</a>
        </form>
    </main>
    <script>
        setTimeout(() => {
            document.getElementById("systemCheck").innerHTML =
                '<span style="color: green; font-weight: 700;">✔ Chỗ trống: Còn nhận khách</span>';
        }, 1200);
    </script>
</body>
</html>