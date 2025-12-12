<?php require './views/layout/sidebar.php' ?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý TourRun</title>
    <style>
        /* Tinh chỉnh lại màu sắc và UI/UX */
        :root {
            --primary-color: #5d53e0;
            /* Tím hiện đại hơn, sáng hơn #3d35b2 */
            --background-start: #5d53e0;
            --background-end: #362f8e;
            --primary-gradient: linear-gradient(135deg, var(--background-start) 0%, var(--background-end) 100%);

            --success-color: #10b981;
            /* Xanh ngọc mới (thay cho secondary-color) */
            --danger-color: #ef4444;
            /* Đỏ chuẩn */

            --text-color: #1f2937;
            /* Xám đậm cho chữ chính */
            --sub-text-color: #6b7280;
            /* Xám nhạt cho chữ phụ */
            --surface-color: #ffffff;
            --header-background: #5d53e0;
        }

        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', 'Segoe UI', sans-serif;
            background: var(--primary-gradient);
            width: 100%;
            height: 100%;
        }

        html {
            height: 100%;
        }

        /* CONTAINER CHÍNH */
        .page-container {
            width: 100%;
            min-height: 100%;
            padding: 40px 20px;
            box-sizing: border-box;
            /* Đã loại bỏ overflow-x: auto ở đây */
        }

        /* KHỐI NỘI DUNG LỚN */
        .main-content {
            max-width: 1600px;
            margin: 0 auto;
            background: var(--surface-color);
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            /* Đổ bóng nhẹ hơn */
            padding: 0;
        }

        /* HEADER KHỐI CHÍNH (Quản Trị Tour Run) */
        .main-header-block {
            background: var(--header-background);
            padding: 30px 40px;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            color: #ffffff;
        }

        .main-header-block .main-title {
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 5px 0;
        }

        .main-header-block .main-subtitle {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.85);
            margin: 0;
        }

        /* CONTENT BLOCK */
        .content-block {
            padding: 40px;
        }

        .page-header {
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* NÚT THÊM */
        .add-new-button {
            padding: 12px 25px;
            font-size: 15px;
            font-weight: 600;
            background: var(--primary-color);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            /* Khoảng cách giữa icon và chữ */
            box-shadow: 0 4px 10px rgba(93, 83, 224, 0.4);
        }

        .add-new-button:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* BẢNG */
        .table-container {
            /* ĐÃ XÓA overflow-x: auto; */
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            /* Viền xám nhạt */
        }

        .tourrun-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--surface-color);
            /* ĐÃ XÓA min-width: 1200px; */
            table-layout: fixed;
            /* QUAN TRỌNG: Giúp bảng co giãn và xử lý tràn văn bản */
        }

        .tourrun-table thead {
            background: #f9fafb;
            /* Xám rất nhạt cho header bảng */
        }

        .tourrun-table th {
            padding: 16px 10px;
            /* Giảm padding ngang */
            text-align: left;
            font-size: 13px;
            /* Giảm cỡ chữ để tiết kiệm không gian */
            font-weight: 600;
            color: var(--sub-text-color);
            text-transform: uppercase;
            /* Thêm uppercase cho thẩm mỹ tốt hơn */
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .tourrun-table tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.2s ease;
        }

        .tourrun-table tbody tr:hover {
            background: #f9f9fc;
        }

        .tourrun-table td {
            padding: 14px 10px;
            /* Giảm padding ngang và dọc */
            font-size: 14px;
            /* Giảm cỡ chữ */
            color: var(--text-color);
            vertical-align: middle;
            overflow: hidden;
            /* Ẩn phần văn bản bị tràn */
            text-overflow: ellipsis;
            /* Hiển thị dấu ... cho văn bản bị tràn */
            white-space: nowrap;
            /* Giữ văn bản trên một dòng */
        }

        /* Định nghĩa độ rộng cụ thể cho từng cột */
        .tourrun-table th:nth-child(1),
        .tourrun-table td:nth-child(1) {
            width: 3%;
        }

        /* # */
        .tourrun-table th:nth-child(2),
        .tourrun-table td:nth-child(2) {
            width: 8%;
        }

        /* Booking ID */
        .tourrun-table th:nth-child(3),
        .tourrun-table td:nth-child(3) {
            width: 15%;
        }

        /* Tên Tour */
        .tourrun-table th:nth-child(4),
        .tourrun-table td:nth-child(4) {
            width: 15%;
        }

        /* Hướng Dẫn Viên */
        .tourrun-table th:nth-child(5),
        .tourrun-table td:nth-child(5) {
            width: 10%;
        }

        /* Ngày Khởi Hành */
        .tourrun-table th:nth-child(6),
        .tourrun-table td:nth-child(6) {
            width: 10%;
        }

        /* Ngày Kết Thúc */
        .tourrun-table th:nth-child(7),
        .tourrun-table td:nth-child(7) {
            width: 18%;
        }

        /* Điểm Tập Trung */
        .tourrun-table th:nth-child(8),
        .tourrun-table td:nth-child(8) {
            width: 10%;
        }

        /* Trạng Thái */
        .tourrun-table th:nth-child(9),
        .tourrun-table td:nth-child(9) {
            width: 11%;
        }

        /* Thao Tác */


        .tourrun-id {
            font-weight: 700;
            color: var(--primary-color);
        }

        /* BOX BOOKING ID */
        .booking-id {
            font-family: 'Courier New', monospace;
            background: #eef2ff;
            /* Nền tím rất nhạt */
            color: var(--primary-color);
            padding: 4px 6px;
            /* Giảm padding */
            border-radius: 6px;
            font-size: 12px;
            /* Giảm cỡ chữ */
            font-weight: 600;
            display: inline-block;
            white-space: nowrap;
        }

        .tour-name {
            font-weight: 600;
            color: var(--text-color);
        }

        /* GUIDE NAME */
        .guide-name {
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 5px;
            /* Giảm gap */
        }

        .guide-icon {
            width: 28px;
            /* Giảm kích thước */
            height: 28px;
            /* Giảm kích thước */
            background: #d1d5db;
            /* Xám mờ */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4b5563;
            /* Chữ xám đậm */
            font-weight: 600;
            font-size: 12px;
            /* Giảm cỡ chữ */
            text-transform: uppercase;
            flex-shrink: 0;
            /* Không cho icon bị co lại */
        }

        .date-info,
        .meeting-point {
            color: var(--sub-text-color);
            font-size: 13px;
            /* Giảm cỡ chữ */
            white-space: nowrap;
        }

        .location-icon {
            color: var(--success-color);
            font-size: 16px;
            /* Giảm cỡ chữ */
        }

        /* STATUS BADGES */
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            /* Giảm padding */
            border-radius: 20px;
            font-size: 12px;
            /* Giảm cỡ chữ */
            font-weight: 600;
            white-space: nowrap;
        }

        .status-active {
            background: #d1fae5;
            color: #059669;
        }

        /* Xanh lá */
        .status-completed {
            background: #bfdbfe;
            color: #2563eb;
        }

        /* Xanh dương */
        .status-cancelled {
            background: #fee2e2;
            color: #ef4444;
        }

        /* Đỏ */
        .status-pending {
            background: #fef3c7;
            color: #d97706;
        }

        /* Vàng cam */
        .status-default {
            background: #e5e7eb;
            color: #4b5563;
        }

        /* Xám */

        /* ACTION BUTTONS */
        .action-cell {
            display: flex;
            gap: 5px;
            /* Giảm gap */
            flex-wrap: wrap;
            /* Cho phép nút xuống dòng nếu cần (giúp không tạo scrollbar) */
            justify-content: center;
            align-items: center;
        }

        .action-button {
            padding: 6px 10px;
            /* Giảm padding */
            font-size: 12px;
            /* Giảm cỡ chữ */
            font-weight: 500;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            white-space: nowrap;
            min-width: 45px;
            /* Đảm bảo nút đủ rộng */
        }

        .edit-action {
            background: var(--success-color);
            /* Xanh ngọc */
            color: #ffffff;
        }

        .edit-action:hover {
            background: #059669;
            box-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
        }

        .delete-action {
            background: var(--danger-color);
            /* Đỏ */
            color: #ffffff;
        }

        .delete-action:hover {
            background: #dc2626;
            box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
        }

        /* Thanh phân trang */
        .pagination-footer {
            display: flex;
            justify-content: space-between;
            /* Thay flex-end bằng space-between để đưa text sang trái */
            align-items: center;
            padding: 20px 0;
            gap: 10px;
            margin-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .pagination-controls {
            display: flex;
            gap: 10px;
        }

        .pagination-button {
            padding: 8px 15px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #ffffff;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s;
            color: var(--sub-text-color);
        }

        .pagination-button.active {
            background: var(--primary-color);
            color: #ffffff;
            border-color: var(--primary-color);
        }

        .pagination-button:hover:not(.active) {
            background: #f9fafb;
        }

        /* Media Query: Điều chỉnh lại khi màn hình nhỏ */
        @media (max-width: 1200px) {
            .content-block {
                padding: 20px;
            }

            .tourrun-table td,
            .tourrun-table th {
                padding: 10px 5px;
            }

            .tourrun-table th {
                font-size: 12px;
            }

            .tourrun-table td {
                font-size: 13px;
            }

            .action-button {
                padding: 4px 8px;
                font-size: 11px;
                min-width: 40px;
            }

            .guide-icon {
                width: 24px;
                height: 24px;
                font-size: 11px;
            }
        }
    </style>
</head>

<body>
    <div class="page-container">
        <div class="main-content">
            <div class="main-header-block">
                <h1 class="main-title">Quản Trị Tour Run</h1>
                <p class="main-subtitle">Quản lý và tổ chức các chuyến tour đang vận hành</p>
            </div>

            <div class="content-block">
                <header class="page-header">
                    <div class="header-text">
                    </div>
                    <a href="<?= BASE_URL_ADMIN . '?act=form-them-tourrun' ?>">
                        <button class="add-new-button">
                            <span style="font-size: 18px;">+</span> Thêm Tour run
                        </button>
                    </a>
                </header>

                <div class="table-container">
                    <table class="tourrun-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Booking ID</th>
                                <th>Tên Tour</th>
                                <th>Hướng Dẫn viên</th>
                                <th>Ngày Khởi Hành</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Điểm Tập Trung</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($listTourRun)): ?>
                                <?php foreach ($listTourRun as $key => $tr):
                                    // Logic lấy 2 ký tự đầu của tên hướng dẫn viên (giữ nguyên)
                                    $guideInitials = '';
                                    $guideNameParts = explode(' ', trim($tr['HoTen'] ?? 'N/A'));
                                    if (!empty($guideNameParts)) {
                                        $lastWord = array_pop($guideNameParts);
                                        $firstCharLast = substr($lastWord, 0, 1);
                                        $firstCharFirst = !empty($guideNameParts) ? substr($guideNameParts[0], 0, 1) : '';

                                        if (!empty($firstCharFirst) && !empty($firstCharLast)) {
                                            $guideInitials = strtoupper($firstCharFirst . $firstCharLast);
                                        } elseif (!empty($firstCharLast)) {
                                            $guideInitials = strtoupper(substr($lastWord, 0, 2));
                                        }
                                    }

                                    // Logic ánh xạ trạng thái sang class CSS (giữ nguyên)
                                    $statusClass = 'status-default';
                                    $statusText = $tr['TrangThaiVanHanh'] ?? 'Không rõ';
                                    if (stripos($statusText, 'diễn ra') !== false || stripos($statusText, 'active') !== false) {
                                        $statusClass = 'status-active';
                                    } elseif (stripos($statusText, 'sắp') !== false || stripos($statusText, 'pending') !== false) {
                                        $statusClass = 'status-pending';
                                    } elseif (stripos($statusText, 'hoàn thành') !== false || stripos($statusText, 'completed') !== false) {
                                        $statusClass = 'status-completed';
                                    } elseif (stripos($statusText, 'hủy') !== false || stripos($statusText, 'cancelled') !== false) {
                                        $statusClass = 'status-cancelled';
                                    }

                                    // Định dạng ngày (giữ nguyên)
                                    $startDate = !empty($tr['NgayKhoiHanhThucTe']) ? date('d/m/Y', strtotime($tr['NgayKhoiHanhThucTe'])) : 'N/A';
                                    $endDate = !empty($tr['NgayKetThuc']) ? date('d/m/Y', strtotime($tr['NgayKetThuc'])) : 'N/A';

                                    ?>
                                    <tr>
                                        <td class="tourrun-id"><?= $key + 1 ?></td>
                                        <td><span class="booking-id"><?= htmlspecialchars($tr['BookingID'] ?? 'N/A') ?></span>
                                        </td>
                                        <td class="tour-name"><?= htmlspecialchars($tr['TenTour'] ?? 'N/A') ?></td>
                                        <td>
                                            <div class="guide-name">
                                                <span class="guide-icon"><?= htmlspecialchars($guideInitials) ?></span>
                                                <span><?= htmlspecialchars($tr['HoTen'] ?? 'N/A') ?></span>
                                            </div>
                                        </td>
                                        <td class="date-info"><?= $startDate ?></td>
                                        <td class="date-info"><?= $endDate ?></td>
                                        <td class="meeting-point">
                                            <span class="location-icon">📍</span>
                                            <span><?= htmlspecialchars($tr['DiemTapTrung'] ?? 'N/A') ?></span>
                                        </td>
                                        <td><span
                                                class="status-badge <?= $statusClass ?>"><?= htmlspecialchars($statusText) ?></span>
                                        </td>
                                        <td>
                                            <div class="action-cell">
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-tourrun&id-tr=' . $tr['TourRunID'] ?>"
                                                    class="action-button edit-action">
                                                    Sửa
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-tourrun&id_tr=' . $tr['TourRunID'] ?>"
                                                    onclick="return confirm('Bạn có đồng ý xóa Tour Run ID: <?= $tr['TourRunID'] ?> không?')"
                                                    class="action-button delete-action">
                                                    Xóa
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9" style="text-align: center; padding: 20px; color: var(--text-color);">
                                        Không có dữ liệu Tour Run nào được tìm thấy.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-footer">
                    <span style="font-size: 14px; color: var(--sub-text-color);">Hiển thị 1-5 trong tổng số X Tour
                        Run</span>
                    <div class="pagination-controls">
                        <button class="pagination-button disabled" disabled>
                            < Trước</button>
                                <button class="pagination-button active">1</button>
                                <button class="pagination-button">2</button>
                                <button class="pagination-button">3</button>
                                <button class="pagination-button">Sau ></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>