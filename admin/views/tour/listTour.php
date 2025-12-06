<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản Lý Danh Sách Khách Hàng</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f7f6;
            /* Nền nhẹ nhàng */
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 20px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #007bff;
            /* Màu xanh dương chủ đạo */
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* ==================================== */
        /* 2. FORM NHẬP DỮ LIỆU */
        /* ==================================== */
        .customer-form-container {
            padding: 25px;
            border: 1px solid #cceeff;
            border-radius: 6px;
            background-color: #f0f8ff;
            /* Nền form sáng */
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            /* Đảm bảo padding không làm tăng chiều rộng */
        }

        /* Nút */
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        button[type="submit"] {
            background-color: #28a745;
            /* Màu xanh lá cho nút Lưu */
            color: white;
            margin-right: 10px;
        }

        button[type="submit"]:hover {
            background-color: #1e7e34;
        }

        button[type="reset"] {
            background-color: #6c757d;
            /* Màu xám cho nút Đặt Lại */
            color: white;
        }

        button[type="reset"]:hover {
            background-color: #5a6268;
        }

        /* ==================================== */
        /* 3. BẢNG DANH SÁCH */
        /* ==================================== */
        table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            border: 1px solid #e9ecef;
            padding: 12px 15px;
            text-align: left;
        }

        thead th {
            background-color: #007bff;
            /* Màu header bảng */
            color: white;
            font-weight: 700;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
            /* Màu xen kẽ cho dễ đọc */
        }

        tbody tr:hover {
            background-color: #e9f5ff;
            /* Hiệu ứng hover */
        }

        /* Nút Sửa/Xóa trong bảng */
        .action-btn {
            padding: 5px 10px;
            margin-right: 5px;
            font-size: 0.9em;
        }

        .edit-btn {
            background-color: #ffc107;
            /* Vàng */
            color: #333;
        }

        .delete-btn {
            background-color: #dc3545;
            /* Đỏ */
            color: white;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>📝 Quản Lý Khách Hàng Tour Du Lịch</h1>

        <div class="customer-form-container">
            <h2>➕ Thêm Khách Hàng Mới</h2>
            <form action="/submit-customer-data" method="POST">
                <div style="display: flex; gap: 20px;">
                    <div style="flex: 1;">
                        <label for="bookingID">BookingID (Mã Đặt Chỗ):</label>
                        <input type="text" id="bookingID" name="BookingID" placeholder="BK2025003" required>
                    </div>
                    <div style="flex: 2;">
                        <label for="hoTen">Họ và Tên:</label>
                        <input type="text" id="hoTen" name="HoTen" placeholder="Nhập Họ và Tên" required>
                    </div>
                </div>

                <div style="display: flex; gap: 20px;">
                    <div style="flex: 1;">
                        <label for="gioiTinh">Giới Tính:</label>
                        <select id="gioiTinh" name="GioiTinh" required>
                            <option value="">-- Chọn --</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div style="flex: 2;">
                        <label for="sdt">Số Điện Thoại (SĐT):</label>
                        <input type="tel" id="sdt" name="SDT" pattern="[0-9]{10,12}"
                            placeholder="Chỉ nhập số, ví dụ: 090xxxxxxx" required>
                    </div>
                </div>

                <button type="submit">💾 Lưu Khách Hàng</button>
                <button type="reset">🔄 Đặt Lại</button>
            </form>
        </div>

        ---

        <div class="customer-list-container">
            <h2>📋 Danh Sách Khách Hàng Hiện Có</h2>
            <table>
                <thead>
                    <tr>
                        <th>KhachID</th>
                        <th>BookingID</th>
                        <th>Họ Tên</th>
                        <th>Giới Tính</th>
                        <th>SĐT</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>KH001</td>
                        <td>BK2025001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Nam</td>
                        <td>0901234567</td>
                        <td>
                            <button class="action-btn edit-btn">Sửa</button>
                            <button class="action-btn delete-btn">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td>KH002</td>
                        <td>BK2025002</td>
                        <td>Trần Thị B</td>
                        <td>Nữ</td>
                        <td>0987654321</td>
                        <td>
                            <button class="action-btn edit-btn">Sửa</button>
                            <button class="action-btn delete-btn">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>