<?php require './views/layout/sidebar.php' ?>
<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Tài Khoản Admin</title>
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
    }

    .app-wrapper {
      width: 100%;
      min-height: 100%;
      padding: 40px 20px;
    }

    .main-container {
      max-width: 1400px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      overflow: hidden;
    }

    .page-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 32px 40px;
      color: #ffffff;
    }

    .page-title {
      font-size: 32px;
      font-weight: 700;
      margin: 0 0 8px 0;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .page-subtitle {
      font-size: 16px;
      opacity: 0.9;
      margin: 0;
    }

    .toolbar-section {
      padding: 24px 40px;
      background-color: #f8f9fa;
      border-bottom: 1px solid #e9ecef;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .search-container {
      flex: 1;
      min-width: 250px;
      max-width: 400px;
      position: relative;
    }

    .search-field {
      width: 100%;
      padding: 12px 16px 12px 44px;
      border: 2px solid #dee2e6;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s;
    }

    .search-field:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .search-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 18px;
    }

    .action-button {
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

    .btn-add {
      background-color: #28a745;
      color: #ffffff;
    }

    .btn-add:hover {
      background-color: #218838;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4);
    }

    .table-wrapper {
      padding: 0;
      overflow-x: auto;
    }

    .admin-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    .admin-table thead {
      background-color: #f8f9fa;
      border-bottom: 2px solid #dee2e6;
    }

    .admin-table th {
      padding: 16px 20px;
      text-align: left;
      font-weight: 600;
      color: #495057;
      white-space: nowrap;
    }

    .admin-table tbody tr {
      border-bottom: 1px solid #e9ecef;
      transition: background-color 0.2s;
    }

    .admin-table tbody tr:hover {
      background-color: #f8f9fa;
    }

    .admin-table td {
      padding: 16px 20px;
      color: #212529;
      vertical-align: middle;
    }

    .password-field {
      font-family: monospace;
      color: #6c757d;
      letter-spacing: 2px;
    }

    .role-badge {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 600;
      white-space: nowrap;
    }

    .role-super-admin {
      background-color: #fff3cd;
      color: #856404;
    }

    .role-admin {
      background-color: #cfe2ff;
      color: #084298;
    }

    .role-hdv {
      /* Đã đổi từ role-manager sang role-hdv theo dữ liệu PHP */
      background-color: #d1e7dd;
      color: #0f5132;
    }

    /* Đã giữ lại role-manager/staff cho mục đích hiển thị đầy đủ của CSS mẫu */
    .role-manager {
      background-color: #d1e7dd;
      color: #0f5132;
    }

    .role-staff {
      background-color: #e2e3e5;
      color: #41464b;
    }


    .action-buttons {
      display: flex;
      gap: 8px;
    }

    /* Nút chỉnh sửa và xóa sử dụng icon-button */
    .action-buttons .btn-action {
      padding: 8px 12px;
      border: none;
      background: none;
      cursor: pointer;
      border-radius: 6px;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      /* Thay đổi kích thước để phù hợp với text */
      font-weight: 600;
      text-decoration: none;
    }

    .btn-warning-action {
      background-color: #ffc107;
      color: #212529;
    }

    .btn-warning-action:hover {
      background-color: #e0a800;
    }

    .btn-danger-action {
      background-color: #dc3545;
      color: #ffffff;
    }

    .btn-danger-action:hover {
      background-color: #c82333;
    }


    .pagination-section {
      padding: 24px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f8f9fa;
      border-top: 1px solid #e9ecef;
    }

    .pagination-text {
      color: #6c757d;
      font-size: 14px;
    }

    .pagination-buttons {
      display: flex;
      gap: 8px;
    }

    .page-button {
      padding: 8px 16px;
      border: 1px solid #dee2e6;
      background-color: #ffffff;
      color: #495057;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      transition: all 0.2s;
    }

    .page-button:hover:not(:disabled) {
      background-color: #667eea;
      color: #ffffff;
      border-color: #667eea;
    }

    .page-button:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .page-button.active {
      background-color: #667eea;
      color: #ffffff;
      border-color: #667eea;
    }

    .security-notice {
      padding: 16px 40px;
      background-color: #fff3cd;
      border-left: 4px solid #ffc107;
      color: #856404;
      font-size: 13px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    @media (max-width: 768px) {
      .page-header {
        padding: 24px 20px;
      }

      .page-title {
        font-size: 24px;
      }

      .toolbar-section {
        padding: 16px 20px;
        flex-direction: column;
        align-items: stretch;
      }

      .search-container {
        max-width: 100%;
      }

      .pagination-section {
        padding: 16px 20px;
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
      }

      .pagination-buttons {
        justify-content: center;
      }

      .admin-table {
        font-size: 12px;
      }

      .admin-table th,
      .admin-table td {
        padding: 12px 8px;
      }

      .security-notice {
        padding: 12px 20px;
      }

      .action-buttons .btn-action {
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
  // Bỏ qua các file layout/header, navbar, sidebar, footer vì đã được thay thế bằng layout HTML/CSS mới
  // Giả định: $listTaiKhoan và BASE_URL_ADMIN đã được định nghĩa.
  
  // Hàm hỗ trợ để gán class badge dựa trên VaiTro (1: Admin, 0: HDV)
  function get_role_badge_class($vaiTro)
  {
    if ($vaiTro == 1) {
      return 'role-admin';
    } elseif ($vaiTro == 0) {
      return 'role-hdv';
    }
    return 'role-staff'; // Mặc định hoặc cho các vai trò khác
  }

  function get_role_text($vaiTro)
  {
    return $vaiTro == 1 ? 'Admin' : 'HDV';
  }
  ?>
  <div class="app-wrapper">
    <div class="main-container">
      <header class="page-header">
        <h1 class="page-title" id="pageTitle"><span>🔐</span> <span>Quản Lý Tài Khoản Admin</span></h1>
        <p class="page-subtitle">Quản lý và phân quyền tài khoản quản trị viên hệ thống</p>
      </header>
      <div class="security-notice"><span>⚠️</span> <span><strong>Lưu ý bảo mật:</strong> Chỉ cấp quyền admin cho những
          người được ủy quyền. Thay đổi mật khẩu định kỳ.</span>
      </div>
      <div class="toolbar-section">
        <div class="search-container">
          <span class="search-icon">🔍</span>
          <input type="text" class="search-field" id="searchInput" placeholder="Tìm kiếm tài khoản...">
        </div>
        <a href="<?= BASE_URL_ADMIN . '?act=form-them-quan-tri' ?>" class="action-button btn-add" id="addButton">
          <span>➕</span> <span>Thêm Tài Khoản Mới</span>
        </a>
      </div>
      <div class="table-wrapper">
        <table class="admin-table" id="example1">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên Đăng Nhập</th>
              <th>Mật Khẩu</th>
              <th>Email</th>
              <th>Vai Trò</th>
              <th>Hành Động</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($listTaiKhoan)): ?>
              <?php foreach ($listTaiKhoan as $key => $quanTri): ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><strong><?= $quanTri['TenDangNhap'] ?></strong></td>
                  <td><span class="password-field">**********</span></td>
                  <td><?= $quanTri['Email'] ?></td>
                  <td>
                    <span class="role-badge <?= get_role_badge_class($quanTri['VaiTro']) ?>">
                      <?= get_role_text($quanTri['VaiTro']) ?>
                    </span>
                  </td>
                  <td>
                    <div class="action-buttons">
                      <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id=' . $quanTri['TaiKhoanID'] ?>"
                        class="btn-action btn-warning-action" title="Sửa">
                        ✏️ Sửa
                      </a>
                      <a href="<?= BASE_URL_ADMIN . '?act=xoa-quan-tri&id=' . $quanTri['TaiKhoanID'] ?>"
                        onclick="return confirm('Bạn có đồng ý xoá tài khoản <?= $quanTri['TenDangNhap'] ?> không?')"
                        class="btn-action btn-danger-action" title="Xóa">
                        🗑️ Xoá
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="6" style="text-align: center;">Không có tài khoản quản trị nào.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="pagination-section">
        <div class="pagination-text">
          <?php if (!empty($listTaiKhoan)): ?>
            <a href="<?= BASE_URL_ADMIN ?>" style="text-decoration: none;">
              <button type="button" class="btn btn-primary">
                Quay lại
              </button>
            </a>
          <?php else: ?>
            Không có tài khoản nào
          <?php endif; ?>
        </div>


        <div class="pagination-buttons">

          <button class="page-button" disabled>◀ Trước</button>
          <button class="page-button active">1</button>
          <button class="page-button">2</button>
          <button class="page-button">3</button>
          <button class="page-button">Sau ▶</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const defaultConfig = {
      page_title: "Quản Lý Tài Khoản Admin",
      search_placeholder: "Tìm kiếm tài khoản...",
      add_button_text: "Thêm Tài Khoản Mới"
    };

    async function onConfigChange(config) {
      const pageTitleElement = document.querySelector('#pageTitle span:last-child');
      const searchInput = document.getElementById('searchInput');
      const addButton = document.querySelector('#addButton span:last-child');

      if (pageTitleElement) {
        pageTitleElement.textContent = config.page_title || defaultConfig.page_title;
      }

      if (searchInput) {
        searchInput.placeholder = config.search_placeholder || defaultConfig.search_placeholder;
      }

      if (addButton) {
        addButton.textContent = config.add_button_text || defaultConfig.add_button_text;
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