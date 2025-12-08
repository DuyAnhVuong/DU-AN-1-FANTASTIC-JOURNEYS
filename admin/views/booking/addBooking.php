<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Booking</title>
    <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100%;
            padding: 40px 20px;
        }

        * {
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 3px solid #667eea;
        }

        .form-title {
            font-size: 32px;
            font-weight: 700;
            color: #2d3748;
            margin: 0 0 10px 0;
        }

        .form-subtitle {
            font-size: 16px;
            color: #718096;
            margin: 0;
        }

        .form-section {
            margin-bottom: 35px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #2d3748;
            margin: 0 0 20px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        /* Cần điều chỉnh để hỗ trợ các hàng có 3 hoặc 4 cột */
        .form-row.cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }
        .form-row.cols-4 {
            grid-template-columns: repeat(4, 1fr);
        }


        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 12px 16px;
            font-size: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            transition: all 0.3s ease;
            background: #f7fafc;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #667eea;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .checkbox-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            background: #f7fafc;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkbox-item:hover {
            background: #e2e8f0;
        }

        .checkbox-item input[type="radio"] { /* Đổi từ checkbox sang radio */
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .checkbox-item label {
            font-size: 14px;
            color: #4a5568;
            font-weight: 500;
            cursor: pointer;
        }

        .required {
            color: #e53e3e;
            margin-left: 4px;
        }

        .helper-text {
            font-size: 13px;
            color: #718096;
            margin-top: 6px;
            font-style: italic;
        }
        
        .error-message {
            font-size: 13px;
            color: #e53e3e;
            margin-top: 6px;
            font-weight: 600;
        }


        .submit-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%); /* Đổi màu nút thành xanh lá */
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .submit-button.back {
            background: #4a5568;
        }

        .submit-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(72, 187, 120, 0.4);
        }
        .submit-button.back:hover {
            box-shadow: 0 10px 25px rgba(74, 85, 104, 0.4);
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
            .form-row.cols-3,
            .form-row.cols-4 {
                grid-template-columns: 1fr;
            }

            .checkbox-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <main class="container">
        <header class="form-header">
            <h1 class="form-title">📝 Tạo Booking Mới</h1>
            <p class="form-subtitle">Điền thông tin để tạo booking tour du lịch</p>
        </header>

        <form action="<?= BASE_URL_ADMIN . '?act=add-booking' ?>" method="POST">
            <section class="form-section">
                <h2 class="section-title">👤 Thông Tin Khách Hàng</h2>
                <input type="hidden" name="id" value="<?= $Tour['TourID'] ?>">

                <div class="form-group">
                    <label for="customerName" class="form-label">Tên Khách Hàng<span class="required">*</span></label>
                    <input type="text" id="customerName" class="form-input" name="TenNguoiDat" placeholder="Nhập họ và tên khách hàng" required>
                    <?php if (isset($_SESSION['error']['TenNguoiDat'])) { ?>
                        <p class="error-message"><?= $_SESSION['error']['TenNguoiDat'] ?></p>
                    <?php } ?>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="phone" class="form-label">Số Điện Thoại<span class="required">*</span></label>
                        <input type="tel" id="phone" class="form-input" name="SDT" placeholder="0912345678" required>
                        <?php if (isset($_SESSION['error']['SDT'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['SDT'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email<span class="required">*</span></label>
                        <input type="email" id="email" class="form-input" name="Email" placeholder="email@example.com" required>
                        <?php if (isset($_SESSION['error']['Email'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['Email'] ?></p>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="guestCount" class="form-label">Số Lượng Khách<span class="required">*</span></label>
                        <input type="number" id="guestCount" class="form-input" name="TongSoKhach" placeholder="Nhập tổng số khách" min="1" required>
                        <p class="helper-text">👥 Tổng số khách tham gia</p>
                        <?php if (isset($_SESSION['error']['TongSoKhach'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['TongSoKhach'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Loại Khách<span class="required">*</span></label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="radio" id="individual" name="LoaiKhach" value="1" required>
                                <label for="individual">👤 Khách lẻ</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="radio" id="group" name="LoaiKhach" value="2">
                                <label for="group">👥 Khách đoàn</label>
                            </div>
                        </div>
                        <p class="helper-text">✔️ Chọn loại khách (Lưu ý: Select box trong layout cũ đã được chuyển thành radio)</p>
                    </div>
                </div>
            </section>
            
            <section class="form-section">
                <h2 class="section-title">🎫 Thông Tin Tour</h2>
                
                <div class="form-group">
                    <label for="TourID" class="form-label">Tên Tour<span class="required">*</span></label>
                    <select id="TourID" name="TourID" class="form-select" required>
                        <option value="">-- Chọn tour --</option>
                        <?php foreach ($listTour as $Tour): ?>
                            <option value="<?= $Tour['TourID'] ?>">
                                <?= $Tour['TenTour'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <p class="helper-text">🏝️ Chọn tour mà khách hàng muốn đặt</p>
                </div>

                <div class="form-row cols-3">
                    <div class="form-group">
                        <label for="NgayKhoiHanhDuKien" class="form-label">Ngày Khởi Hành Dự Kiến<span class="required">*</span></label>
                        <input type="date" id="NgayKhoiHanhDuKien" class="form-input" name="NgayKhoiHanhDuKien" required>
                        <?php if (isset($_SESSION['error']['NgayKhoiHanhDuKien'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['NgayKhoiHanhDuKien'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="NgayVe" class="form-label">Ngày Về<span class="required">*</span></label>
                        <input type="date" id="NgayVe" class="form-input" name="NgayVe" required>
                        <?php if (isset($_SESSION['error']['NgayVe'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['NgayVe'] ?></p>
                        <?php } ?>
                    </div>
                     <div class="form-group">
                        <label for="id_trang_thai" class="form-label">Trạng Thái<span class="required">*</span></label>
                        <select id="id_trang_thai" name="id_trang_thai" class="form-select" required>
                            <option value="">-- Chọn trạng thái --</option>
                            <?php foreach ($listTrangThai as $status): ?>
                                <option value="<?= $status['id_trang_thai'] ?>">
                                    <?= $status['status'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="helper-text">⏳ Trạng thái ban đầu của Booking</p>
                    </div>
                </div>
            </section>

            <section class="form-section">
                <h2 class="section-title">🏢 Thông Tin Nhà Cung Cấp</h2>
                
                <div class="form-row cols-3">
                    <div class="form-group">
                        <label for="id_ks" class="form-label">NCC Khách Sạn</label>
                        <select id="id_ks" name="id_ks" class="form-select">
                            <option value="">-- Chọn Khách sạn --</option>
                            <?php foreach ($NCCKS as $nccks): ?>
                                <option value="<?= $nccks['id_ks'] ?>">
                                    <?= $nccks['NameKS'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="helper-text">🏨 Khách sạn cho tour (tùy chọn)</p>
                    </div>
                    <div class="form-group">
                        <label for="id_dichvu" class="form-label">NCC Dịch Vụ</label>
                        <select id="id_dichvu" name="id_dichvu" class="form-select">
                            <option value="">-- Chọn Dịch Vụ --</option>
                            <?php foreach ($NCCDV as $nccDV): ?>
                                <option value="<?= $nccDV['id_dichvu'] ?>">
                                    <?= $nccDV['Name_DV'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="helper-text">🎯 Công ty cung cấp dịch vụ (tùy chọn)</p>
                    </div>
                    <div class="form-group">
                        <label for="id_pt" class="form-label">NCC Phương Tiện</label>
                        <select id="id_pt" name="id_pt" class="form-select">
                            <option value="">-- Chọn Phương Tiện --</option>
                            <?php foreach ($NCCPT as $nccpt): ?>
                                <option value="<?= $nccpt['id_pt'] ?>">
                                    <?= $nccpt['Name_PhuongTien'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="helper-text">🚗 Phương tiện di chuyển (tùy chọn)</p>
                    </div>
                </div>
            </section>
            
            <div class="form-section">
                <h2 class="section-title">ℹ️ Thông Tin Hệ Thống</h2>
                 <div id="systemCheck" class="helper-text">
                    Hệ thống đang kiểm tra chỗ trống...
                </div>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" class="submit-button"> ✅ Tạo Booking </button>
                <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-booking' ?>" style="width: 100%;">
                    <button type="button" class="submit-button back"> 🔙 Quay Lại </button>
                </a>
            </div>
            
        </form>
    </main>
    <script>
        // Demo: tự động kiểm tra chỗ trống (dùng JS cũ)
        setTimeout(() => {
            document.getElementById("systemCheck").innerHTML =
                '<span style="color: #48bb78; font-weight: 600;">✔ Chỗ trống: Còn nhận khách</span>';
        }, 1200);
        
        // Loại bỏ script xử lý form submit mẫu bằng JS vì form dùng action PHP
    </script>
</body>
</html>