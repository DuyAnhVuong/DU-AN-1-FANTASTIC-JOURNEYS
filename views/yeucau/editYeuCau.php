<?php
// Các biến từ Controller đã được truyền vào
$errors = $errors ?? [];
$yc = $yeuCauDetail;

// Lấy thêm trạng thái đáp ứng (TrangThaiDapUng) từ DB
// Nếu không có, mặc định là 'Chờ xử lý'. Đây là logic của admin form.
$trangThaiHienTai = $yc['TrangThaiDapUng'] ?? 'Chờ xử lý';
$trangThaiOptions = ['Chờ xử lý', 'Đã xử lý', 'Đã hủy']; // Thêm tùy chọn để quản lý

// Định nghĩa BASE_URL_ADMIN nếu chưa được định nghĩa (thường là trong config)
if (!defined('BASE_URL_ADMIN')) {
    define('BASE_URL_ADMIN', ''); // Thay bằng đường dẫn admin thực tế của bạn
}

?>

<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Yêu Cầu Đặc Biệt: <?= $yc['YeuCauID'] ?></title>

    <style>
        /* CSS Styles from your template, adjusted for PHP data */
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', 'Segoe UI', Tahoma, sans-serif;
            /* Sử dụng màu từ default config của bạn */
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 100%;
            min-height: 100vh;
            /* Đảm bảo chiều cao tối thiểu cho body */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-wrapper {
            width: 100%;
            min-height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .form-container {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 600px;
            width: 100%;
        }

        .form-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .form-title {
            font-size: 32px;
            font-weight: 700;
            color: #1a202c;
            margin: 0 0 8px 0;
        }

        .form-subtitle {
            font-size: 16px;
            color: #718096;
            margin: 0;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            color: #2d3748;
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: 'Inter', 'Segoe UI', Tahoma, sans-serif;
            box-sizing: border-box;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #667eea;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-input:disabled {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%232d3748' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 32px;
        }

        .btn {
            flex: 1;
            padding: 14px 24px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', 'Segoe UI', Tahoma, sans-serif;
            text-decoration: none;
            /* Dùng cho thẻ <a> */
            text-align: center;
        }

        .btn-back {
            background: #e2e8f0;
            color: #4a5568;
        }

        .btn-back:hover {
            background: #cbd5e0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-submit {
            /* Sử dụng màu vàng cho nút Cập nhật như trong code gốc AdminLTE */
            background: linear-gradient(135deg, #ffc107 0%, #ff8a00 100%);
            color: #1a202c;
            /* Đổi màu chữ cho phù hợp với nền vàng */
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 165, 0, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .text-danger {
            color: #e53e3e;
            font-size: 14px;
            margin-top: 4px;
            display: block;
        }

        @media (max-width: 640px) {
            .form-container {
                padding: 24px;
            }

            .form-title {
                font-size: 24px;
            }

            .button-group {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="form-container">
            <div class="form-header">
                <h1 class="form-title">Sửa Yêu Cầu Đặc Biệt: <?= $yc['YeuCauID'] ?></h1>
                <p class="form-subtitle">Cập nhật thông tin chi tiết và trạng thái yêu cầu</p>
            </div>

            <form action="<?= BASE_URL_ADMIN . '?act=sua-yeu-cau' ?>" method="post">
                <input type="hidden" name="YeuCauID" value="<?= $yc['YeuCauID'] ?>">

                <div class="form-group">
                    <label class="form-label">Khách hàng</label>
                    <input type="text" class="form-input" value="ID Khách: <?= $yc['KhachID'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="form-label">Mã Booking</label>
                    <input type="text" class="form-input" value="ID Booking: <?= $yc['BookingID'] ?>" disabled>
                </div>

                <hr style="margin: 32px 0; border-color: #e2e8f0;">

                <div class="form-group">
                    <label for="LoaiYeuCau" class="form-label">Loại Yêu Cầu</label>
                    <input type="text" name="LoaiYeuCau" id="LoaiYeuCau" class="form-input"
                        value="<?= htmlspecialchars($yc['LoaiYeuCau'] ?? '') ?>" placeholder="Nhập loại yêu cầu">
                    <?php if (isset($errors['LoaiYeuCau'])): ?>
                        <small class="text-danger"><?= $errors['LoaiYeuCau'] ?></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="ChiTiet" class="form-label">Chi Tiết Yêu Cầu</label>
                    <textarea name="ChiTiet" id="ChiTiet" class="form-textarea" rows="4"
                        placeholder="Mô tả chi tiết yêu cầu..."><?= htmlspecialchars($yc['ChiTiet'] ?? '') ?></textarea>
                    <?php if (isset($errors['ChiTiet'])): ?>
                        <small class="text-danger"><?= $errors['ChiTiet'] ?></small>
                    <?php endif; ?>
                </div>



                <div class="button-group">
                    <a href="<?= BASE_URL_ADMIN . '?act=yeu-cau' ?>" class="btn btn-back"> Quay lại danh sách </a>
                    <button type="submit" class="btn btn-submit"> Cập nhật Yêu Cầu </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>