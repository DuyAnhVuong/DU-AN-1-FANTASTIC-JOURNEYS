<?php require './views/layout/sidebar.php' ?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm TourRun Mới</title>
    <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 100%;
            height: 100%;
            min-height: 100%;
        }

        html {
            height: 100%;
        }

        .page-wrapper {
            width: 100%;
            height: 100%;
            padding: 40px 20px;
            overflow: auto;
        }

        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 32px 40px;
            color: #ffffff;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 24px;
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateX(-4px);
        }

        .form-title {
            font-size: 32px;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin: 8px 0 0 0;
        }

        .form-body {
            padding: 40px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-group-full {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            font-size: 15px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
        }

        .required-mark {
            color: #dc3545;
            margin-left: 4px;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #374151;
            background-color: #ffffff;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-helper {
            font-size: 13px;
            color: #6b7280;
            margin-top: 8px;
            line-height: 1.4;
        }

        /* Cần thêm style cho lỗi nếu có */
        .text-danger {
            color: #dc3545;
            font-size: 13px;
            margin-top: 8px;
        }


        .form-actions {
            display: flex;
            gap: 16px;
            padding-top: 32px;
            border-top: 2px solid #f3f4f6;
        }

        .action-btn {
            flex: 1;
            padding: 16px 32px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-save {
            background-color: #28a745;
            color: #ffffff;
        }

        .btn-save:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
        }

        .btn-cancel {
            background-color: #6b7280;
            color: #ffffff;
        }

        .btn-cancel:hover {
            background-color: #4b5563;
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(107, 114, 128, 0.4);
        }

        .info-box {
            background: linear-gradient(135deg, #e0e7ff 0%, #ede9fe 100%);
            border-left: 4px solid #667eea;
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 32px;
        }

        .info-box-title {
            font-weight: 600;
            color: #4c1d95;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .info-box-text {
            font-size: 13px;
            color: #5b21b6;
            line-height: 1.5;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                padding: 20px 16px;
            }

            .form-header {
                padding: 24px 24px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-subtitle {
                font-size: 14px;
            }

            .form-body {
                padding: 24px 24px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .form-group-full {
                grid-column: 1;
            }

            .form-actions {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
            }
        }
    </style>
    <?php
    // Giả định các biến PHP đã được định nghĩa ở các file include này hoặc ở controller
    // require './views/layout/header.php'; // Nếu bạn vẫn cần AdminLTE header
    ?>
</head>

<body>
    <?php
    // include './views/layout/navbar.php'; // Nếu bạn vẫn cần AdminLTE navbar
    // include './views/layout/sidebar.php'; // Nếu bạn vẫn cần AdminLTE sidebar
    ?>

    <div class="page-wrapper">
        <div class="form-container">
            <header class="form-header">
                <button type="button" class="back-button" onclick="window.history.back(); return false;">
                    <span>◀</span>
                    <span>Quay Lại</span>
                </button>
                <h1 class="form-title">
                    <span>➕</span>
                    <span>Thêm TourRun Mới</span>
                </h1>
                <p class="form-subtitle">Điền thông tin chi tiết để tạo tour run mới</p>
            </header>

            <div class="form-body">
                <div class="info-box">
                    <div class="info-box-title">
                        📌 Lưu ý quan trọng
                    </div>
                    <div class="info-box-text">
                        Vui lòng điền đầy đủ và chính xác các thông tin bên dưới. Các trường có dấu (*) là bắt buộc phải
                        nhập.
                    </div>
                </div>

                <form action="<?= BASE_URL_ADMIN . '?act=them-tourrun' ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-grid">

                        <div class="form-group">
                            <label for="BookingID" class="form-label"> Booking ID<span class="required-mark">*</span>
                            </label>
                            <select id="BookingID" name="BookingID" class="form-select" required>
                                <option value="">-- Chọn booking --</option>
                                <?php foreach ($listBooking as $Booking): ?>
                                    <option value="<?= $Booking['BookingID'] ?>">
                                        <?= $Booking['BookingID'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-helper">
                                Chọn booking đã được tạo trước đó
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TourID" class="form-label"> Tên Tour<span class="required-mark">*</span>
                            </label>
                            <select id="TourID" name="TourID" class="form-select" required>
                                <option value="">-- Chọn tour --</option>
                                <?php foreach ($listTour as $Tour): ?>
                                    <option value="<?= $Tour['TourID'] ?>">
                                        <?= $Tour['TenTour'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-helper">
                                Chọn tour sẽ được chạy
                            </div>
                        </div>

                        <div class="form-group form-group-full">
                            <label for="HDVID" class="form-label"> Hướng Dẫn Viên<span class="required-mark">*</span>
                            </label>
                            <select id="HDVID" name="HDVID" class="form-select" required>
                                <option value="">-- Chọn hướng dẫn viên --</option>
                                <?php foreach ($listHuongDanVien as $HuongDanVien): ?>
                                    <option value="<?= $HuongDanVien['HDVID'] ?>">
                                        <?= $HuongDanVien['HoTen'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-helper">
                                Chọn hướng dẫn viên phụ trách cho tour run này
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="NgayKhoiHanhThucTe" class="form-label"> Ngày Khởi Hành Thực Tế<span
                                    class="required-mark">*</span> </label>
                            <input type="date" id="NgayKhoiHanhThucTe" class="form-input" name="NgayKhoiHanhThucTe"
                                required>
                            <?php if (isset($_SESSION['error']['NgayKhoiHanhThucTe'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['NgayKhoiHanhThucTe'] ?></p>
                            <?php } ?>
                            <div class="form-helper">
                                Ngày khởi hành thực tế của tour
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="NgayKetThuc" class="form-label"> Ngày Kết Thúc<span
                                    class="required-mark">*</span> </label>
                            <input type="date" id="NgayKetThuc" class="form-input" name="NgayKetThuc" required>
                            <?php if (isset($_SESSION['error']['NgayKetThuc'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['NgayKetThuc'] ?></p>
                            <?php } ?>
                            <div class="form-helper">
                                Ngày dự kiến kết thúc tour
                            </div>
                        </div>

                        <div class="form-group form-group-full">
                            <label for="DiemTapTrung" class="form-label"> Điểm Tập Trung<span
                                    class="required-mark">*</span> </label>
                            <input type="text" id="DiemTapTrung" class="form-input" name="DiemTapTrung"
                                placeholder="VD: Công viên Thống Nhất, Hà Nội" required>
                            <?php if (isset($_SESSION['error']['DiemTapTrung'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['DiemTapTrung'] ?></p>
                            <?php } ?>
                            <div class="form-helper">
                                Nhập địa điểm tập trung cụ thể cho khách hàng
                            </div>
                        </div>

                        <div class="form-group form-group-full">
                            <label for="TrangThaiVanHanh" class="form-label"> Trạng Thái Vận Hành<span
                                    class="required-mark">*</span> </label>
                            <select id="TrangThaiVanHanh" name="TrangThaiVanHanh" class="form-select" required>
                                <option value="">-- Chọn trạng thái --</option>
                                <option value="Đã lên lịch">📅 Đã Lên Lịch</option>
                                <option value="Chờ xác nhận">⏱️ Chờ Xác Nhận</option>
                                <option value="Đang chạy">🔄 Đang Chạy</option>
                                <option value="Hoàn thành">✓ Hoàn Thành</option>
                                <option value="Đã hủy">✖️ Đã Hủy</option>
                            </select>
                            <?php if (isset($_SESSION['error']['TrangThaiVanHanh'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['TrangThaiVanHanh'] ?></p>
                            <?php } ?>
                            <div class="form-helper">
                                Chọn trạng thái hiện tại của tour run
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="action-btn btn-cancel"
                            onclick="window.history.back(); return false;">
                            <span>✖️</span>
                            <span>Hủy</span>
                        </button>
                        <button type="submit" class="action-btn btn-save">
                            <span>💾</span>
                            <span>Lưu TourRun</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    // footer
    // include './views/layout/footer.php'; // Nếu bạn vẫn cần AdminLTE footer
    // Xóa lỗi session sau khi đã hiển thị
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }
    ?>
</body>

</html>