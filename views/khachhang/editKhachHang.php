<!doctype html>
<html lang="vi">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa Khách Hàng Tour</title>
  <script src="/_sdk/element_sdk.js"></script>
  <link rel="stylesheet" href="styles.css">
  <style>
    /* CSS Styles from the new layout */
    body {
      box-sizing: border-box;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      width: 100%;
    }

    body {
      font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
      overflow-x: hidden;
    }

    .main-wrapper {
      height: 100%;
      width: 100%;
      overflow: auto;
      padding: 40px 20px;
    }

    .form-container {
      max-width: 800px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .form-header {
      margin-bottom: 32px;
      text-align: center;
      padding-bottom: 24px;
      border-bottom: 3px solid #3b82f6;
    }

    .form-header h1 {
      font-size: 32px;
      color: #111827;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .form-header p {
      font-size: 16px;
      color: #6b7280;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin-bottom: 32px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group.full-width {
      grid-column: 1 / -1;
    }

    .form-group label {
      font-size: 15px;
      font-weight: 600;
      color: #374151;
      margin-bottom: 10px;
    }

    .form-group label .required {
      color: #ef4444;
      margin-left: 4px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      padding: 14px 16px;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      font-size: 15px;
      transition: all 0.3s ease;
      outline: none;
      font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f9fafb;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
      background: #ffffff;
    }

    .form-group textarea {
      resize: vertical;
      min-height: 100px;
    }

    .form-actions {
      display: flex;
      gap: 16px;
      justify-content: flex-end;
      padding-top: 24px;
      border-top: 2px solid #e5e7eb;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 14px 32px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn-primary {
      background: #3b82f6;
      color: #ffffff;
      box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover {
      background: #2563eb;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(59, 130, 246, 0.4);
    }

    .btn-secondary {
      background: #e5e7eb;
      color: #374151;
    }

    .btn-secondary:hover {
      background: #d1d5db;
    }

    .btn-icon {
      width: 20px;
      height: 20px;
    }
    
    .text-danger {
      color: #ef4444;
      font-size: 14px;
      margin-top: 5px;
    }

    @media (max-width: 768px) {
      .form-container {
        padding: 24px;
      }

      .form-header h1 {
        font-size: 24px;
      }

      .form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .form-actions {
        flex-direction: column;
      }

      .btn {
        width: 100%;
      }
    }
  </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <div class="main-wrapper">
   <div class="form-container">
    <div class="form-header">
     <h1>Sửa Khách Hàng Tour</h1>
     <p>Cập nhật thông tin chi tiết của khách hàng.</p>
    </div>
    
    <form action="<?= BASE_URL . '?act=sua-khach-hang' ?>" method="POST" enctype="multipart/form-data">
     <div class="form-grid">
       
      <input type="hidden" name="DSSK_ID" value="<?= $khachHang['DSSK_ID'] ?? '' ?>">

      <div class="form-group full-width">
       <label for="TenKH">Tên Khách Hàng <span class="required">*</span></label> 
       <input type="text" id="TenKH" name="TenKH" placeholder="Nhập tên khách hàng" value="<?= $khachHang['TenKH'] ?? '' ?>">
       <?php if (isset($errors['TenKH'])) { ?>
         <p class="text-danger"><?= $errors['TenKH'] ?></p>
       <?php } ?>
      </div>

      <div class="form-group">
       <label for="CheckInStatus">Trạng Thái Cập Nhật <span class="required">*</span></label> 
       <select id="CheckInStatus" name="CheckInStatus" required> 
         <option value="1" <?= (isset($khachHang['CheckInStatus']) && $khachHang['CheckInStatus'] == 1) ? 'selected' : '' ?>>Chưa đến</option>
         <option value="2" <?= (isset($khachHang['CheckInStatus']) && $khachHang['CheckInStatus'] == 2) ? 'selected' : '' ?>>Đã đến</option>
         <option value="3" <?= (isset($khachHang['CheckInStatus']) && $khachHang['CheckInStatus'] == 3) ? 'selected' : '' ?>>Vắng mặt</option> 
       </select>
      </div>

      <div class="form-group">
       <label for="ThoiGianCapNhat">Thời Gian Cập Nhật <span class="required">*</span></label> 
       <input type="text" id="ThoiGianCapNhat" name="ThoiGianCapNhat" placeholder="Nhập thời gian cập nhật" value="<?= $khachHang['ThoiGianCapNhat'] ?? '' ?>">
       <?php if (isset($errors['ThoiGianCapNhat'])) { ?>
         <p class="text-danger"><?= $errors['ThoiGianCapNhat'] ?></p>
       <?php } ?>
      </div>
     </div>
     
     <div class="form-actions">
       <button type="button" class="btn btn-secondary" onclick="window.history.back()">
        <svg class="btn-icon" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg> Hủy Bỏ 
       </button> 
       <button type="submit" class="btn btn-primary">
        <svg class="btn-icon" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
        </svg> Cập Nhật 
       </button>
     </div>
    </form>
   </div>
  </div>
  <script>
    const defaultConfig = {
      form_title: "Sửa Khách Hàng Tour"
    };

    async function onConfigChange(config) {
      const titleElement = document.querySelector('.form-header h1');
      if (titleElement) {
        titleElement.textContent = config.form_title || defaultConfig.form_title;
      }
    }

    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange,
        mapToCapabilities: (config) => ({
          recolorables: [],
          borderables: [],
          fontEditable: undefined,
          fontSizeable: undefined
        }),
        mapToEditPanelValues: (config) => new Map([
          ["form_title", config.form_title || defaultConfig.form_title]
        ])
      });
    }

    // Ghi chú: Logic set ngày/giờ mặc định bằng JS đã bị loại bỏ vì form này là form SỬA, 
    // và giá trị phải được lấy từ PHP ($khachHang['ThoiGianCapNhat']).
  </script>
 </body>
</html>