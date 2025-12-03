<?php
// CẦN ĐẢM BẢO CÁC BIẾN NÀY ĐÃ ĐƯỢC ĐỊNH NGHĨA TRƯỚC KHI CHẠY (MOCK DATA VÀ BASE URL)
// Vui lòng thay thế các giá trị Mock Data trong phần Logic xử lý của bạn nếu cần
if (!isset($listHuongDanVien)) {
  // Dữ liệu giả định nếu chưa có
  $listHuongDanVien = [
    [
      'HDVID' => 1,
      'TenDangNhap' => 'HDV_A',
      'HoTen' => 'Nguyễn Văn A',
      'SDT' => '0901234567',
      'Avatar' => 'assets/images/guide_a.jpg', // Thay thế bằng URL ảnh thật
      'NgaySinh' => '1990-01-15',
      'Email' => 'hdv.a@example.com',
      'ChungChi' => 'Chứng chỉ Vàng',
      'NgonNgu' => 'Tiếng Anh, Tiếng Pháp',
      'KinhNghiem' => '5 năm',
      'PhanLoai' => 'Chuyên Gia'
    ],
    // ... thêm các HDV khác ...
  ];
}

// Giả định các biến thống kê đã được tính toán (tôi đặt giá trị mặc định để hiển thị)
$tong_hdv = isset($listHuongDanVien) ? count($listHuongDanVien) : 0;
$hdv_hoat_dong = 3; // Giả định
$hdv_chuyen_gia = 1; // Giả định
$hdv_chung_chi_vang = 1; // Giả định

?>

<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Hướng Dẫn Viên</title>
  <style>
    /* CSS được cung cấp trong Layout mới */
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      width: 100%;
      height: 100%;
      min-height: 100vh;
      /* Đảm bảo đủ chiều cao */
    }

    .app-wrapper {
      width: 100%;
      min-height: 100%;
      padding: 40px 20px;
    }

    .main-container {
      max-width: 1600px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      position: relative;
    }

    .back-button {
      position: absolute;
      top: 24px;
      left: 24px;
      padding: 10px 20px;
      background-color: rgba(255, 255, 255, 0.2);
      color: #ffffff;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      z-index: 10;
      text-decoration: none;
      /* Thêm để link trông giống button */
    }

    .back-button:hover {
      background-color: rgba(255, 255, 255, 0.3);
      border-color: rgba(255, 255, 255, 0.5);
      transform: translateX(-4px);
    }

    .page-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 32px 40px;
      color: #ffffff;
      position: relative;
    }

    .page-title {
      font-size: 32px;
      font-weight: 700;
      margin: 0 0 8px 0;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
    }

    .page-subtitle {
      font-size: 16px;
      opacity: 0.9;
      margin: 0 0 16px 0;
      text-align: center;
    }

    .stats-container {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 20px;
    }

    .stat-card {
      background-color: rgba(255, 255, 255, 0.15);
      padding: 16px 24px;
      border-radius: 10px;
      text-align: center;
      min-width: 140px;
    }

    .stat-number {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 4px;
    }

    .stat-label {
      font-size: 13px;
      opacity: 0.9;
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
      color: #6c757d;
      /* Thêm màu */
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
      /* Thêm để link trông giống button */
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
      padding: 0 40px 24px 40px;
      /* Thêm padding cho wrapper */
      overflow-x: auto;
    }

    .guide-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
      min-width: 1000px;
      /* Đảm bảo bảng không quá nhỏ */
    }

    .guide-table thead {
      background-color: #f8f9fa;
      border-bottom: 2px solid #dee2e6;
    }

    .guide-table th {
      padding: 16px 12px;
      text-align: left;
      font-weight: 600;
      color: #495057;
      white-space: nowrap;
    }

    .guide-table tbody tr {
      border-bottom: 1px solid #e9ecef;
      transition: background-color 0.2s;
    }

    .guide-table tbody tr:hover {
      background-color: #f8f9fa;
    }

    .guide-table td {
      padding: 16px 12px;
      color: #212529;
      vertical-align: middle;
      white-space: nowrap;
      /* Giữ nội dung không bị ngắt dòng */
    }

    .avatar-img {
      width: 60px;
      /* Điều chỉnh kích thước ảnh phù hợp */
      height: 40px;
      object-fit: cover;
      border-radius: 6px;
    }

    /* Classes Badge và Lang-tag tương tự như layout mới */
    .badge {
      display: inline-block;
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 11px;
      font-weight: 600;
      white-space: nowrap;
    }

    .badge-gold {
      background-color: #fff3cd;
      color: #856404;
    }

    .badge-silver {
      background-color: #e2e3e5;
      color: #41464b;
    }

    .badge-bronze {
      background-color: #f8d7da;
      color: #842029;
    }

    .badge-expert {
      background-color: #d1e7dd;
      color: #0f5132;
    }

    .badge-intermediate {
      background-color: #cfe2ff;
      color: #084298;
    }

    .badge-beginner {
      background-color: #e2e3e5;
      color: #41464b;
    }


    .languages {
      display: flex;
      flex-wrap: wrap;
      gap: 4px;
    }

    .lang-tag {
      background-color: #667eea;
      color: #ffffff;
      padding: 3px 8px;
      border-radius: 4px;
      font-size: 11px;
      font-weight: 600;
    }

    .action-buttons {
      display: flex;
      gap: 8px;
    }

    /* Icon buttons */
    .icon-button {
      padding: 8px 12px;
      border: none;
      background: none;
      cursor: pointer;
      border-radius: 6px;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      text-decoration: none;
      /* Thêm để link trông giống button */
    }

    .icon-button:hover {
      background-color: #e9ecef;
      transform: scale(1.1);
    }

    .btn-edit-icon {
      color: #0c5ea8;
    }

    .btn-delete-icon {
      color: #dc3545;
    }

    .btn-edit-icon:hover {
      background-color: #cfe2ff;
    }

    .btn-delete-icon:hover {
      background-color: #f8d7da;
    }

    .pagination-section {
      padding: 24px 40px;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      background-color: #f8f9fa;
      border-top: 1px solid #e9ecef;
    }

    .btn-back-footer {
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      background-color: #6c757d;
      color: #ffffff;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-back-footer:hover {
      background-color: #5a6268;
    }

    /* Media Queries */
    @media (max-width: 768px) {
      .back-button {
        top: 12px;
        left: 12px;
        padding: 8px 16px;
        font-size: 13px;
      }

      .page-header {
        padding: 48px 20px 24px 20px;
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

      .table-wrapper {
        padding: 16px 20px;
      }

      .guide-table {
        font-size: 11px;
      }

      .guide-table th,
      .guide-table td {
        padding: 12px 6px;
      }

      .pagination-section {
        padding: 16px 20px;
        justify-content: center;
      }
    }
  </style>
</head>

<body>
  <div class="app-wrapper">
    <div class="main-container">
      <a href="<?= BASE_URL_ADMIN ?>" class="back-button">
        <span>◀</span> <span>Quay Lại</span>
      </a>

      <header class="page-header">
        <h1 class="page-title" id="pageTitle">
          <span>🎯</span>
          <span>Quản Lý Hướng Dẫn Viên</span>
        </h1>
        <p class="page-subtitle">Quản lý thông tin và đánh giá hướng dẫn viên du lịch</p>

        <div class="stats-container">
          <div class="stat-card">
            <div class="stat-number">
              <?= $tong_hdv ?>
            </div>
            <div class="stat-label">
              Tổng HDV
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-number">
              <?= $hdv_hoat_dong ?>
            </div>
            <div class="stat-label">
              Đang Hoạt Động
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-number">
              <?= $hdv_chuyen_gia ?>
            </div>
            <div class="stat-label">
              Chuyên Gia
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-number">
              <?= $hdv_chung_chi_vang ?>
            </div>
            <div class="stat-label">
              Chứng Chỉ Vàng
            </div>
          </div>
        </div>
      </header>

      <div class="toolbar-section">
        <div class="search-container">
          <span class="search-icon">🔍</span>
          <input type="text" class="search-field" id="searchInput" placeholder="Tìm kiếm hướng dẫn viên...">
        </div>

        <a href="<?= BASE_URL_ADMIN . '?act=form-them-huongdanvien' ?>" class="action-button btn-add">
          <span>➕</span> <span>Thêm Hướng Dẫn Viên</span>
        </a>
      </div>

      <div class="table-wrapper">
        <table class="guide-table">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên Đăng Nhập</th>
              <th>Họ Tên & SĐT</th>
              <th>Avatar</th>
              <th>Ngày Sinh</th>
              <th>Email</th>
              <th>Chứng Chỉ</th>
              <th>Ngôn Ngữ</th>
              <th>Kinh Nghiệm</th>
              <th>Phân Loại</th>
              <th>Hành Động</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Kiểm tra lần nữa trước khi lặp để đảm bảo an toàn
            if (!empty($listHuongDanVien)):
              foreach ($listHuongDanVien as $key => $hdv):
                // Lấy các giá trị và gán class badge dựa trên giá trị
                $chungChi = $hdv['ChungChi'] ?? '';
                $badgeClass = '';
                if (stripos($chungChi, 'vàng') !== false)
                  $badgeClass = 'badge-gold';
                else if (stripos($chungChi, 'bạc') !== false)
                  $badgeClass = 'badge-silver';
                else if (stripos($chungChi, 'đồng') !== false)
                  $badgeClass = 'badge-bronze';
                else
                  $badgeClass = 'badge-beginner';

                $phanLoai = $hdv['PhanLoai'] ?? '';
                $phanLoaiClass = '';
                if (stripos($phanLoai, 'chuyên gia') !== false)
                  $phanLoaiClass = 'badge-expert';
                else if (stripos($phanLoai, 'trung cấp') !== false)
                  $phanLoaiClass = 'badge-intermediate';
                else
                  $phanLoaiClass = 'badge-beginner';
                ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><strong><?= $hdv['TenDangNhap'] ?></strong></td>
                  <td><?= $hdv['HoTen'] ?><br>(<?= $hdv['SDT'] ?>)</td>
                  <td>
                    <img src="<?= BASE_URL . $hdv['Avatar'] ?>" class="avatar-img" alt="Avatar">
                  </td>
                  <td><?= $hdv['NgaySinh'] ?></td>
                  <td><?= $hdv['Email'] ?></td>

                  <td>
                    <span class="badge <?= $badgeClass ?>"><?= $chungChi ?></span>
                  </td>

                  <td>
                    <div class="languages">
                      <?php
                      $ngonNgu = explode(',', $hdv['NgonNgu'] ?? '');
                      foreach ($ngonNgu as $nn) {
                        $nn = trim($nn);
                        if (!empty($nn)) {
                          echo '<span class="lang-tag">' . strtoupper($nn) . '</span>';
                        }
                      }
                      ?>
                    </div>
                  </td>

                  <td><?= $hdv['KinhNghiem'] ?></td>

                  <td>
                    <span class="badge <?= $phanLoaiClass ?>"><?= $phanLoai ?></span>
                  </td>

                  <td>
                    <div class="action-buttons">
                      <a href="<?= BASE_URL_ADMIN . '?act=form-sua-huongdanvien&id=' . $hdv['HDVID'] ?>"
                        class="icon-button btn-edit-icon" title="Chỉnh sửa">
                        ✏️
                      </a>
                      <a href="<?= BASE_URL_ADMIN . '?act=xoa-huongdanvien&id_huongdanvien=' . $hdv['HDVID'] ?>"
                        class="icon-button btn-delete-icon" title="Xóa"
                        onclick="return confirm('Bạn có đồng ý xóa HDV <?= $hdv['HoTen'] ?> hay không')">
                        🗑️
                      </a>
                    </div>
                  </td>
                </tr>
                <?php
              endforeach;
            else:
              ?>
              <tr>
                <td colspan="11" style="text-align: center; color: #dc3545; padding: 20px;">
                  Không tìm thấy dữ liệu Hướng Dẫn Viên nào.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <div class="pagination-section">
        <a href="<?= BASE_URL_ADMIN ?>" class="btn-back-footer">
          <span>◀</span> <span>Quay lại trang chính</span>
        </a>
      </div>
    </div>
  </div>
</body>

</html>