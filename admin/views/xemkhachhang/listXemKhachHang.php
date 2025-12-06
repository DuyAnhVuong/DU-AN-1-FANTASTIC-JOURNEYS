<?php require './views/layout/sidebar.php' ?>
<?php
// Tưởng tượng rằng biến $listXemKhachHang đã được định nghĩa
// từ file controller hoặc model và chứa dữ liệu khách hàng.
// Ví dụ về cấu trúc dữ liệu nếu không có data thực:
// $listXemKhachHang = [
//     [
//         'KH_ID' => 1,
//         'Ten_KH' => 'Nguyễn Văn An',
//         'SDT' => '0912345678',
//         'BookingID' => 'BK2024001',
//         'Gioi_Tinh' => 'Nam',
//         'Nam_Sinh' => 1990
//     ],
//     // ... thêm các khách hàng khác
// ];

// Giả định BASE_URL_ADMIN là hằng số đã được định nghĩa, 
// ví dụ: const BASE_URL_ADMIN = '/admin/'; 
// Nếu chưa có, bạn cần định nghĩa nó ở nơi khác trong code của mình.
// const BASE_URL_ADMIN = '/admin/'; 
// Lưu ý: Các hằng số BASE_URL_ADMIN, act, id-xkh, id_xkh 
// vẫn phụ thuộc vào logic PHP/Framework của bạn.
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Khách Hàng</title>
    <style>
        /* CSS Tùy chỉnh (dựa trên layout mẫu của bạn) */
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', 'Segoe UI', sans-serif;
            /* Thay đổi màu nền theo ý muốn */
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 100%;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            padding: 40px 20px;
            box-sizing: border-box;
        }

        .content-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
        }

        .header {
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-content {
            flex: 1;
        }

        .title {
            font-size: 32px;
            font-weight: 700;
            color: #1a202c;
            margin: 0 0 8px 0;
        }

        .subtitle {
            font-size: 16px;
            color: #718096;
            margin: 0;
        }

        .add-button {
            padding: 14px 28px;
            font-size: 16px;
            font-weight: 600;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            /* Thay màu nút */
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Arial', 'Segoe UI', sans-serif;
        }

        .add-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(72, 187, 120, 0.4);
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .customer-table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
        }

        .customer-table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .customer-table th {
            padding: 16px 20px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .customer-table tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: background 0.2s ease;
        }

        .customer-table tbody tr:hover {
            background: #f7fafc;
        }

        .customer-table tbody tr:last-child {
            border-bottom: none;
        }

        .customer-table td {
            padding: 16px 20px;
            font-size: 15px;
            color: #2d3748;
        }

        .customer-id {
            font-weight: 600;
            color: #667eea;
        }

        .booking-id {
            font-family: 'Courier New', monospace;
            background: #edf2f7;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 13px;
            display: inline-block;
        }

        /* CSS cho Giới tính */
        .gender-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 500;
        }

        .gender-male {
            background: #bee3f8;
            color: #2c5282;
        }

        .gender-female {
            background: #fed7d7;
            color: #822727;
        }

        .gender-other {
            background: #e2e8f0;
            color: #4a5568;
        }


        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            /* Quan trọng cho thẻ <a> */
            display: inline-block;
        }

        .edit-btn {
            background: #ffc107;
            /* Tương đương màu vàng AdminLTE/Bootstrap */
            color: #212529;
        }

        .edit-btn:hover {
            background: #e0a800;
            transform: translateY(-1px);
        }

        .delete-btn {
            background: #dc3545;
            /* Tương đương màu đỏ AdminLTE/Bootstrap */
            color: #ffffff;
        }

        .delete-btn:hover {
            background: #c82333;
            transform: translateY(-1px);
        }

        /* Media Queries cho Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: stretch;
            }

            .title {
                font-size: 24px;
            }

            .add-button {
                width: 100%;
            }

            .customer-table th,
            .customer-table td {
                padding: 10px 12px;
                font-size: 13px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content-wrapper">
            <header class="header">
                <div class="header-content">
                    <h1 class="title">Danh Sách Khách Hàng</h1>
                    <p class="subtitle">Quản lý thông tin khách hàng</p>
                </div>
                <a href="<?= BASE_URL_ADMIN . '?act=form-them-xemkhachhang' ?>">
                    <button class="add-button">
                        + Thêm khách hàng
                    </button>
                </a>
            </header>

            <div class="table-wrapper">
                <table class="customer-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Booking ID</th>
                            <th>Giới tính</th>
                            <th>Năm sinh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Kiểm tra nếu $listXemKhachHang là mảng và không rỗng
                        if (!empty($listXemKhachHang) && is_array($listXemKhachHang)):
                            foreach ($listXemKhachHang as $key => $xkh):
                                ?>
                                <tr>
                                    <td class="customer-id"><?= $key + 1 ?></td>
                                    <td class="customer-name"><?= $xkh['Ten_KH'] ?></td>
                                    <td class="phone-number"><?= $xkh['SDT'] ?></td>
                                    <td><span class="booking-id"><?= $xkh['BookingID'] ?></span></td>

                                    <td>
                                        <?php
                                        $gioiTinh = trim(mb_strtolower($xkh['Gioi_Tinh'], 'UTF-8'));
                                        $genderClass = 'gender-other';
                                        if ($gioiTinh === 'nam' || $gioiTinh === 'male') {
                                            $genderClass = 'gender-male';
                                        } elseif ($gioiTinh === 'nữ' || $gioiTinh === 'nu' || $gioiTinh === 'female') {
                                            $genderClass = 'gender-female';
                                        }
                                        ?>
                                        <span class="gender-badge <?= $genderClass ?>">
                                            <?= $xkh['Gioi_Tinh'] ?>
                                        </span>
                                    </td>

                                    <td class="birth-year"><?= $xkh['Nam_Sinh'] ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-xemkhachhang&id-xkh=' . $xkh['KH_ID'] ?>"
                                                class="action-btn edit-btn">
                                                Sửa
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=xoa-xemkhachhang&id_xkh=' . $xkh['KH_ID'] ?>"
                                                onclick="return confirm('Bạn có đồng ý xóa khách hàng: <?= $xkh['Ten_KH'] ?> hay không?')"
                                                class="action-btn delete-btn">
                                                Xóa
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">⚠️</div>
                                        <p class="empty-state-text">Không tìm thấy khách hàng nào.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>