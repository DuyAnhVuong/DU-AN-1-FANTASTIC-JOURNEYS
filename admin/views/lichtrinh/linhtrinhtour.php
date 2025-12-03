<!doctype html>
<html lang="vi">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Lịch Trình Tour</title>
  <style>
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100%;
      padding: 40px 20px;
    }

    * {
      box-sizing: border-box;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      padding: 40px;
    }

    .page-header {
      text-align: center;
      margin-bottom: 40px;
      padding-bottom: 30px;
      border-bottom: 2px solid #e2e8f0;
    }

    .page-title {
      font-size: 36px;
      font-weight: 700;
      color: #2d3748;
      margin: 0 0 10px 0;
    }

    .page-subtitle {
      font-size: 16px;
      color: #718096;
      margin: 0;
    }

    .section {
      margin-bottom: 40px;
    }

    .section-title {
      font-size: 24px;
      font-weight: 700;
      color: #2d3748;
      margin: 0 0 20px 0;
      padding-bottom: 10px;
      border-bottom: 3px solid #667eea;
      display: inline-block;
    }

    .tour-image {
      width: 100%;
      max-width: 600px;
      border-radius: 15px;
      overflow: hidden;
      margin: 20px 0;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .tour-image img {
      width: 100%;
      height: auto;
      display: block;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .info-item {
      background: #f7fafc;
      padding: 20px;
      border-radius: 12px;
      border-left: 4px solid #667eea;
    }

    .info-label {
      font-size: 13px;
      font-weight: 600;
      color: #718096;
      text-transform: uppercase;
      margin-bottom: 8px;
    }

    .info-value {
      font-size: 16px;
      font-weight: 600;
      color: #2d3748;
    }
    
    .description-value {
        font-size: 16px;
        font-weight: 500;
        color: #2d3748;
    }

    .info-value.price {
      font-size: 24px;
      color: #667eea;
    }

    .description-box {
      background: #f7fafc;
      padding: 20px;
      border-radius: 12px;
      line-height: 1.8;
      color: #4a5568;
      margin-top: 15px;
      white-space: pre-wrap; /* Giữ định dạng dòng mới nếu có */
    }
    
    .policy-box {
        background: #f7fafc;
        padding: 20px;
        border-radius: 12px;
        line-height: 1.8;
        color: #4a5568;
        margin-top: 15px;
    }

    .itinerary-list {
      margin-top: 20px;
    }

    .itinerary-item {
      background: #f7fafc;
      padding: 25px;
      border-radius: 12px;
      margin-bottom: 20px;
      border-left: 5px solid #667eea;
      transition: all 0.3s ease;
    }

    .itinerary-item:hover {
      transform: translateX(5px);
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
    }

    .itinerary-day {
      font-size: 20px;
      font-weight: 700;
      color: #667eea;
      margin-bottom: 15px;
    }

    .itinerary-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
      margin-bottom: 15px;
    }

    .itinerary-field {
      font-size: 14px;
    }

    .itinerary-field strong {
      color: #4a5568;
      display: block;
      margin-bottom: 5px;
    }

    .itinerary-field span {
      color: #2d3748;
      font-weight: 500;
    }

    .itinerary-activity {
      margin-top: 15px;
      padding-top: 15px;
      border-top: 1px solid #e2e8f0;
    }

    .itinerary-activity strong {
      color: #4a5568;
      display: block;
      margin-bottom: 8px;
    }

    .itinerary-activity p {
      color: #2d3748;
      line-height: 1.6;
      margin: 0;
      white-space: pre-wrap;
    }

    .provider-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }

    .provider-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 25px;
      border-radius: 12px;
      color: #ffffff;
    }

    .provider-card-title {
      font-size: 14px;
      font-weight: 600;
      opacity: 0.9;
      margin-bottom: 8px;
    }

    .provider-card-value {
      font-size: 18px;
      font-weight: 700;
    }

    .action-buttons {
      display: flex;
      gap: 15px;
      margin-top: 40px;
      padding-top: 30px;
      border-top: 2px solid #e2e8f0;
      flex-wrap: wrap;
    }

    .btn {
      padding: 14px 30px;
      border: none;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      text-decoration: none;
    }

    .btn-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #ffffff;
      flex: 1;
      min-width: 150px;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-danger {
      background: #f56565;
      color: #ffffff;
    }

    .btn-danger:hover {
      background: #e53e3e;
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(245, 101, 101, 0.4);
    }

    .btn-secondary {
      background: #e2e8f0;
      color: #4a5568;
    }

    .btn-secondary:hover {
      background: #cbd5e0;
      transform: translateY(-3px);
    }
    
    .text-muted {
        color: #718096;
        font-style: italic;
        margin-top: 10px;
    }

    @media (max-width: 768px) {
      .container {
        padding: 30px 20px;
      }

      .page-title {
        font-size: 28px;
      }

      .action-buttons {
        flex-direction: column;
      }

      .btn {
        width: 100%;
      }
    }
  </style>
 </head>
 <body>
  <main class="container">
   <header class="page-header">
    <h1 class="page-title">Chi Tiết Lịch Trình Tour</h1>
    <p class="page-subtitle">Thông tin đầy đủ về tour du lịch</p>
   </header>
    
   <section class="section">
    <h2 class="section-title">📋 Thông Tin Tour</h2>
    <div class="info-grid">
     <div class="info-item">
      <div class="info-label">Tên Tour</div>
      <div class="info-value"><?= $tour['TenTour'] ?></div>
     </div>
     <div class="info-item">
      <div class="info-label">Giá Tour</div>
      <div class="info-value price"><?= number_format($tour['Gia'], 0, ',', '.') ?> VNĐ</div>
     </div>
     <div class="info-item">
      <div class="info-label">Ngày Tạo</div>
      <div class="info-value"><?= date('d/m/Y', strtotime($tour['NgayTao'])) ?></div>
     </div>
     <div class="info-item">
      <div class="info-label">Loại Tour</div>
      <div class="info-value"><?= $tour['TenTour'] ?></div>
     </div>
        
    <div class="info-item" style="grid-column: span 2;">
        <div class="info-label">Mô tả</div>
        <div class="description-value"><?= $tour['MoTa'] ?></div>
    </div>
        
    </div>
    
        <div>
     <h3 style="font-size: 18px; color: #2d3748; margin: 20px 0 10px 0;">Chính Sách</h3>
     <div class="policy-box">
      <p>Hủy trước 7 ngày: hoàn 100%</p>
       <p>Hủy trong 7 ngày: hoàn 50%</p>
     </div>
    </div>
    
    <div class="tour-image">
        <h3 style="font-size: 18px; color: #2d3748; margin: 20px 0 10px 0;">Hình ảnh tour</h3>
        <img src="<?= BASE_URL . $tour['Image'] ?>" alt="Hình ảnh Tour" style="width: 100%; height: auto; border-radius: 12px;">
    </div>

   </section>
    
       <section class="section">
    <h2 class="section-title">🗓️ Lịch Trình Chi Tiết</h2>
    <div class="itinerary-list">
        <?php if (!empty($lichtrinh)): ?>
            <?php foreach ($lichtrinh as $item): ?>
                <div class="itinerary-item">
                  <div class="itinerary-day">
                    📍 Ngày: <?= $item['Ngay'] ?>
                  </div>
                  <div class="itinerary-details">
                    <div class="itinerary-field"><strong>Thời gian:</strong> <span><?= $item['ThoiGian'] ?></span></div>
                  </div>
                  <div class="itinerary-activity"><strong>Điểm đến:</strong>
                    <p><?= $item['DiemThamQuan'] ?></p>
                  </div>
                    <div class="itinerary-activity"><strong>Hoạt động:</strong>
                    <p><?= $item['HoatDong'] ?></p>
                  </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Không có lịch trình nào cho tour này.</p>
        <?php endif; ?>
    </div>
   </section>

       <section class="section">
    <h2 class="section-title">🏢 Thông Tin Nhà Cung Cấp</h2>
    <div class="provider-grid">
     <div class="provider-card">
      <div class="provider-card-title">
       👥 NHÀ CUNG CẤP
      </div>
      <div class="provider-card-value">
       XYZ Travel
      </div>
     </div>
     <div class="provider-card">
      <div class="provider-card-title">
       🏨 KHÁCH SẠN
      </div>
      <div class="provider-card-value">
       Sunrise Hotel 4*
      </div>
     </div>
     <div class="provider-card">
      <div class="provider-card-title">
       🚌 PHƯƠNG TIỆN
      </div>
      <div class="provider-card-value">
       Xe giường nằm / Máy bay
      </div>
     </div>
    </div>
   </section>

       <div class="action-buttons">
        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-tour&id=' . $tour['TourID'] ?>" class="btn btn-primary">
            💾 Chỉnh Sửa Tour
        </a>
        <a href="<?= BASE_URL_ADMIN . '?act=xoa-tour&id=' . $tour['TourID'] ?>" onclick="return confirm('Bạn có đồng ý xóa tour này không?')" class="btn btn-danger">
            🗑️ Xóa Tour
        </a>
        <a href="<?= BASE_URL_ADMIN . '?act=tour' ?>" class="btn btn-secondary">
            ⬅️ Quay Lại
        </a>
   </div>
  </main>
</body>

</html>