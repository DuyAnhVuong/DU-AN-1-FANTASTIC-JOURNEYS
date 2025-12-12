<!doctype html>
<html lang="vi">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý khách hàng Tour - Thêm mới</title>
  <script src="/_sdk/element_sdk.js"></script>
  <link rel="stylesheet" href="styles.css">
  <style>
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
     <h1>Quản lý khách hàng Tour</h1>
     <p>Thêm khách hàng Tour</p>
    </div>
    <form action="<?= BASE_URL_ADMIN . '?act=them-khach-hang' ?>" method="POST">
     <div class="form-grid">
      <div class="form-group full-width">
       <label for="TenKH">Tên Khách Hàng <span class="required">*</span></label> 
       <input type="text" id="TenKH" name="TenKH" placeholder="Nhập tên khách hàng">
       <?php if (isset($errors['TenKH'])) { ?>
         <p class="text-danger"><?= $errors['TenKH'] ?></p>
       <?php } ?>
      </div>

      <div class="form-group">
       <label for="CheckInStatus">Trạng Thái Cập Nhật <span class="required">*</span></label> 
       <select id="CheckInStatus" name="CheckInStatus" required> 
         <option value="0">Nhập trạng thái cập nhập</option> 
         <option value="1">Chưa đến</option> 
         <option value="2">Đã đến</option> 
         <option value="3">Vắng mặt</option> 
       </select>
      </div>

      <div class="form-group">
       <label for="ThoiGianCapNhat">Thời Gian Cập Nhật <span class="required">*</span></label> 
       <input type="date" id="ThoiGianCapNhat" name="ThoiGianCapNhat" placeholder="Thời gian cập nhật">
       <?php if (isset($errors['ThoiGianCapNhat'])) { ?>
         <p class="text-danger"><?= $errors['ThoiGianCapNhat'] ?></p>
       <?php } ?>
      </div>
     </div>
     
     <div class="form-actions">
       <button type="reset" class="btn btn-secondary">
        <svg class="btn-icon" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg> Xóa Form 
       </button> 
       <button type="submit" class="btn btn-primary">
        <svg class="btn-icon" fill="none" stroke="currentColor" viewbox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg> Submit 
       </button>
     </div>
    </form>
    </div>
  </div>
  <script>
    // Khởi tạo SDK (giữ nguyên từ layout gốc)
    const defaultConfig = {
      form_title: "Quản lý khách hàng Tour"
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

    // Thiết lập ngày giờ hiện tại cho input (tương tự như trong layout gốc)
    const now = new Date();
    const dateTimeInput = document.getElementById('ThoiGianCapNhat');
    
    // Format datetime-local value (YYYY-MM-DDTHH:MM)
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    
    // Chỉ set giá trị mặc định nếu input chưa có giá trị (ví dụ: sau khi submit form bị lỗi)
    if (!dateTimeInput.value) {
      dateTimeInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
    }
  </script>
 </body>
</html>