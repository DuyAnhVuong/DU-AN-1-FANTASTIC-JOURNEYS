<?php require './views/layout/sidebar.php' ?>
<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Tour Du Lịch</title>
  <script src="/_sdk/element_sdk.js"></script>

  <style>
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100%;
      width: 100%;
    }

    * {
      box-sizing: border-box;
    }

    .container {
      width: 100%;
      min-height: 100%;
      padding: auto;
      margin: auto;
    }

    .admin-panel {
      max-width: 1400px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      overflow: hidden;
    }

    .header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 32px 40px;
      color: #ffffff;
    }

    .header h1 {
      margin: 0 0 8px 0;
      font-size: 32px;
      font-weight: 700;
      letter-spacing: -0.5px;
    }

    .header p {
      margin: 0;
      font-size: 16px;
      opacity: 0.9;
    }

    .toolbar {
      padding: 24px 40px;
      background: #f8f9fa;
      border-bottom: 1px solid #e9ecef;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      flex-wrap: wrap;
    }

    .search-box {
      flex: 1;
      min-width: 250px;
    }

    .search-box input {
      width: 100%;
      padding: 12px 16px 12px 44px;
      border: 2px solid #e9ecef;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s ease;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23667eea' stroke-width='2'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cpath d='m21 21-4.35-4.35'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: 12px center;
    }

    .search-box input:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .btn-primary {
      padding: 12px 24px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .stats-container {
      padding: 24px 40px;
      background: #ffffff;
      border-bottom: 1px solid #e9ecef;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }

    .stat-card {
      padding: 20px;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 12px;
      border-left: 4px solid #667eea;
    }

    .stat-card h3 {
      margin: 0 0 8px 0;
      font-size: 14px;
      color: #6c757d;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .stat-card p {
      margin: 0;
      font-size: 28px;
      font-weight: 700;
      color: #212529;
    }

    .table-container {
      padding: 0;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background: #f8f9fa;
      border-bottom: 2px solid #e9ecef;
    }

    thead th {
      padding: 16px 20px;
      text-align: left;
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #495057;
      white-space: nowrap;
    }

    thead th:first-child {
      width: 50px;
    }

    thead th:nth-child(2) {
      min-width: 150px;
    }

    thead th:nth-child(3) {
      width: 100px;
    }

    thead th:nth-child(4) {
      min-width: 100px;
      /* Đã điều chỉnh thành min-width để linh hoạt hơn */
      width: auto;
    }

    thead th:nth-child(5) {
      min-width: 250px;
      max-width: 300px;
    }

    thead th:nth-child(6) {
      width: 100px;
    }

    thead th:nth-child(7) {
      width: 120px;
    }

    thead th:last-child {
      width: 180px;
      text-align: center;
    }

    tbody tr {
      border-bottom: 1px solid #e9ecef;
      transition: all 0.2s ease;
    }

    tbody tr:hover {
      background: #f8f9fa;
    }

    tbody td {
      padding: 20px;
      font-size: 14px;
      color: #495057;
      vertical-align: top;
    }

    .tour-id {
      font-weight: 700;
      color: #667eea;
      font-family: 'Courier New', monospace;
    }

    .tour-image-preview {
      width: 100px;
      height: 70px;
      object-fit: cover;
      border-radius: 4px;
    }

    .tour-name {
      font-weight: 600;
      color: #212529;
      margin-bottom: 4px;
    }

    .category-type {
      display: inline-block;
      padding: 4px 12px;
      background: #e3f2fd;
      color: #1976d2;
      border-radius: 12px;
      font-size: 12px;
      font-weight: 600;
      white-space: nowrap;
      /* Đã thêm để ngăn xuống dòng */
    }

    .tour-description-text {
      line-height: 1.6;
      color: #6c757d;
      font-size: 13px;
      max-width: 300px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .tour-date {
      font-size: 13px;
      color: #6c757d;
      white-space: nowrap;
    }

    .tour-price {
      font-weight: 700;
      color: #2e7d32;
      font-size: 16px;
      white-space: nowrap;
    }

    .actions {
      display: flex;
      gap: 8px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn-detail,
    .btn-edit,
    .btn-delete {
      padding: 8px 12px;
      border: none;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      text-decoration: none;
    }

    .btn-detail {
      background: #f3e5f5;
      color: #7b1fa2;
    }

    .btn-detail:hover {
      background: #e1bee7;
    }

    .btn-edit {
      background: #e3f2fd;
      color: #1976d2;
    }

    .btn-edit:hover {
      background: #bbdefb;
    }

    .btn-delete {
      background: #ffebee;
      color: #d32f2f;
    }

    .btn-delete:hover {
      background: #ffcdd2;
    }

    .pagination {
      padding: 24px 40px;
      background: #f8f9fa;
      border-top: 1px solid #e9ecef;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .pagination-info {
      font-size: 14px;
      color: #6c757d;
    }

    .pagination-controls {
      display: flex;
      gap: 8px;
    }

    .page-btn {
      padding: 8px 14px;
      background: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 6px;
      font-size: 14px;
      color: #495057;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .page-btn:hover {
      background: #e9ecef;
      border-color: #adb5bd;
    }

    .page-btn.active {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #ffffff;
      border-color: transparent;
    }

    @media (max-width: 768px) {
      .container {
        padding: 20px 10px;
      }

      .header {
        padding: 24px 20px;
      }

      .header h1 {
        font-size: 24px;
      }

      .toolbar {
        padding: 16px 20px;
      }

      .search-box {
        width: 100%;
      }

      .stats-container {
        padding: 16px 20px;
        grid-template-columns: 1fr;
      }

      thead th,
      tbody td {
        padding: 12px;
        font-size: 12px;
      }

      .pagination {
        padding: 16px 20px;
      }

      .actions {
        flex-direction: column;
      }

      .btn-detail,
      .btn-edit,
      .btn-delete {
        width: 100%;
        justify-content: center;
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
  <div class="container">
    <div class="admin-panel">
      <header class="header">
        <h1 id="page-title">Quản Lý Tour Du Lịch</h1>
        <p id="page-subtitle">Quản lý toàn bộ thông tin tour, giá cả và lịch trình một cách hiệu quả</p>
      </header>
      <div class="stats-container">
        <div class="stat-card">
          <h3>Tổng Tour</h3>
          <p>8</p>
        </div>
        <div class="stat-card">
          <h3>Tour Trong Nước</h3>
          <p>5</p>
        </div>
        <div class="stat-card">
          <h3>Tour Quốc Tế</h3>
          <p>3</p>
        </div>
        <div class="stat-card">
          <h3>Doanh Thu</h3>
          <p>245M</p>
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

      if (searchInput) {
        searchInput.placeholder = config.search_placeholder || defaultConfig.search_placeholder;
      }

      if (addButtonText) {
        addButtonText.textContent = config.add_button_text || defaultConfig.add_button_text;
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
        ["page_subtitle", config.page_subtitle || defaultConfig.page_subtitle],
        ["search_placeholder", config.search_placeholder || defaultConfig.search_placeholder],
        ["add_button_text", config.add_button_text || defaultConfig.add_button_text]
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