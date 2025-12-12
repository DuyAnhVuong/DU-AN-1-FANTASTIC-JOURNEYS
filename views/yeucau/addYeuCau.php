<?php
// Lấy biến $errors và $yc (dữ liệu cũ) từ Controller
$errors = $errors ?? [];
// Khởi tạo $yc nếu chưa có để tránh lỗi undefined key khi form lần đầu được load
$yc = $yc ?? ['KhachID' => '', 'BookingID' => '', 'LoaiYeuCau' => '', 'ChiTiet' => ''];
// Khởi tạo $KhachLe nếu chưa có (Đây là mảng chứa danh sách khách hàng để tạo dropdown)
// Thường $KhachLe sẽ được Controller fetch từ DB
$KhachLe = $KhachLe ?? [
    ['KhachID' => 1, 'HoTen' => 'Nguyễn Văn A (KL001)'],
    ['KhachID' => 2, 'HoTen' => 'Trần Thị B (KL002)'],
    ['KhachID' => 3, 'HoTen' => 'Lê Minh C (KL003)'],
    // ... Thêm dữ liệu mẫu nếu cần test
];

// Định nghĩa BASE_URL nếu chưa được định nghĩa
if (!defined('BASE_URL')) {
    define('BASE_URL', ''); // Thay bằng đường dẫn admin thực tế của bạn
}

?>

<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Yêu Cầu Đặc Biệt Mới</title>

    <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', 'Arial', sans-serif;
            /* Sử dụng màu từ default config của bạn */
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-wrapper {
            width: 100%;
            min-height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .form-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 48px;
            max-width: 650px;
            width: 100%;
        }

        .page-header {
            margin-bottom: 36px;
            text-align: center;
        }

        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0 0 12px 0;
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            font-size: 16px;
            color: #7f8c8d;
            margin: 0;
            font-weight: 400;
        }

        .input-group {
            margin-bottom: 28px;
        }

        .input-label {
            display: block;
            font-size: 15px;
            font-weight: 600;
            color: #34495e;
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }

        .required-mark {
            color: #e74c3c;
            margin-left: 4px;
        }

        /* Cần thêm style cho lỗi validation */
        .text-danger {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 4px;
            display: block;
            font-weight: 500;
        }


        .text-input,
        .select-input,
        .textarea-input {
            width: 100%;
            padding: 14px 18px;
            font-size: 15px;
            color: #2c3e50;
            background: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-family: 'Roboto', 'Arial', sans-serif;
            box-sizing: border-box;
        }

        .text-input:focus,
        .select-input:focus,
        .textarea-input:focus {
            outline: none;
            border-color: #4facfe;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(79, 172, 254, 0.1);
        }

        .text-input::placeholder,
        .textarea-input::placeholder {
            color: #adb5bd;
        }

        .select-input {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2334495e' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 18px center;
            padding-right: 48px;
        }

        .textarea-input {
            min-height: 140px;
            resize: vertical;
            line-height: 1.6;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            margin-top: 36px;
        }

        .action-btn {
            flex: 1;
            padding: 16px 28px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Roboto', 'Arial', sans-serif;
            letter-spacing: 0.3px;
            text-decoration: none;
            /* Áp dụng cho thẻ <a> */
            text-align: center;
        }

        .back-btn {
            background: #ecf0f1;
            color: #5a6c7d;
        }

        .back-btn:hover {
            background: #d5dbdb;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .submit-btn {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: #ffffff;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(79, 172, 254, 0.4);
        }

        .action-btn:active {
            transform: translateY(0);
        }

        .divider {
            height: 1px;
            background: #e9ecef;
            margin: 32px 0;
        }

        @media (max-width: 768px) {
            .form-card {
                padding: 32px 24px;
            }

            .page-title {
                font-size: 28px;
            }

            .page-subtitle {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .form-card {
                padding: 24px 20px;
            }

            .page-title {
                font-size: 24px;
            }

            .action-buttons {
                flex-direction: column-reverse;
                gap: 12px;
            }

            .action-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <main class="page-wrapper">
        <div class="form-card">
            <header class="page-header">
                <h1 class="page-title">Thêm Yêu Cầu Đặc Biệt Mới</h1>
                <p class="page-subtitle">Điền thông tin chi tiết để tạo yêu cầu mới</p>
            </header>

            <form action="<?= BASE_URL . '?act=them-yeu-cau' ?>" method="post" enctype="multipart/form-data">

                <div class="input-group">
                    <label for="KhachID" class="input-label"> Tên khách hàng</label>
                    <select id="KhachID" name="KhachID" class="select-input">
                        <option value="">-- Chọn Tên Khách --</option>
                        <?php foreach ($KhachLe as $kh): ?>
                            <option value="<?= htmlspecialchars($kh['KhachID']) ?>" <?= ($kh['KhachID'] == $yc['KhachID']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($kh['HoTen']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="BookingID" class="input-label"> Booking ID<span class="required-mark">*</span> </label>
                    <input type="number" name="BookingID" id="BookingID" class="text-input"
                        value="<?= htmlspecialchars($yc['BookingID']) ?>" placeholder="Nhập mã booking (VD: 123456)">
                    <?php if (isset($errors['BookingID'])): ?>
                        <small class="text-danger"><?= $errors['BookingID'] ?></small>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label for="LoaiYeuCau" class="input-label"> Loại Yêu Cầu<span class="required-mark">*</span>
                    </label>
                    <input type="text" name="LoaiYeuCau" id="LoaiYeuCau" class="text-input"
                        value="<?= htmlspecialchars($yc['LoaiYeuCau']) ?>"
                        placeholder="Ví dụ: Ăn kiêng, Hỗ trợ xe lăn, Đặt hoa...">
                    <?php if (isset($errors['LoaiYeuCau'])): ?>
                        <small class="text-danger"><?= $errors['LoaiYeuCau'] ?></small>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label for="ChiTiet" class="input-label"> Chi tiết yêu cầu<span class="required-mark">*</span>
                    </label>
                    <textarea name="ChiTiet" id="ChiTiet" class="textarea-input" rows="4"
                        placeholder="Mô tả chi tiết yêu cầu của bạn. Ví dụ: tầng cao, view biển, giường đôi, không có hạt, v.v..."><?= htmlspecialchars($yc['ChiTiet']) ?></textarea>
                    <?php if (isset($errors['ChiTiet'])): ?>
                        <small class="text-danger"><?= $errors['ChiTiet'] ?></small>
                    <?php endif; ?>
                </div>

                <div class="divider"></div>

                <div class="action-buttons">
                    <a href="<?= BASE_URL . '?act=yeu-cau' ?>" class="action-btn back-btn"> ← Quay lại </a>
                    <button type="submit" class="action-btn submit-btn"> Thêm Yêu Cầu </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>