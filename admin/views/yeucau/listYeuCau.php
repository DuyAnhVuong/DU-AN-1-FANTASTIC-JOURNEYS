<?php require './views/layout/sidebar.php' ?>
<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Yêu Cầu Đặc Biệt</title>
  <script src="/_sdk/element_sdk.js"></script>
  <style>
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      width: 100%;
      height: 100%;
      min-height: 100vh;
      /* Đảm bảo chiều cao tối thiểu cho body */
    }

    .app-wrapper {
      width: 100%;
      min-height: 100%;
      padding: 40px 20px;
    }

    .container {
      max-width: 1400px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      overflow: hidden;
    }

    .header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 32px 40px;
      color: #ffffff;
    }

    .header-title {
      font-size: 32px;
      font-weight: 700;
      margin: 0 0 8px 0;
    }

    .header-subtitle {
      font-size: 16px;
      opacity: 0.9;
      margin: 0;
    }

    .toolbar {
      padding: 24px 40px;
      background-color: #f8f9fa;
      border-bottom: 1px solid #e9ecef;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .search-box {
      flex: 1;
      min-width: 250px;
      max-width: 400px;
      position: relative;
    }

    .search-input {
      width: 100%;
      padding: 12px 16px 12px 44px;
      border: 2px solid #dee2e6;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s;
    }

    .search-input:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .search-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
    }

    .btn {
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
      /* Thêm để style cho thẻ <a> */
      color: inherit;
      /* Thêm để style cho thẻ <a> */
    }

    .btn-primary {
      background-color: #667eea;
      color: #ffffff;
    }

    .btn-primary:hover {
      background-color: #5568d3;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .table-container {
      padding: 0;
      overflow-x: auto;
    }

    .data-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    .data-table thead {
      background-color: #f8f9fa;
      border-bottom: 2px solid #dee2e6;
    }

    .data-table th {
      padding: 16px 20px;
      text-align: left;
      font-weight: 600;
      color: #495057;
      white-space: nowrap;
    }

    .data-table tbody tr {
      border-bottom: 1px solid #e9ecef;
      transition: background-color 0.2s;
    }

    .data-table tbody tr:hover {
      background-color: #f8f9fa;
    }

    .data-table td {
      padding: 16px 20px;
      color: #212529;
      vertical-align: middle;
    }

    .badge {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 600;
      white-space: nowrap;
    }

    /* Giữ lại các badge class mặc dù không có dữ liệu thật để phân loại */
    .badge-urgent {
      background-color: #fee;
      color: #dc3545;
    }

    .badge-normal {
      background-color: #e7f5ff;
      color: #0c5ea8;
    }

    .badge-low {
      background-color: #e8f5e9;
      color: #2e7d32;
    }

    .actions {
      display: flex;
      gap: 8px;
    }

    .btn-action {
      /* Đổi tên để tránh xung đột với .btn-icon */
      padding: 8px 12px;
      border: none;
      cursor: pointer;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      transition: all 0.2s;
      text-decoration: none;
      text-align: center;
    }

    .btn-warning {
      background-color: #ffc107;
      color: #212529;
    }

    .btn-warning:hover {
      background-color: #e0a800;
    }

    .btn-danger {
      background-color: #dc3545;
      color: #ffffff;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    .pagination {
      padding: 24px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f8f9fa;
      border-top: 1px solid #e9ecef;
    }

    .pagination-info {
      color: #6c757d;
      font-size: 14px;
    }

    .pagination-controls {
      display: flex;
      gap: 8px;
    }

    .pagination-btn {
      padding: 8px 16px;
      border: 1px solid #dee2e6;
      background-color: #ffffff;
      color: #495057;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      transition: all 0.2s;
    }

    .pagination-btn:hover:not(:disabled) {
      background-color: #667eea;
      color: #ffffff;
      border-color: #667eea;
    }

    .pagination-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .pagination-btn.active {
      background-color: #667eea;
      color: #ffffff;
      border-color: #667eea;
    }

    @media (max-width: 768px) {
      .header {
        padding: 24px 20px;
      }

      .header-title {
        font-size: 24px;
      }

      .toolbar {
        padding: 16px 20px;
        flex-direction: column;
        align-items: stretch;
      }

      .search-box {
        max-width: 100%;
      }

      .pagination {
        padding: 16px 20px;
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
      }

      .pagination-controls {
        justify-content: center;
      }

      .table-container {
        padding: 0;
      }

      .data-table {
        font-size: 12px;
      }

      .data-table th,
      .data-table td {
        padding: 12px 8px;
      }

      .btn-action {
        padding: 6px 8px;
        font-size: 12px;
      }
    }
  </style>
  <style>
    @view-transition {
      navigation: auto;
    }
  </style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
</head>

<body>
  <?php
  // Bỏ qua các file layout/header, navbar, sidebar vì đã được thay thế bằng layout HTML/CSS mới
  // Tuy nhiên, nếu bạn muốn giữ lại các biến PHP như $listYeuCau, BASE_URL_ADMIN, bạn cần đảm bảo
  // chúng được định nghĩa trước khi đoạn code này được thực thi.
  // Giả định: BASE_URL_ADMIN và $listYeuCau đã được định nghĩa.
  
  // Khai báo lại các biến nếu cần, hoặc giả định chúng đã có.
  $listYeuCau = $listYeuCau ?? [];
  $BASE_URL_ADMIN = $BASE_URL_ADMIN ?? ''; // Giả định BASE_URL_ADMIN có giá trị
  
  // Hàm giả định để lấy class badge (vì dữ liệu gốc không có trường trạng thái)
  function get_badge_class($loaiYeuCau)
  {
    $loaiYeuCau = strtolower(trim($loaiYeuCau));
    if (strpos($loaiYeuCau, 'khẩn') !== false || strpos($loaiYeuCau, 'urgent') !== false) {
      return 'badge-urgent';
    } elseif (strpos($loaiYeuCau, 'thấp') !== false || strpos($loaiYeuCau, 'low') !== false || strpos($loaiYeuCau, 'đưa đón') !== false) {
      return 'badge-low';
    } else {
      return 'badge-normal';
    }
  }
  ?>
  <div class="app-wrapper">
    <div class="container">
      <header class="header">
        <h1 class="header-title" id="pageTitle">Danh sách Yêu Cầu Đặc Biệt</h1>
        <p class="header-subtitle">Theo dõi và xử lý các yêu cầu từ khách hàng</p>
      </header>
      <div class="toolbar">
        <div class="search-box">
          <span class="search-icon">🔍</span>
          <input type="text" class="search-input" id="searchInput" placeholder="Tìm kiếm yêu cầu...">
        </div>
        <a href="<?= $BASE_URL_ADMIN . '?act=form-them-yeu-cau' ?>" class="btn btn-primary">
          <i class="fas fa-plus"></i> ➕ Thêm Yêu Cầu Mới
        </a>
      </div>
      <div class="table-container">
        <table class="data-table" id="example1">
          <thead>
            <tr>
              <th>STT</th>
              <th>Yêu Cầu ID</th>
              <th>Khách Hàng</th>
              <th>Mã Booking</th>
              <th>Loại Yêu Cầu</th>
              <th>Chi Tiết</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($listYeuCau)): ?>
              <?php foreach ($listYeuCau as $key => $yc): ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $yc['YeuCauID'] ?></td>
                  <td><?= $yc['HoTen'] ?? 'N/A' ?></td>
                  <td><?= $yc['BookingID'] ?? 'N/A' ?></td>
                  <td>
                    <span class="badge <?= get_badge_class($yc['LoaiYeuCau']) ?>">
                      <?= $yc['LoaiYeuCau'] ?>
                    </span>
                  </td>
                  <td><?= $yc['ChiTiet'] ?></td>
                  <td>
                    <div class="actions">
                      <a href="<?= $BASE_URL_ADMIN . '?act=form-sua-yeu-cau&id_yeucau=' . $yc['YeuCauID'] ?>"
                        class="btn-action btn-warning" title="Cập nhật">
                        ✏️ Cập nhật
                      </a>
                      <a href="<?= $BASE_URL_ADMIN . '?act=xoa-yeu-cau&id=' . $yc['YeuCauID'] ?>"
                        onclick="return confirm('Bạn có đồng ý xóa yêu cầu <?= $yc['YeuCauID'] ?> hay không')"
                        class="btn-action btn-danger" title="Xóa">
                        🗑️ Xóa
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center">Không có yêu cầu đặc biệt nào.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="pagination">
        <div class="pagination-info">
          <?php if (!empty($listYeuCau)): ?>
            Hiển thị 1-<?= count($listYeuCau) ?> trong tổng số <?= count($listYeuCau) ?> yêu cầu
          <?php else: ?>
            <a href="<?= BASE_URL_ADMIN ?>" style="text-decoration: none;">
              <button type="button" class="btn btn-primary">
                Quay lại
              </button>
            </a>
          <?php endif; ?>
        </div>
        <div class="pagination-controls">
          <button class="pagination-btn" disabled>◀ Trước</button>
          <button class="pagination-btn active">1</button>
          <button class="pagination-btn">2</button>
          <button class="pagination-btn">Sau ▶</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const defaultConfig = {
      page_title: "Danh sách Yêu Cầu Đặc Biệt",
      search_placeholder: "Tìm kiếm yêu cầu..."
    };

    async function onConfigChange(config) {
      const pageTitle = document.getElementById('pageTitle');
      const searchInput = document.getElementById('searchInput');

      if (pageTitle) {
        pageTitle.textContent = config.page_title || defaultConfig.page_title;
      }

      if (searchInput) {
        searchInput.placeholder = config.search_placeholder || defaultConfig.search_placeholder;
      }
    }

    function mapToCapabilities(config) {
      return {
        recolorables: [],
        borderables: [],
        fontEditable: undefined,
        fontSizeable: undefined
      };
    }

    function mapToEditPanelValues(config) {
      return new Map([
        ["page_title", config.page_title || defaultConfig.page_title],
        ["search_placeholder", config.search_placeholder || defaultConfig.search_placeholder]
      ]);
    }

    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange,
        mapToCapabilities,
        mapToEditPanelValues
      });
    }
  </script>
</body>

</html>