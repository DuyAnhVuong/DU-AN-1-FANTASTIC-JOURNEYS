
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Danh Sách Booking</title>
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
            max-width: 1400px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-left h1 {
            font-size: 32px;
            font-weight: 700;
            color: #2d3748;
            margin: 0 0 5px 0;
        }

        .header-left p {
            font-size: 15px;
            color: #718096;
            margin: 0;
        }

        .header-right {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        /* --- Thanh lọc và tìm kiếm mới --- */
        .filter-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-item {
            flex-grow: 1;
            min-width: 180px;
        }

        .filter-controls input[type="text"],
        .filter-controls select {
            padding: 12px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .filter-controls button {
            padding: 12px 20px;
            background: #4299e1;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        /* --------------------------------- */

        .btn-add {
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1400px;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        thead th {
            padding: 16px 12px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: #f7fafc;
        }

        tbody td {
            padding: 16px 12px;
            font-size: 14px;
            color: #4a5568;
        }

        .booking-id {
            font-weight: 700;
            color: #667eea;
        }

        .customer-name {
            font-weight: 600;
            color: #2d3748;
        }

        .tour-name {
            color: #2d3748;
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .customer-type {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #ffffff;
        }

        .type-nguoilon {
            background: #48bb78;
            /* Xanh lá */
        }

        .type-treem {
            background: #ed8936;
            /* Cam */
        }

        .type-embe {
            background: #9f7aea;
            /* Tím */
        }

        .date-text {
            color: #2d3748;
            font-weight: 500;
            white-space: nowrap;
        }

        .total-guests {
            font-weight: 700;
            color: #2d3748;
            text-align: center;
        }

        .price {
            font-weight: 700;
            color: #dd6b20;
            /* Cam đậm cho giá */
            font-size: 15px;
        }

        /* --- Status Badge --- */
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            color: #ffffff;
            white-space: nowrap;
        }

        .status-choxacnhan {
            background-color: #d3f655ff;
            /* Vàng */
        }

        .status-dacoc {
            background-color: #4299e1;
            /* Xanh dương */
        }

        .status-hoantat {
            background-color: #48bb78;
            /* Xanh lá */
        }

        .status-huy {
            background-color: #f56565;
            /* Đỏ */
        }

        /* --------------------- */


        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .btn-action {
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-view {
            background: #4299e1;
            color: #ffffff;
        }

        .btn-view:hover {
            background: #3182ce;
            transform: translateY(-2px);
        }

        .btn-edit {
            background: #f6ad55;
            /* Màu Cam/Warning */
            color: #ffffff;
        }

        .btn-edit:hover {
            background: #dd6b20;
            transform: translateY(-2px);
        }

        .btn-customer {
            background: #2d3748;
            /* Màu Tối */
            color: #ffffff;
        }

        .btn-customer:hover {
            background: #1a202c;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: #f56565;
            color: #ffffff;
        }

        .btn-delete:hover {
            background: #e53e3e;
            transform: translateY(-2px);
        }

        /* Các thẻ thống kê đã bị loại bỏ theo yêu cầu chuyển đổi dữ liệu */
        .stats-row {
            display: none;
        }

        @media (max-width: 1400px) {
            table {
                min-width: 1200px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-right {
                width: 100%;
                flex-direction: column;
                gap: 10px;
            }

            .filter-controls {
                flex-direction: column;
            }

            .btn-add {
                width: 100%;
            }
        }
    </style>
    
</head>

<body>
    <main class="container">
        <header class="page-header">
            <div class="header-left">
                <h1>📋 Danh Sách Booking</h1>
                <p>Quản lý tất cả booking tour du lịch</p>
            </div>
            
        </header>

        
        <div class="stats-row" style="display: none;">
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Khách hàng</th>
                        <th>Tour</th>
                        <th>Loại Khách</th>
                        <th>Ngày khởi hành</th>
                        <th>Ngày Về</th>
                        <th>Số Khách</th>
                        <th>Tổng tiền</th>
                        <!-- <th>NCC Phương tiện</th> -->
                        <th>Trạng thái</th>
                        <th style="text-align: right;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Giả định biến $listbooking tồn tại và chứa dữ liệu
                    if (!empty($listbooking)) {
                        foreach ($listbooking as $key => $booking):
                            // Logic xác định class cho trạng thái
                            $status_class = '';
                            switch ($booking['status']) {
                                case 'Chờ xác nhận':
                                    $status_class = 'status-choxacnhan';
                                    break;
                                case 'Đã cọc':
                                    $status_class = 'status-dacoc';
                                    break;
                                case 'Hoàn tất':
                                    $status_class = 'status-hoantat';
                                    break;
                                case 'Hủy':
                                    $status_class = 'status-huy';
                                    break;
                                default:
                                    $status_class = 'status-dacoc'; // Mặc định màu khác
                                    break;
                            }

                            // Logic xác định class cho loại khách
                            $loai_khach_class = '';
                            $loai_khach_text = $booking['LoaiKhach'] ?? 'N/A';
                            if (stripos($loai_khach_text, 'Người lớn') !== false || stripos($loai_khach_text, 'Lớn') !== false) {
                                $loai_khach_class = 'type-nguoilon';
                            } elseif (stripos($loai_khach_text, 'Trẻ em') !== false || stripos($loai_khach_text, 'Trẻ') !== false) {
                                $loai_khach_class = 'type-treem';
                            } elseif (stripos($loai_khach_text, 'Em bé') !== false || stripos($loai_khach_text, 'Bé') !== false) {
                                $loai_khach_class = 'type-embe';
                            } else {
                                $loai_khach_class = 'type-nguoilon'; // Mặc định
                            }

                            // Tính toán tổng tiền (giả định cột Gia tồn tại)
                            $tong_tien = ($booking['Gia'] ?? 0) * ($booking['TongSoKhach'] ?? 0);
                    ?>

                            <tr>
                                <td><span class="booking-id"><?= $key + 1 ?></span></td>
                                <td>
                                    <span class="customer-name"><?= $booking['TenNguoiDat'] ?? 'N/A' ?></span><br>
                                    <small style="color: #718096;"><?= $booking['SDT'] ?? 'N/A' ?></small>
                                </td>
                                <td class="tour-name"><?= $booking['TenTour'] ?? 'N/A' ?></td>
                                <td>
                                    <span class="customer-type <?= $loai_khach_class ?>">
                                        <?= $loai_khach_text ?>
                                    </span>
                                </td>
                                <td class="date-text"><?= $booking['NgayKhoiHanhDuKien'] ?? 'N/A' ?></td>
                                <td class="date-text"><?= $booking['NgayVe'] ?? 'N/A' ?></td>
                                <td class="total-guests"><?= $booking['TongSoKhach'] ?? 0 ?></td>
                                <td class="price"><?= number_format($tong_tien, 0, ',', '.') ?> ₫</td>
                                <!-- <td><?= $booking['Name_PhuongTien'] ?? 'N/A' ?></td> -->
                                <td>
                                    <span class="status-badge <?= $status_class ?>">
                                        <?= $booking['status'] ?? 'N/A' ?>
                                    </span>
                                </td>
                                <td style="text-align: right;">
                                    <div class="action-buttons">
                                        
                                        <a href="<?= BASE_URL . '?act=form-edit-booking&id=' . $booking['BookingID'] ?>">
                                            <button class="btn-action btn btn-check">✏️ Xem </button>
                                        </a>
                                        <!-- <a href="<?= BASE_URL . '?act=xemkhachhang' ?>">
                                            <button class="btn-action btn-customer">Khách hàng</button>
                                        </a> -->
                                        <!-- <a href="<?= BASE_URL . '?act=huy-booking&id=' . $booking['BookingID'] ?>"
                                            onclick="return confirm('Bạn có đồng ý HỦY booking này hay không?')">
                                            <button class="btn-action btn-delete">🗑️ Hủy</button>
                                        </a> -->
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;
                    } else { ?>
                        <tr>
                            <td colspan="10" style="text-align: center; padding: 20px; color: #718096;">Không có dữ liệu booking nào được tìm thấy.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 20px;">
            <a href="<?= BASE_URL ?>">
                <button class="btn-action btn-customer" style="padding: 10px 20px; background: #4a5568;">Quay lại</button>
            </a>
        </div>
    </main>
</body>

</html>