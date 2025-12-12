<?php
// Kiểm tra và khởi tạo session nếu chưa có (cần thiết cho $_SESSION)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Giả định biến $listXemKhachHang và BASE_URL_ADMIN đã được định nghĩa

// Hàm helper để lấy giá trị từ POST hoặc dữ liệu cũ
function get_value($field, $data)
{
    // Ưu tiên giá trị từ POST (nếu submit thất bại)
    if (isset($_POST[$field])) {
        return htmlspecialchars($_POST[$field]);
    }
    // Nếu không, lấy giá trị cũ từ database
    if (isset($data[$field])) {
        return htmlspecialchars($data[$field]);
    }
    return '';
}

// Kiểm tra nếu biến $listXemKhachHang không tồn tại (chưa lấy được data khách hàng)
if (!isset($listXemKhachHang) || empty($listXemKhachHang)) {
    // Bạn nên xử lý trường hợp này, ví dụ: redirect hoặc hiển thị lỗi
    // echo "Không tìm thấy thông tin khách hàng để sửa.";
    // exit;
}

// Lấy giá trị giới tính đã chọn
$gioi_tinh_value = get_value('Gioi_Tinh', $listXemKhachHang);
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Khách Hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* CSS CƠ BẢN VÀ RESPONSIVE */
        /* Tông màu chủ đạo mới: Tím (#6a11cb) và Xanh (#2575fc) */
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            height: 100%;
            width: 100%;
        }

        html {
            height: 100%;
            width: 100%;
        }

        * {
            box-sizing: border-box;
        }

        .page-wrapper {
            min-height: 100vh;
            /* Tông màu TÍM-XANH MỚI */
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            padding: 40px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
            padding: 40px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .form-icon {
            width: 60px;
            height: 60px;
            /* Tông màu TÍM-XANH MỚI */
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 28px;
            color: #ffffff;
        }

        .form-title {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0 0 8px 0;
        }

        .form-subtitle {
            font-size: 15px;
            color: #6b7280;
            margin: 0;
        }

        .form-main {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .required-mark {
            color: #ef4444;
        }

        /* Style chung cho INPUT và SELECT */
        .form-input,
        .form-select {
            padding: 14px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            font-family: inherit;
            color: #1f2937;
            transition: all 0.3s ease;
            background: #ffffff;
            width: 100%;
            /* Đảm bảo cả input và select đều rộng 100% */
        }

        /* Cải thiện style cho SELECT */
        .form-select {
            appearance: none;
            -webkit-appearance: none;
            /* Thêm mũi tên tùy chỉnh */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='none' stroke='%236B7280'%3E%3Cpath d='M7 7l3-3 3 3m0 6l-3 3-3-3' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 1.2em;
        }


        /* HIGHLIGHT INPUT LỖI (Kết hợp PHP để highlight sau khi redirect) */
        <?php if (isset($_SESSION['error']['Ten_KH'])) { ?>
            #Ten_KH {
                border-color: #ef4444 !important;
            }

        <?php } ?>
        <?php if (isset($_SESSION['error']['SDT'])) { ?>
            #SDT {
                border-color: #ef4444 !important;
            }

        <?php } ?>
        <?php if (isset($_SESSION['error']['BookingID'])) { ?>
            #BookingID {
                border-color: #ef4444 !important;
            }

        <?php } ?>
        <?php if (isset($_SESSION['error']['Nam_Sinh'])) { ?>
            #Nam_Sinh {
                border-color: #ef4444 !important;
            }

        <?php } ?>
        /* End Highlight */

        /* Hiệu ứng FOCUS mới (Tím-Xanh) */
        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #6a11cb;
            box-shadow: 0 0 0 4px rgba(106, 17, 203, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 4px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .radio-option input[type="radio"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            /* Tông màu TÍM-XANH MỚI */
            accent-color: #6a11cb;
        }

        .radio-option label {
            font-size: 15px;
            color: #4b5563;
            cursor: pointer;
        }

        .info-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: #fef3c7;
            border: 1px solid #fde68a;
            border-radius: 8px;
            font-size: 13px;
            color: #92400e;
            margin-bottom: 8px;
        }

        /* CSS cho thông báo lỗi (error message) */
        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 4px;
            font-weight: 500;
        }

        /* Các style khác giữ nguyên */
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .btn {
            flex: 1;
            padding: 16px 24px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            /* Đảm bảo nút Quay Lại (a tag) trông như nút */
        }

        .btn-primary {
            /* Tông màu TÍM-XANH MỚI */
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #ffffff;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            /* Box shadow Tím-Xanh mới */
            box-shadow: 0 10px 25px rgba(106, 17, 203, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #4b5563;
            border: 2px solid #e5e7eb;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
            border-color: #d1d5db;
        }

        .btn-icon {
            font-size: 18px;
        }

        @media (max-width: 640px) {
            .page-wrapper {
                padding: 20px 16px;
            }

            .form-container {
                padding: 30px 24px;
            }

            .form-title {
                font-size: 26px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }

            .radio-group {
                flex-direction: column;
                gap: 12px;
            }
        }

        @media (max-width: 400px) {
            .form-container {
                padding: 24px 20px;
            }

            .form-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <main class="page-wrapper">
        <div class="form-container">
            <header class="form-header">
                <div class="form-icon">
                    ✏️
                </div>
                <h1 class="form-title" id="formTitle">Sửa Thông Tin Khách Hàng</h1>
                <p class="form-subtitle">Chỉnh sửa các thông tin cần thiết</p>
            </header>

            <form action="<?= BASE_URL_ADMIN . '?act=sua-xemkhachhang' ?>" method="POST" enctype="multipart/form-data"
                class="form-main">

                <div class="info-badge">
                    <span class="info-icon">ℹ️</span>
                    <span>Đang chỉnh sửa khách hàng ID: **<?= get_value('KH_ID', $listXemKhachHang) ?>**</span>
                </div>

                <input type="hidden" name="KH_ID" value="<?= get_value('KH_ID', $listXemKhachHang) ?>">

                <div class="form-group">
                    <label for="TourID" class="form-label">Tên Tour<span class="required-mark">*</span>
                    </label>
                    <select id="TourID" name="TourID" class="form-select" required>
                        <option value="">-- Chọn tour --</option>
                        <?php
                        // Kiểm tra xem $listTour có tồn tại và là mảng không
                        if (isset($listTour) && is_array($listTour)): ?>
                            <?php foreach ($listTour as $Tour): ?>
                                <?php
                                $selected = (isset($listXemKhachHang['TourID']) && $Tour['TourID'] == $listXemKhachHang['TourID']) ? 'selected' : '';
                                ?>
                                <option value="<?= $Tour['TourID'] ?>" <?= $selected ?>>
                                    <?= $Tour['TenTour'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <div class="form-helper">
                        Chọn tour sẽ được chạy
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="Ten_KH" class="form-label">
                        Tên khách hàng <span class="required-mark">*</span>
                    </label>
                    <input type="text" id="Ten_KH" name="Ten_KH" class="form-input" placeholder="Nhập tên đầy đủ"
                        value="<?= get_value('Ten_KH', $listXemKhachHang) ?>" required>
                    <?php if (isset($_SESSION['error']['Ten_KH'])) { ?>
                        <p class="error-message"><?= $_SESSION['error']['Ten_KH'] ?></p>
                    <?php } ?>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="SDT" class="form-label">
                            Số điện thoại <span class="required-mark">*</span>
                        </label>
                        <input type="tel" id="SDT" name="SDT" class="form-input" placeholder="0912 345 678"
                            value="<?= get_value('SDT', $listXemKhachHang) ?>" required>
                        <?php if (isset($_SESSION['error']['SDT'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['SDT'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="BookingID" class="form-label">
                            Booking ID <span class="required-mark">*</span>
                        </label>
                        <input type="text" id="BookingID" name="BookingID" class="form-input" placeholder="BK123456"
                            value="<?= get_value('BookingID', $listXemKhachHang) ?>" required>
                        <?php if (isset($_SESSION['error']['BookingID'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['BookingID'] ?></p>
                        <?php } ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            Giới tính <span class="required-mark">*</span>
                        </label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="gioitinh_nam" name="Gioi_Tinh" value="Nam"
                                    <?= ($gioi_tinh_value == 'Nam') ? 'checked' : '' ?> required>
                                <label for="gioitinh_nam">Nam</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="gioitinh_nu" name="Gioi_Tinh" value="Nữ"
                                    <?= ($gioi_tinh_value == 'Nữ') ? 'checked' : '' ?>>
                                <label for="gioitinh_nu">Nữ</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="gioitinh_khac" name="Gioi_Tinh" value="Khác"
                                    <?= ($gioi_tinh_value == 'Khác' || ($gioi_tinh_value != 'Nam' && $gioi_tinh_value != 'Nữ')) ? 'checked' : '' ?>>
                                <label for="gioitinh_khac">Khác</label>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['error']['Gioi_Tinh'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['Gioi_Tinh'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="Nam_Sinh" class="form-label">
                            Ngày sinh <span class="required-mark">*</span>
                        </label>
                        <input type="date" id="Nam_Sinh" name="Nam_Sinh" class="form-input"
                            value="<?= get_value('Nam_Sinh', $listXemKhachHang) ?>" required>
                        <?php if (isset($_SESSION['error']['Nam_Sinh'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['Nam_Sinh'] ?></p>
                        <?php } ?>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="javascript:history.back()" class="btn btn-secondary" id="backButton">
                        <span class="btn-icon">←</span>
                        <span id="backButtonText">Quay Lại</span>
                    </a>
                    <button type="submit" class="btn btn-primary" id="submitButton">
                        <span id="submitButtonText">Cập Nhật</span>
                        <span class="btn-icon">✓</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }
    // Không nên unset($_POST) ở đây vì có thể làm mất giá trị khi refresh trang.
    ?>
</body>

</html>