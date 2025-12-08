<!doctype html>
<html lang="vi">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Trị Danh Mục Tour Du Lịch</title>
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
      max-width: 1200px;
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
      padding: 16px 24px;
      text-align: left;
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #495057;
    }

    thead th:first-child {
      width: 80px;
      text-align: center;
    }

    thead th:nth-child(2) {
      width: 25%;
    }

    thead th:nth-child(3) {
      width: 45%;
    }

    thead th:last-child {
      width: 140px;
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
      padding: 20px 24px;
      font-size: 14px;
      color: #495057;
      vertical-align: top;
    }

    tbody td:first-child {
      text-align: center;
      font-weight: 600;
      color: #667eea;
    }

    .category-name {
      font-weight: 600;
      color: #212529;
      margin-bottom: 4px;
    }

    .category-description {
      line-height: 1.6;
      color: #6c757d;
    }

    .actions {
      display: flex;
      gap: 8px;
      justify-content: center;
    }

    .btn-edit,
    .btn-delete {
      padding: 8px 12px;
      border: none;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
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

    /* Form Styles */
    .form-container {
      padding: 40px;
      background: #ffffff;
    }

    .form-group {
      margin-bottom: 24px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-size: 14px;
      font-weight: 600;
      color: #212529;
    }

    .form-group .required {
      color: #d32f2f;
      margin-left: 2px;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 12px 16px;
      border: 2px solid #e9ecef;
      border-radius: 8px;
      font-size: 14px;
      font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      transition: all 0.3s ease;
      color: #495057;
    }

    .form-group input[type="text"]:focus,
    .form-group input[type="number"]:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-group textarea {
      resize: vertical;
      min-height: 120px;
      line-height: 1.6;
    }

    .form-group select {
      cursor: pointer;
      background-color: #ffffff;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23495057' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 12px center;
      padding-right: 40px;
      appearance: none;
    }

    .form-help {
      display: block;
      margin-top: 6px;
      font-size: 12px;
      color: #d32f2f; /* Sử dụng màu đỏ cho lỗi */
      line-height: 1.5;
      font-weight: 500;
    }

    .form-actions {
      display: flex;
      gap: 12px;
      justify-content: flex-end;
      margin-top: 32px;
      padding-top: 24px;
      border-top: 1px solid #e9ecef;
    }

    .btn-secondary {
      padding: 12px 24px;
      background: #ffffff;
      color: #495057;
      border: 2px solid #dee2e6;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-secondary:hover {
      background: #f8f9fa;
      border-color: #adb5bd;
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

      thead th,
      tbody td {
        padding: 12px 16px;
      }

      .pagination {
        padding: 16px 20px;
      }

      .form-container {
        padding: 24px 20px;
      }

      .form-actions {
        flex-direction: column-reverse;
      }

      .form-actions button {
        width: 100%;
        justify-content: center;
      }
    }
  </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <div class="container"><div class="admin-panel" id="edit-form">
    <header class="header">
     <h1 id="edit-form-title">Sửa Nhà Cung Cấp Dịch Vụ</h1>
     <p>Cập nhật thông tin nhà cung cấp dịch vụ</p>
    </header>
    <div class="form-container">
     <form action="<?=BASE_URL_ADMIN .'?act=sua-ncc-dv' ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_dichvu" value="<?= $ncc_dv['id_dichvu']?>">

      <div class="form-group">
       <label for="edit-category-name">Tên Nhà Cung Cấp Dịch Vụ <span class="required">*</span></label>
       <input type="text" id="edit-category-name" name="Name_DV" 
              value="<?= $ncc_dv['Name_DV']?>" 
              placeholder="Nhập tên nhà cung cấp dịch vụ" required>
       <?php if(isset($errors['Name_DV'])) { ?>
        <span class="form-help"><?= $errors['Name_DV'] ?></span>
       <?php }?>
      </div>
      <div class="form-actions">
       <a href="<?= BASE_URL_ADMIN . '?act=list-ncc-dv' ?>" style="text-decoration: none;">
         <button type="button" class="btn-secondary">
          <svg width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line> <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg> Hủy Bỏ 
         </button>
       </a>
       <button type="submit" class="btn-primary">
        <svg width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline>
        </svg><span id="update-button-text">Cập Nhật Nhà Cung Cấp Phương Tiện</span> 
       </button>
      </div>
     </form>
    </div>
   </div>
  </div>
  <script>
    const defaultConfig = {
      edit_form_title: "Sửa Nhà Cung Cấp Dịch Vụ",
      update_button_text: "Cập Nhật Nhà Cung Cấp Dịch Vụ"
    };

    async function onConfigChange(config) {
      const editFormTitle = document.getElementById('edit-form-title');
      const updateButtonText = document.getElementById('update-button-text');

      // Cập nhật các phần tử HTML nếu có cấu hình mới
      if (editFormTitle) {
        editFormTitle.textContent = config.edit_form_title || defaultConfig.edit_form_title;
      }

      if (updateButtonText) {
        updateButtonText.textContent = config.update_button_text || defaultConfig.update_button_text;
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
        ["edit_form_title", config.edit_form_title || defaultConfig.edit_form_title],
        ["update_button_text", config.update_button_text || defaultConfig.update_button_text]
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
