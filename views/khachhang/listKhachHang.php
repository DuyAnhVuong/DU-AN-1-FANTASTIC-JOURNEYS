
<!doctype html>
<html lang="vi">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Quản lý khách hàng Tour - Check-In Layout</title>
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
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
   overflow-x: hidden;
  }

  .main-wrapper {
   height: 100%;
   width: 100%;
   overflow: auto;
   padding: 40px 20px;
  }

  .container {
   max-width: 1200px;
   margin: 0 auto;
  }

  .header {
   text-align: center;
   margin-bottom: 40px;
  }

  .header h1 {
   color: #ffffff;
   font-size: 48px;
   font-weight: 700;
   margin-bottom: 10px;
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
  }

  .header p {
   color: #f0f0f0;
   font-size: 18px;
  }

  .search-section {
   background: #ffffff;
   border-radius: 16px;
   padding: 24px;
   margin-bottom: 30px;
   box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  }

  .search-box {
   position: relative;
  }

  .search-icon {
   position: absolute;
   left: 16px;
   top: 50%;
   transform: translateY(-50%);
   color: #9ca3af;
   width: 20px;
   height: 20px;
  }

  .search-input {
   width: 100%;
   padding: 16px 16px 16px 48px;
   border: 2px solid #e5e7eb;
   border-radius: 12px;
   font-size: 16px;
   transition: all 0.3s ease;
   outline: none;
  }

  .search-input:focus {
   border-color: #667eea;
   box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
  }

  .checkin-list {
   background: #ffffff;
   border-radius: 16px;
   padding: 24px;
   box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  }

  .list-title-section {
   display: flex;
   justify-content: space-between;
   align-items: center;
   margin-bottom: 24px;
   padding-bottom: 16px;
   border-bottom: 2px solid #e5e7eb;
  }

  .list-title-section h2 {
   font-size: 24px;
   color: #111827;
   font-weight: 700;
  }

  .btn-add {
   display: inline-flex;
   align-items: center;
   gap: 8px;
   padding: 12px 24px;
   background: #667eea;
   color: #ffffff;
   border: none;
   border-radius: 10px;
   font-size: 16px;
   font-weight: 600;
   cursor: pointer;
   transition: all 0.3s ease;
   box-shadow: 0 4px 6px rgba(102, 126, 234, 0.3);
      text-decoration: none;
  }

  .btn-add:hover {
   background: #5568d3;
   transform: translateY(-2px);
   box-shadow: 0 6px 12px rgba(102, 126, 234, 0.4);
  }

  .btn-icon {
   width: 20px;
   height: 20px;
  }

  .list-header {
   display: grid;
   /* STT | Khách hàng (1fr) | Cập nhật (200px) | Trạng thái (180px) | Thao tác (150px) */
   grid-template-columns: 50px 1fr 200px 180px 150px;
   gap: 16px;
   padding: 16px;
   background: #f9fafb;
   border-radius: 12px;
   margin-bottom: 16px;
   font-weight: 600;
   color: #374151;
  }

  .checkin-item {
   display: grid;
   grid-template-columns: 50px 1fr 200px 180px 150px;
   gap: 16px;
   padding: 20px 16px;
   border-bottom: 1px solid #e5e7eb;
   align-items: center;
   transition: all 0.3s ease;
  }

  .checkin-item:last-child {
   border-bottom: none;
  }

  .checkin-item:hover {
   background: #f9fafb;
   transform: translateX(4px);
  }

  .item-number {
   font-weight: 600;
   color: #6b7280;
   font-size: 18px;
  }

  .customer-info {
   display: flex;
   flex-direction: column;
   gap: 4px;
  }

  .customer-name {
   font-size: 18px;
   font-weight: 600;
   color: #111827;
  }

  .customer-id {
   font-size: 14px;
   color: #6b7280;
  }

  .checkin-time {
   display: flex;
   flex-direction: column;
   gap: 4px;
  }

  .time-label {
   font-size: 12px;
   color: #6b7280;
   text-transform: uppercase;
   letter-spacing: 0.5px;
  }

  .time-value {
   font-size: 16px;
   color: #111827;
   font-weight: 500;
  }

  .status-badge {
   display: inline-flex;
   align-items: center;
   justify-content: center;
   padding: 8px 16px;
   border-radius: 20px;
   font-size: 14px;
   font-weight: 600;
   text-transform: uppercase;
   letter-spacing: 0.5px;
   white-space: nowrap; /* Ngăn chặn trạng thái bị xuống dòng */
   width: fit-content;
  }
    
    /* Các style trạng thái được định nghĩa */
  .status-checked-in {
   background: #d1fae5;
   color: #065f46;
  }

  .status-pending {
   background: #fef3c7;
   color: #92400e;
  }

  .status-cancelled {
   background: #fee2e2;
   color: #991b1b;
  }
    
    /* Màu nền cho các trạng thái cập nhật (để phân biệt) */
    .status-updated {
        background: #e9d5ff; /* Màu tím nhạt */
        color: #7c3aed; /* Màu tím đậm */
        font-size: 13px;
        font-weight: 500;
    }

  .action-buttons {
   display: flex;
   gap: 8px;
   flex-wrap: wrap;
  }

  .btn-action {
      display: inline-flex;
      align-items: center;
      justify-content: center;
   padding: 8px 10px;
   font-size: 13px;
   font-weight: 600;
   border: none;
   border-radius: 8px;
   cursor: pointer;
   transition: all 0.3s ease;
      text-decoration: none;
  }

  .btn-edit {
   background: #f59e0b;
   color: #ffffff;
  }

  .btn-delete {
   background: #dc3545;
   color: #ffffff;
  }

  .btn-icon-small {
   width: 16px;
   height: 16px;
  }
    
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        grid-column: 1 / -1;
        color: #6b7280;
    }
    .empty-icon {
        font-size: 48px;
        margin-bottom: 8px;
    }

  @media (max-width: 768px) {
   .header h1 {
    font-size: 32px;
   }

   .list-title-section {
    flex-direction: column;
    gap: 16px;
    align-items: stretch;
   }

   .list-title-section h2 {
    font-size: 20px;
   }

   .btn-add {
    justify-content: center;
   }

   .list-header {
    display: none;
   }

   .checkin-item {
    grid-template-columns: 1fr;
    gap: 12px;
    padding: 20px;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    margin-bottom: 12px;
   }

   .checkin-item:last-child {
    border-bottom: 1px solid #e5e7eb;
   }

   .item-number {
    display: none;
   }

   .status-badge {
    justify-self: start;
   }

   .action-buttons {
    justify-content: flex-start;
   }
  }
 </style>
 <style>@view-transition { navigation: auto; }</style>
 <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
 <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
</head>
<body>
 <div class="main-wrapper">
 <div class="container">
  <header class="header">
  <h1>Quản lý khách hàng Tour</h1>
  <p>Danh sách khách hàng đăng ký tour</p>
  </header>
  
  <div class="checkin-list">
  <div class="list-title-section">
   <h2>Danh sách khách hàng</h2>
   <a href="<?= BASE_URL . '?act=form-them-khach-hang' ?>" class="btn-add">
   <svg class="btn-icon" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
   </svg> Thêm khách hàng 
   </a>
  </div>
  <div class="list-header">
   <div>
   ID
   </div>
   <div>
   Thông tin khách hàng
   </div>
   <div>
   Cập nhật cuối
   </div>
   <div>
   Trạng thái Check-In
   </div>
   <div>
   Hành động
   </div>
  </div>
  
    <?php
    // Kiểm tra nếu $listKhachHang là mảng và không rỗng
    if (!empty($listKhachHang) && is_array($listKhachHang)):
      foreach ($listKhachHang as $key => $khachHang):
        
        // Xác định class CSS cho CheckInStatus
        $checkInStatus = trim(mb_strtolower($khachHang['CheckInStatus'], 'UTF-8'));
        $statusClass = 'status-pending';

        if (strpos($checkInStatus, 'đã check-in') !== false || strpos($checkInStatus, 'check-in') !== false) {
          $statusClass = 'status-checked-in';
        } elseif (strpos($checkInStatus, 'đã hủy') !== false || strpos($checkInStatus, 'cancelled') !== false) {
          $statusClass = 'status-cancelled';
        } else {
                    $statusClass = 'status-pending';
                }
        ?>
   <div class="checkin-item">
   <div class="item-number">
    <?= $khachHang['DSSK_ID'] ?>
   </div>
   <div class="customer-info">
    <div class="customer-name">
    <?= $khachHang['TenKH'] ?>
    </div>
    <div class="customer-id">
    ID Khách hàng: **<?= $khachHang['DSSK_ID'] ?>**
    </div>
   </div>
   <div class="checkin-time">
    <div class="time-label">
    Thời gian cập nhật:
    </div>
    <div class="time-value status-updated">
    <?= $khachHang['TTCapNhat'] ?>
    </div>
   </div>
   <div><span class="status-badge <?= $statusClass ?>">
    <?= $khachHang['CheckInStatus'] ?>
   </span>
   </div>
    <div class="action-buttons">
      <a href="<?= BASE_URL . '?act=form-sua-khach-hang&id_khach_hang=' . $khachHang['DSSK_ID'] ?>"
        class="btn-action btn-edit">
        <svg class="btn-icon-small" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg> Sửa 
      </a>
      <a href="<?= BASE_URL . '?act=xoa-khach-hang&id_khach_hang=' . $khachHang['DSSK_ID'] ?>"
        onclick="return confirm('Bạn có đồng ý xóa khách hàng <?= $khachHang['TenKH'] ?> hay không?')"
        class="btn-action btn-delete">
        Xóa
      </a>
    </div>
   </div>
    <?php
      endforeach;
    else:
    ?>
    <div class="checkin-item">
      <div class="empty-state">
        <div class="empty-icon">⚠️</div>
        <p class="empty-text">Không tìm thấy khách hàng Tour nào.</p>
      </div>
    </div>
    <?php endif; ?>
  </div>
 </div>
 </div>
<?php
// Đây là nơi bạn đặt footer nếu bạn muốn giữ lại cấu trúc AdminLTE footer
// include './views/layout/footer.php'; 
?>
<script>
 // Giữ lại script nếu bạn có JS cần thiết, nhưng loại bỏ phần DataTables không còn phù hợp
</script>

</body>
</html>