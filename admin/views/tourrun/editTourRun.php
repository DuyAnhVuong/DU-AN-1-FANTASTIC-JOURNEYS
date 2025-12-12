<?php require './views/layout/sidebar.php' ?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa TourRun</title>
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
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tourrun-badge {
            display: inline-flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.25);
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            border: 2px solid rgba(255, 255, 255, 0.3);
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

        /* Style cho thông báo lỗi */
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

        .btn-update {
            background-color: #ffc107;
            color: #000000;
        }

        .btn-update:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 193, 7, 0.4);
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
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border-left: 4px solid #ffc107;
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 32px;
        }

        .info-box-title {
            font-weight: 600;
            color: #856404;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .info-box-text {
            font-size: 13px;
            color: #856404;
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
                flex-direction: column;
                align-items: flex-start;
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
    // Bỏ qua các require AdminLTE cũ
    // require './views/layout/header.php';
    // include './views/layout/navbar.php';
    // include './views/layout/sidebar.php';
    ?>
</head>

<body>
    <div class="page-wrapper">
        <div class="form-container">
            <header class="form-header">
                <button type="button" class="back-button" onclick="window.history.back(); return false;">
                    <span>◀</span>
                    <span>Quay Lại</span>
                </button>
                <h1 class="form-title">
                    <span>✏️</span>
                    <span>Sửa TourRun</span>
                </h1>
                <p class="form-subtitle">
                    <span>Chỉnh sửa thông tin tour run</span>
                    <span class="tourrun-badge">🎫 <?= $listTourRun['TourRunID'] ?></span>
                </p>
            </header>

            <div class="form-body">
                <div class="info-box">
                    <div class="info-box-title">
                        ⚠️ Lưu ý khi cập nhật
                    </div>
                    <div class="info-box-text">
                        Việc thay đổi thông tin tour run có thể ảnh hưởng đến booking và khách hàng. Vui lòng kiểm tra
                        kỹ trước khi lưu.
                    </div>
                </div>

                <form action="<?= BASE_URL_ADMIN . '?act=sua-tourrun' ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-grid">

                        <input type="hidden" name="TourRunID" value="<?= $listTourRun['TourRunID'] ?>">

                        <div class="form-group">
                            <label for="BookingID" class="form-label"> Booking ID<span class="required-mark">*</span>
                            </label>
                            <select id="BookingID" name="BookingID" class="form-select" required>
                                <option value="">-- Chọn booking --</option>
                                <?php foreach ($listBooking as $Booking): ?>
                                    <?php
                                    $selected = ($Booking['BookingID'] == $listTourRun['BookingID']) ? 'selected' : '';
                                    ?>
                                    <option value="<?= $Booking['BookingID'] ?>" <?= $selected ?>>
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
                                    <?php
                                    $selected = ($Tour['TourID'] == $listTourRun['TourID']) ? 'selected' : '';
                                    ?>
                                    <option value="<?= $Tour['TourID'] ?>" <?= $selected ?>>
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
                                    <?php
                                    $selected = ($HuongDanVien['HDVID'] == $listTourRun['HDVID']) ? 'selected' : '';
                                    ?>
                                    <option value="<?= $HuongDanVien['HDVID'] ?>" <?= $selected ?>>
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
                            <input type="datetime-local" id="NgayKhoiHanhThucTe" class="form-input"
                                name="NgayKhoiHanhThucTe"
                                value="<?= date('Y-m-d\TH:i', strtotime($listTourRun['NgayKhoiHanhThucTe'])) ?>"
                                required>
                            <?php if (isset($_SESSION['error']['NgayKhoiHanhThucTe'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['NgayKhoiHanhThucTe'] ?></p>
                            <?php } ?>
                            <div class="form-helper">
                                Ngày và giờ khởi hành thực tế của tour
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="NgayKetThuc" class="form-label"> Ngày Kết Thúc<span
                                    class="required-mark">*</span> </label>
                            <input type="datetime-local" id="NgayKetThuc" class="form-input" name="NgayKetThuc"
                                value="<?= date('Y-m-d\TH:i', strtotime($listTourRun['NgayKetThuc'])) ?>" required>
                            <?php if (isset($_SESSION['error']['NgayKetThuc'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['NgayKetThuc'] ?></p>
                            <?php } ?>
                            <div class="form-helper">
                                Ngày và giờ dự kiến kết thúc tour
                            </div>
                        </div>

                        <div class="form-group form-group-full">
                            <label for="DiemTapTrung" class="form-label"> Điểm Tập Trung<span
                                    class="required-mark">*</span> </label>
                            <input type="text" id="DiemTapTrung" class="form-input" name="DiemTapTrung"
                                placeholder="VD: Công viên Thống Nhất, Hà Nội"
                                value="<?= $listTourRun['DiemTapTrung'] ?>" required>
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
                                <?php
                                $statuses = [
                                    'Đã lên lịch' => '📅 Đã Lên Lịch',
                                    'Chờ xác nhận' => '⏱️ Chờ Xác Nhận',
                                    'Đang chạy' => '🔄 Đang Chạy',
                                    'Hoàn thành' => '✓ Hoàn Thành',
                                    'Đã hủy' => '✖️ Đã Hủy'
                                ];
                                foreach ($statuses as $value => $label) {
                                    $selected = ($value == $listTourRun['TrangThaiVanHanh']) ? 'selected' : '';
                                    echo "<option value=\"$value\" $selected>$label</option>";
                                }
                                ?>
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
                        <button type="submit" class="action-btn btn-update">
                            <span>💾</span>
                            <span>Cập Nhật TourRun</span>
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