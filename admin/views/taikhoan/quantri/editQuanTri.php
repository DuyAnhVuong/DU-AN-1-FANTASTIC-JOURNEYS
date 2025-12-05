<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tài Khoản Admin</title>
    <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 100%;
            height: 100vh;
            /* Đảm bảo đủ chiều cao */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-wrapper {
            width: 100%;
            padding: 40px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            position: relative;
        }

        .back-button {
            /* Vị trí tuyệt đối để nằm trên header */
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            z-index: 10;
            text-decoration: none;
            /* Dành cho thẻ a */
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateX(-4px);
        }

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 32px 40px;
            color: #ffffff;
            text-align: center;
            position: relative;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 8px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .form-subtitle {
            font-size: 14px;
            opacity: 0.9;
            margin: 0;
        }

        /* Style mới để hiển thị thông tin tài khoản đang sửa */
        .account-info {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 12px 16px;
            border-radius: 8px;
            margin-top: 16px;
            font-size: 13px;
        }

        .account-info-label {
            opacity: 0.8;
            margin-bottom: 4px;
        }

        .account-info-value {
            font-weight: 600;
            font-size: 14px;
        }

        /* Kết thúc Style mới */

        .form-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .required-mark {
            color: #dc3545;
            margin-left: 4px;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-sizing: border-box;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .password-note {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 12px 16px;
            margin-top: 8px;
            border-radius: 4px;
            font-size: 12px;
            color: #856404;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e9ecef;
            justify-content: flex-end;
            /* Căn nút sang phải */
        }

        /* Thay đổi để nút Quay lại (Cancel) nằm riêng và nút Submit nằm riêng */
        .btn-cancel {
            padding: 14px 24px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            background-color: #6c757d;
            color: #ffffff;
            text-decoration: none;
            /* Dành cho thẻ a */
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        .btn-primary {
            padding: 14px 24px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: #667eea;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .text-danger {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        .edit-info {
            display: flex;
            align-items: start;
            gap: 8px;
            padding: 12px 16px;
            background-color: #e7f3ff;
            border-radius: 6px;
            font-size: 12px;
            color: #0c5ea8;
            margin-bottom: 24px;
        }
    </style>
</head>

<body>
    <div class="form-wrapper">
        <div class="form-container">
            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="back-button">
                <span>◀</span> <span>Quay Lại</span>
            </a>

            <header class="form-header">
                <h1 class="form-title">
                    <span>✏️</span>
                    <span id="formTitle">Chỉnh Sửa Tài Khoản Admin</span>
                </h1>
                <p class="form-subtitle">Cập nhật thông tin tài khoản quản trị viên</p>
                <div class="account-info">
                    <div class="account-info-label">
                        Đang chỉnh sửa:
                    </div>
                    <div class="account-info-value">
                        <?= $quanTri['TenDangNhap']; ?> (ID: <?= $quanTri['TaiKhoanID']; ?>)
                    </div>
                </div>
            </header>

            <div class="form-body">
                <div class="edit-info">
                    <span>ℹ️</span>
                    <span>Bạn đang chỉnh sửa thông tin tài khoản. Các thay đổi sẽ có hiệu lực ngay sau khi lưu.</span>
                </div>

                <form action="<?= BASE_URL_ADMIN . '?act=sua-quan-tri' ?>" method="POST">

                    <input type="hidden" name="id" value="<?= $quanTri['TaiKhoanID'] ?>">

                    <div class="form-group">
                        <label for="HoTen" class="form-label"> Họ tên </label>
                        <input type="text" class="form-input" id="HoTen" name="TenDangNhap"
                            value="<?= $quanTri['TenDangNhap'] ?>" placeholder="Nhập họ tên">
                        <?php if (isset($_SESSION['error']['TenDangNhap'])) { ?>
                            <p class="text-danger"><?= $_SESSION['error']['TenDangNhap'] ?></p>
                            <?php unset($_SESSION['error']['TenDangNhap']); ?>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="Email" class="form-label"> Email </label>
                        <input type="email" class="form-input" id="Email" name="Email" value="<?= $quanTri['Email'] ?>"
                            placeholder="Nhập Email">
                        <?php if (isset($_SESSION['error']['Email'])) { ?>
                            <p class="text-danger"><?= $_SESSION['error']['Email'] ?></p>
                            <?php unset($_SESSION['error']['Email']); ?>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="MatKhau" class="form-label"> Mật khẩu </label>
                        <input type="password" class="form-input" id="MatKhau" name="MatKhauHash"
                            placeholder="Để trống nếu không thay đổi">
                        <div class="password-note">
                            ⚠️ Chỉ nhập mật khẩu mới nếu muốn thay đổi. Để trống để giữ nguyên mật khẩu hiện tại.
                        </div>
                        <?php if (isset($_SESSION['error']['MatKhauHash'])) { ?>
                            <p class="text-danger"><?= $_SESSION['error']['MatKhauHash'] ?></p>
                            <?php unset($_SESSION['error']['MatKhauHash']); ?>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="VaiTro" class="form-label"> Chức vụ </label>
                        <select id="VaiTro" name="VaiTro" class="form-select">
                            <option <?= ($quanTri['VaiTro'] == 1) ? 'selected' : '' ?> value="1">Admin</option>
                            <option <?= ($quanTri['VaiTro'] == 2) ? 'selected' : '' ?> value="2">HDV</option>
                        </select>
                        <p class="form-helper">Thay đổi chức vụ sẽ ảnh hưởng đến quyền truy cập của tài khoản</p>
                    </div>

                    <div class="form-actions">
                        <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="form-button btn-cancel">
                            <span>✖️</span> <span>Hủy</span>
                        </a>

                        <button type="submit" class="form-button btn-primary">
                            <span>💾</span> <span>Cập Nhật</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>