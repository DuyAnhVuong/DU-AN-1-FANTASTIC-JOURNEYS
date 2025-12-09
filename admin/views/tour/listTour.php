<?php require './views/layout/sidebar.php' ?>
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
    <div class="admin-panel">
      <header class="header">
        <h1 id="page-title">Quản Lý Tour Du Lịch</h1>
        <p id="page-subtitle">Quản lý toàn bộ thông tin tour, giá cả và lịch trình một cách hiệu quả</p>
      </header>
      <div class="stats-container">
        <div class="stat-card">
          <h3>Tổng Tour</h3>
          <p><?= $totalTours ?></p>
        </div>
        <div class="stat-card">
          <h3>Tour Trong Nước</h3>
          <p><?= $domesticTours ?></p>
        </div>
        <div class="stat-card">
          <h3>Tour Quốc Tế</h3>
          <p><?= $internationalTours ?></p>
        </div>
        <div class="stat-card">
          <h3>Doanh Thu</h3>
          <p><?= number_format($totalRevenue, 0, ',', '.') ?>₫</p>
        </div>
      </div>
      <div class="toolbar">
        <div class="search-box">
          <input type="text" id="search-input" placeholder="Tìm kiếm tour theo tên, loại, điểm đến...">
        </div>
        <a href="<?= BASE_URL_ADMIN . '?act=form-tour' ?>" style="text-decoration: none;">
          <button class="btn-primary">
            <svg width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="12" y1="5" x2="12" y2="19"></line>
              <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg><span id="add-button-text">Thêm Tour Mới</span>
          </button>
        </a>
      </div>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên Tour</th>
              <th>Ảnh Tour</th>
              <th>Loại Tour</th>
              <th>Mô Tả</th>
              <th>Ngày Tạo</th>
              <th>Giá</th>
              <th>Hành Động</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listTour as $key => $tourr):
              // Logic giả định để phân biệt loại tour cho class CSS nếu cần (dựa trên tên danh mục)
              $tourTypeClass = (strpos($tourr['ten_danh_muc'], 'Quốc Tế') !== false || strpos($tourr['ten_danh_muc'], 'Châu') !== false) ? 'international' : 'domestic';
              ?>
              <tr>
                <td><span class="tour-id"><?= $key + 1 ?></span></td>
                <td>
                  <div class="tour-name">
                    <?= $tourr['TenTour'] ?>
                  </div>
                </td>
                <td>
                  <img src="<?= BASE_URL . $tourr['Image'] ?>" class="tour-image-preview" alt="Ảnh Tour">
                </td>
                <td>
                  <span class="category-type <?= $tourTypeClass ?>"><?= $tourr['ten_danh_muc'] ?></span>
                </td>
                <td>
                  <div class="tour-description-text">
                    <?= $tourr['MoTa'] ?>
                  </div>
                </td>
                <td>
                  <div class="tour-date">
                    <?= date('d/m/Y', strtotime($tourr['NgayTao'])) ?>
                  </div>
                </td>
                <td>
                  <div class="tour-price">
                    <?= number_format($tourr['Gia'], 0, ',', '.') ?>₫
                  </div>
                </td>
                <td>
                  <div class="actions">
                    <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-lich-trinh&id=' . $tourr['TourID'] ?>"
                      class="btn-detail">
                      <svg width="14" height="14" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg> Chi tiết
                    </a>
                    <a href="<?= BASE_URL_ADMIN . '?act=form-sua-tour&id=' . $tourr['TourID'] ?>" class="btn-edit">
                      <svg width="14" height="14" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                      </svg> Sửa
                    </a>
                    <a href="<?= BASE_URL_ADMIN . '?act=xoa-tour&id=' . $tourr['TourID'] ?>"
                      onclick="return confirm('Bạn có đồng ý xóa hay không')" class="btn-delete">
                      <svg width="14" height="14" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      </svg> Xóa
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="pagination">
        <div class="pagination-info">
          Hiển thị 1-8 trong tổng số 8 tour
        </div>
        <div class="pagination-controls"><button class="page-btn">❮ Trước</button> <button
            class="page-btn active">1</button> <button class="page-btn">2</button> <button class="page-btn">3</button>
          <button class="page-btn">Sau ❯</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const defaultConfig = {
      page_title: "Quản Lý Tour Du Lịch",
      page_subtitle: "Quản lý toàn bộ thông tin tour, giá cả và lịch trình một cách hiệu quả",
      search_placeholder: "Tìm kiếm tour theo tên, loại, điểm đến...",
      add_button_text: "Thêm Tour Mới"
    };

    async function onConfigChange(config) {
      const pageTitle = document.getElementById('page-title');
      const pageSubtitle = document.getElementById('page-subtitle');
      const searchInput = document.getElementById('search-input');
      const addButtonText = document.getElementById('add-button-text');

      if (pageTitle) {
        pageTitle.textContent = config.page_title || defaultConfig.page_title;
      }

      if (pageSubtitle) {
        pageSubtitle.textContent = config.page_subtitle || defaultConfig.page_subtitle;
      }


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