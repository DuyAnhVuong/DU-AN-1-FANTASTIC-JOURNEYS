<?php
// Giả định bạn đã có logic khởi tạo session và biến BASE_URL_ADMIN
// Nếu đây là file độc lập để xem layout, bạn có thể bỏ qua đoạn này.

// Nếu bạn muốn test hiển thị lỗi mà không cần backend thực, hãy thêm logic giả lập lỗi tạm thời ở đầu file:
/*
if (empty($_SESSION['error'])) {
    $_SESSION['error'] = [
        'Ten_KH' => 'Tên khách hàng không được để trống.',
        'SDT' => 'Số điện thoại phải có 10 hoặc 11 chữ số.',
        'Gioi_Tinh' => 'Vui lòng chọn giới tính.',
    ];
}
*/
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khách Hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* CSS Cơ bản và Responsive (Giữ nguyên từ phản hồi trước) */
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
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
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            appearance: none;
            -webkit-appearance: none;
        }

        /* Highlight input đỏ nếu có lỗi PHP */
        <?php if (isset($_SESSION['error']) && array_key_exists('Ten_KH', $_SESSION['error'])) { ?>
            #Ten_KH {
                border-color: #ef4444 !important;
            }

        <?php } ?>
        <?php if (isset($_SESSION['error']) && array_key_exists('SDT', $_SESSION['error'])) { ?>
            #SDT {
                border-color: #ef4444 !important;
            }

        <?php } ?>
        <?php if (isset($_SESSION['error']) && array_key_exists('BookingID', $_SESSION['error'])) { ?>
            #BookingID {
                border-color: #ef4444 !important;
            }

        <?php } ?>
        <?php if (isset($_SESSION['error']) && array_key_exists('Nam_Sinh', $_SESSION['error'])) { ?>
            #Nam_Sinh {
                border-color: #ef4444 !important;
            }

        <?php } ?>

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
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
            accent-color: #667eea;
        }

        .radio-option label {
            font-size: 15px;
            color: #4b5563;
            cursor: pointer;
        }

        /* CSS cho thông báo lỗi (Lưu ý: cùng màu với required-mark) */
        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 4px;
            font-weight: 500;
        }

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
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
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

        /* Responsive CSS giữ nguyên */
        @media (max-width: 640px) {
            /* ... (CSS responsive) ... */
        }
    </style>
</head>

<body>
    <main class="page-wrapper">
        <div class="form-container">
            <header class="form-header">
                <h1 class="form-title" id="formTitle">📝 Thêm Khách Hàng Mới</h1>
                <p class="form-subtitle">Vui lòng điền đầy đủ thông tin khách hàng</p>
            </header>

            <form action="<?= BASE_URL_ADMIN . '?act=them-xemkhachhang' ?>" method="POST" enctype="multipart/form-data"
                class="form-main" id="customerForm">

                <div class="form-group full-width">
                    <label for="Ten_KH" class="form-label">
                        Tên khách hàng <span class="required-mark">*</span>
                    </label>
                    <input type="text" id="Ten_KH" name="Ten_KH" class="form-input" placeholder="Nhập tên đầy đủ"
                        required value="<?= isset($_POST['Ten_KH']) ? htmlspecialchars($_POST['Ten_KH']) : '' ?>">
                    <?php if (isset($_SESSION['error']['Ten_KH'])) { ?>
                        <p class="error-message"><?= $_SESSION['error']['Ten_KH'] ?></p>
                    <?php } ?>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="SDT" class="form-label">
                            Số điện thoại <span class="required-mark">*</span>
                        </label>
                        <input type="tel" id="SDT" name="SDT" class="form-input" placeholder="0912 345 678" required
                            pattern="[0-9]{10,11}"
                            value="<?= isset($_POST['SDT']) ? htmlspecialchars($_POST['SDT']) : '' ?>">
                        <?php if (isset($_SESSION['error']['SDT'])) { ?>
                            <p class="error-message"><?= $_SESSION['error']['SDT'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="BookingID" class="form-label">
                            Booking ID <span class="required-mark">*</span>
                        </label>
                        <input type="text" id="BookingID" name="BookingID" class="form-input"
                            placeholder="Ví dụ: BK123456" required
                            value="<?= isset($_POST['BookingID']) ? htmlspecialchars($_POST['BookingID']) : '' ?>">
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
                            <?php
                            $gioi_tinh_value = isset($_POST['Gioi_Tinh']) ? $_POST['Gioi_Tinh'] : '';
                            ?>
                            <div class="radio-option">
                                <input type="radio" id="gioitinh_nam" name="Gioi_Tinh" value="Nam" required
                                    <?= ($gioi_tinh_value == 'Nam') ? 'checked' : '' ?>>
                                <label for="gioitinh_nam">Nam</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="gioitinh_nu" name="Gioi_Tinh" value="Nữ"
                                    <?= ($gioi_tinh_value == 'Nữ') ? 'checked' : '' ?>>
                                <label for="gioitinh_nu">Nữ</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="gioitinh_khac" name="Gioi_Tinh" value="Khác"
                                    <?= ($gioi_tinh_value == 'Khác') ? 'checked' : '' ?>>
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
                        <input type="date" id="Nam_Sinh" name="Nam_Sinh" class="form-input" required
                            value="<?= isset($_POST['Nam_Sinh']) ? htmlspecialchars($_POST['Nam_Sinh']) : '' ?>">
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
                        <span id="submitButtonText">Thêm Khách Hàng</span>
                        <span class="btn-icon">→</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }
    // Bạn cũng nên xem xét việc xóa dữ liệu đã nhập (POST) nếu không muốn giữ lại chúng.
    // unset($_POST); 
    ?>
</body>

</html>