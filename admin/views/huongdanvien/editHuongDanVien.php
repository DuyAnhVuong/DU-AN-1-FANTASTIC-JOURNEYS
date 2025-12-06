<?php
// Tùy chọn: Bao gồm các file layout nếu cần trong môi trường thực tế
// require './views/layout/header.php'; 
// include './views/layout/navbar.php'; 
// include './views/layout/sidebar.php'; 

// Giả định $huongdanvien và $listTaiKhoan đã được truyền từ controller
// Nếu cần, bạn có thể định nghĩa dữ liệu giả để kiểm tra giao diện:
/*
$huongdanvien = [
  'HDVID' => 1,
  'TaiKhoanID' => 2,
  'HoTen' => 'Nguyễn Văn A',
  'NgaySinh' => '1990-05-15',
  'SDT' => '0901234567',
  'Email' => 'nguyenvana@tourguide.com',
  'Avatar' => 'avatar-current.jpg',
  'ChungChi' => 'Chứng Chỉ Vàng', // GIÁ TRỊ MOCK CỦA CHỨNG CHỈ
  'KinhNghiem' => 'Hơn 8 năm kinh nghiệm dẫn tour...',
  'NgonNgu' => 'Tiếng Việt;Tiếng Anh;Tiếng Nhật',
  'PhanLoai' => '⭐ Hướng Dẫn Viên Cao Cấp',
];
$listTaiKhoan = [
  ['TaiKhoanID' => 1, 'TenDangNhap' => 'admin'],
  ['TaiKhoanID' => 2, 'TenDangNhap' => 'nguyenvana'],
  ['TaiKhoanID' => 3, 'TenDangNhap' => 'tranvanb'],
];
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
// $_SESSION['error'] = ['HoTen' => 'Họ tên không được để trống']; // Dữ liệu lỗi giả
*/

// 🎯 BỔ SUNG: DANH SÁCH LỰA CHỌN CHỨNG CHỈ 🎯
$listChungChiOptions = [
    'Chứng Chỉ Vàng',
    'Chứng Chỉ Bạc',
    'Chứng Chỉ Đồng',
    'Chưa Có Chứng Chỉ',
];

// Lấy giá trị chứng chỉ hiện tại của HDV để so sánh
$currentChungChi = $huongdanvien['ChungChi'] ?? '';
?>
<!doctype html>
<html lang="vi">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Sửa Hướng Dẫn Viên - <?= $huongdanvien['HoTen'] ?? 'Đang tải...' ?></title>
 <style>
  /* CSS BẠN CUNG CẤP */
  body {
 box-sizing: border-box;
 margin: 0;
 padding: 0;
 font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
 width: 100%;
 height: 100%;
 min-height: 100%;
  }

  .form-wrapper {
 width: 100%;
 padding: 40px 20px;
 display: flex;
 align-items: flex-start;
 justify-content: center;
  }

  .form-container {
 width: 100%;
 max-width: 1000px;
 background-color: #ffffff;
 border-radius: 16px;
 box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
 overflow: hidden;
 position: relative;
  }

  .back-button {
 position: absolute;
 top: 20px;
 left: 20px;
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
 border-style: solid;
  }

  .back-button:hover {
 background-color: rgba(255, 255, 255, 0.3);
 border-color: rgba(255, 255, 255, 0.5);
 transform: translateX(-4px);
  }

  .form-header {
 background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
 padding: 32px 40px;
 color: #ffffff;
 text-align: center;
  }

  .form-title {
 font-size: 28px;
 font-weight: 700;
 margin: 0 0 8px 0;
 display: flex;
 align-items: center;
 justify-content: center;
 gap: 12px;
  }

  .form-subtitle {
 font-size: 14px;
 opacity: 0.9;
 margin: 0;
  }

  .form-body {
 padding: 40px;
  }

  .guide-card {
 background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
 border-left: 4px solid #f59e0b;
 padding: 16px 20px;
 border-radius: 8px;
 margin-bottom: 32px;
 display: flex;
 align-items: flex-start;
 gap: 12px;
  }

  .guide-card-icon {
 font-size: 24px;
 flex-shrink: 0;
  }

  .guide-card-content {
 flex: 1;
  }

  .guide-card-title {
 font-size: 15px;
 font-weight: 700;
 color: #78350f;
 margin: 0 0 6px 0;
  }

  .guide-card-text {
 font-size: 13px;
 color: #92400e;
 margin: 0;
 line-height: 1.5;
  }

  .form-grid {
 display: grid;
 grid-template-columns: 1fr 1fr;
 gap: 24px;
  }

  .form-group {
 margin-bottom: 24px;
  }

  .form-group-full {
 grid-column: 1 / -1;
  }

  .form-label {
 display: block;
 font-size: 15px;
 font-weight: 600;
 color: #374151;
 margin-bottom: 10px;
  }

  .required-mark {
 color: #dc3545;
 margin-left: 4px;
  }

  .form-input {
 width: 100%;
 padding: 14px 16px;
 border: 2px solid #e5e7eb;
 border-radius: 10px;
 font-size: 14px;
 transition: all 0.3s;
 font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 color: #374151;
 background-color: #ffffff;
  }

  .form-input:focus {
 outline: none;
 border-color: #667eea;
 box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
  }

  .form-input:disabled {
 background-color: #f3f4f6;
 cursor: not-allowed;
 color: #9ca3af;
  }

  .form-select {
 width: 100%;
 padding: 14px 16px;
 border: 2px solid #e5e7eb;
 border-radius: 10px;
 font-size: 14px;
 transition: all 0.3s;
 background-color: #ffffff;
 cursor: pointer;
 font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 color: #374151;
  }

  .form-select:focus {
 outline: none;
 border-color: #667eea;
 box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
  }

  .form-textarea {
 width: 100%;
 padding: 14px 16px;
 border: 2px solid #e5e7eb;
 border-radius: 10px;
 font-size: 14px;
 transition: all 0.3s;
 font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 resize: vertical;
 min-height: 120px;
 line-height: 1.6;
 color: #374151;
  }

  .form-textarea:focus {
 outline: none;
 border-color: #667eea;
 box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
  }

  .form-helper {
 font-size: 13px;
 color: #6b7280;
 margin-top: 8px;
 display: flex;
 align-items: center;
 gap: 6px;
  }

  .field-icon {
 display: inline-block;
 width: 28px;
 text-align: center;
  }

  .file-upload-area {
 border: 2px dashed #d1d5db;
 border-radius: 10px;
 padding: 24px;
 text-align: center;
 transition: all 0.3s;
 background-color: #f9fafb;
 cursor: pointer;
  }

  .file-upload-area:hover {
 border-color: #667eea;
 background-color: #f3f4f6;
  }

  .file-upload-icon {
 font-size: 48px;
 margin-bottom: 12px;
  }

  .file-upload-text {
 font-size: 14px;
 color: #374151;
 font-weight: 600;
 margin-bottom: 6px;
  }

  .file-upload-hint {
 font-size: 12px;
 color: #6b7280;
  }

  .file-input-hidden {
 display: none;
  }

  .image-preview {
 margin-top: 16px;
 display: flex;
 align-items: center;
 gap: 16px;
 padding: 12px;
 background-color: #f3f4f6;
 border-radius: 8px;
  }

  .preview-thumbnail {
 width: 80px;
 height: 80px;
 border-radius: 8px;
 object-fit: cover;
 border: 2px solid #e5e7eb;
  }

  .preview-info {
 flex: 1;
  }

  .preview-name {
 font-size: 14px;
 font-weight: 600;
 color: #374151;
 margin-bottom: 4px;
  }

  .preview-size {
 font-size: 12px;
 color: #6b7280;
  }

  .preview-remove {
 padding: 8px 16px;
 background-color: #ef4444;
 color: #ffffff;
 border: none;
 border-radius: 6px;
 font-size: 13px;
 font-weight: 600;
 cursor: pointer;
 transition: all 0.2s;
  }

  .preview-remove:hover {
 background-color: #dc2626;
  }

  .language-tags {
 display: flex;
 flex-wrap: wrap;
 gap: 10px;
 margin-top: 12px;
  }

  .language-tag {
 display: inline-flex;
 align-items: center;
 gap: 8px;
 padding: 8px 14px;
 background-color: #e0e7ff;
 color: #4338ca;
 border-radius: 20px;
 font-size: 13px;
 font-weight: 600;
  }

  .language-tag-remove {
 cursor: pointer;
 font-size: 16px;
 line-height: 1;
 transition: transform 0.2s;
  }

  .language-tag-remove:hover {
 transform: scale(1.2);
  }

  .certificate-list {
 display: flex;
 flex-direction: column;
 gap: 12px;
 margin-top: 12px;
  }

  .certificate-item {
 display: flex;
 align-items: center;
 gap: 12px;
 padding: 12px 16px;
 background-color: #f9fafb;
 border: 1px solid #e5e7eb;
 border-radius: 8px;
  }

  .certificate-icon {
 font-size: 24px;
  }

  .certificate-info {
 flex: 1;
  }

  .certificate-name {
 font-size: 14px;
 font-weight: 600;
 color: #374151;
 margin-bottom: 2px;
  }

  .certificate-date {
 font-size: 12px;
 color: #6b7280;
  }

  .certificate-remove {
 padding: 6px 12px;
 background-color: #ef4444;
 color: #ffffff;
 border: none;
 border-radius: 6px;
 font-size: 12px;
 font-weight: 600;
 cursor: pointer;
 transition: all 0.2s;
  }

  .certificate-remove:hover {
 background-color: #dc2626;
  }

  .add-button {
 display: inline-flex;
 align-items: center;
 gap: 8px;
 padding: 10px 18px;
 background-color: #10b981;
 color: #ffffff;
 border: none;
 border-radius: 8px;
 font-size: 14px;
 font-weight: 600;
 cursor: pointer;
 transition: all 0.3s;
 margin-top: 12px;
  }

  .add-button:hover {
 background-color: #059669;
 transform: translateY(-2px);
 box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
  }

  .rating-display {
 display: flex;
 align-items: center;
 gap: 12px;
 padding: 16px;
 background-color: #fef3c7;
 border-radius: 8px;
 margin-top: 12px;
  }

  .rating-stars {
 font-size: 24px;
 color: #f59e0b;
  }

  .rating-text {
 font-size: 14px;
 color: #78350f;
 font-weight: 600;
  }

  .rating-count {
 font-size: 12px;
 color: #92400e;
  }

  .form-actions {
 display: flex;
 gap: 12px;
 margin-top: 36px;
 padding-top: 28px;
 border-top: 2px solid #f3f4f6;
  }

  .form-button {
 flex: 1;
 padding: 16px 24px;
 border: none;
 border-radius: 10px;
 font-size: 16px;
 font-weight: 600;
 cursor: pointer;
 transition: all 0.3s;
 display: inline-flex;
 align-items: center;
 justify-content: center;
 gap: 10px;
  }

  .btn-primary {
 background-color: #3b82f6;
 color: #ffffff;
  }

  .btn-primary:hover {
 background-color: #2563eb;
 transform: translateY(-2px);
 box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
  }

  .btn-secondary {
 background-color: #6b7280;
 color: #ffffff;
  }

  .btn-secondary:hover {
 background-color: #4b5563;
 transform: translateY(-2px);
 box-shadow: 0 6px 20px rgba(107, 114, 128, 0.4);
  }

  @media (max-width: 768px) {
 .back-button {
  top: 12px;
  left: 12px;
  padding: 8px 16px;
  font-size: 13px;
 }

 .form-header {
  padding: 48px 20px 24px 20px;
 }

 .form-title {
  font-size: 22px;
  flex-direction: column;
  gap: 8px;
 }

 .form-body {
  padding: 24px 20px;
 }

 .form-grid {
  grid-template-columns: 1fr;
  gap: 0;
 }

 .form-group-full {
  grid-column: 1;
 }

 .form-actions {
  flex-direction: column;
 }

 .form-button {
  width: 100%;
 }

 .guide-card {
  flex-direction: column;
  gap: 8px;
 }

 .image-preview {
  flex-direction: column;
  align-items: flex-start;
 }

 .preview-thumbnail {
  width: 100%;
  height: 200px;
 }
  }
 </style>
</head>

<body>
 <div class="form-wrapper">
  <div class="form-container">
 <a href="<?= BASE_URL_ADMIN . '?act=huongdanvien' ?>" class="back-button">
  <span>◀</span>
  <span>Quay Lại</span>
 </a>

 <header class="form-header">
  <h1 class="form-title"><span>👨‍💼</span> <span id="formTitle">Sửa Thông Tin Hướng Dẫn Viên</span></h1>
  <p class="form-subtitle">Cập nhật thông tin chi tiết của hướng dẫn viên du lịch</p>
 </header>

 <div class="form-body">
  <div class="guide-card">
 <span class="guide-card-icon">⚠️</span>
 <div class="guide-card-content">
 <h3 class="guide-card-title">Thông tin quan trọng</h3>
 <p class="guide-card-text">Đang chỉnh sửa hướng dẫn viên:
  <strong><?= $huongdanvien['HoTen'] ?? 'Không rõ' ?></strong>
  (ID: HDV-<?= $huongdanvien['HDVID'] ?? '000' ?>). Vui lòng kiểm tra kỹ thông tin trước khi lưu thay đổi.
 </p>
 </div>
  </div>

  <form action="<?= BASE_URL_ADMIN . '?act=sua-huongdanvien' ?>" method="POST" enctype="multipart/form-data">
 <input type="hidden" name="HDVID" value="<?= $huongdanvien['HDVID'] ?? '' ?>">

 <div class="form-grid">
 <div class="form-group form-group-full">
  <label for="TaiKhoanID" class="form-label">
 <span class="field-icon">🔐</span> Tên Đăng Nhập
 <span class="required-mark">*</span>
  </label>
  <select id="TaiKhoanID" name="TaiKhoanID" class="form-select" required>
 <?php foreach ($listTaiKhoan as $TaiKhoan): ?>
 <option <?= (isset($huongdanvien['TaiKhoanID']) && $TaiKhoan['TaiKhoanID'] == $huongdanvien['TaiKhoanID']) ? 'selected' : '' ?> value="<?= $TaiKhoan['TaiKhoanID'] ?>">
  <?= $TaiKhoan['TenDangNhap'] ?>
 </option>
 <?php endforeach; ?>
  </select>
  <p class="form-helper"><span>ℹ️</span> <span>Chọn tài khoản liên kết với hướng dẫn viên</span></p>
 </div>

 <div class="form-group">
  <label for="HoTen" class="form-label">
 <span class="field-icon">👤</span> Họ và Tên
 <span class="required-mark">*</span>
  </label>
  <input type="text" id="HoTen" class="form-input" name="HoTen" value="<?= $huongdanvien['HoTen'] ?? '' ?>"
 placeholder="Nhập họ và tên đầy đủ" required>
  <?php if (isset($_SESSION['error']['HoTen'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['HoTen'] ?></p>
  <?php } ?>
 </div>

 <div class="form-group">
  <label for="NgaySinh" class="form-label">
 <span class="field-icon">📅</span> Ngày Sinh
 <span class="required-mark">*</span>
  </label>
  <input type="date" id="NgaySinh" class="form-input" name="NgaySinh"
 value="<?= $huongdanvien['NgaySinh'] ?? '' ?>" required>
  <?php if (isset($_SESSION['error']['NgaySinh'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['NgaySinh'] ?></p>
  <?php } ?>
 </div>

 <div class="form-group">
  <label for="SDT" class="form-label">
 <span class="field-icon">📞</span> Số Điện Thoại
 <span class="required-mark">*</span>
  </label>
  <input type="tel" id="SDT" class="form-input" name="SDT" value="<?= $huongdanvien['SDT'] ?? '' ?>"
 placeholder="Nhập số điện thoại" required>
  <?php if (isset($_SESSION['error']['SDT'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['SDT'] ?></p>
  <?php } ?>
 </div>

 <div class="form-group">
  <label for="Email" class="form-label">
 <span class="field-icon">📧</span> Email
 <span class="required-mark">*</span>
  </label>
  <input type="email" id="Email" class="form-input" name="Email" value="<?= $huongdanvien['Email'] ?? '' ?>"
 placeholder="Nhập địa chỉ email" required>
  <?php if (isset($_SESSION['error']['Email'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['Email'] ?></p>
  <?php } ?>
 </div>

 <div class="form-group form-group-full">
  <label class="form-label">
 <span class="field-icon">🖼️</span> Ảnh Đại Diện
  </label>
  <div class="file-upload-area" onclick="document.getElementById('AvatarFile').click();">
 <div class="file-upload-icon">📷</div>
 <div class="file-upload-text">Tải lên ảnh đại diện mới</div>
 <div class="file-upload-hint">Nhấn để chọn hoặc kéo thả file (JPG, PNG - Tối đa 5MB)</div>
 <input type="file" class="file-input-hidden" id="AvatarFile" name="Avatar" accept="image/*">
 <input type="hidden" name="CurrentAvatar" value="<?= $huongdanvien['Avatar'] ?? '' ?>">
  </div>
  <?php if (isset($huongdanvien['Avatar']) && $huongdanvien['Avatar']) { ?>
 <div class="image-preview">
 <img src="<?= BASE_URL . $huongdanvien['Avatar'] ?>" alt="Preview" class="preview-thumbnail">
 <div class="preview-info">
  <div class="preview-name"><?= basename($huongdanvien['Avatar']) ?></div>
  <div class="preview-size">Ảnh hiện tại</div>
 </div>
 </div>
  <?php } ?>
  <?php if (isset($_SESSION['error']['Avatar'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['Avatar'] ?></p>
  <?php } ?>
 </div>

  <div class="form-group form-group-full">
  <label for="ChungChi" class="form-label">
 <span class="field-icon">📜</span> Chứng Chỉ
 <span class="required-mark">*</span>
  </label>
  <select id="ChungChi" class="form-select" name="ChungChi" required>
 <?php foreach ($listChungChiOptions as $option): ?>
 <option value="<?= $option ?>" <?= ($currentChungChi === $option) ? 'selected' : '' ?>>
  <?= $option ?>
 </option>
 <?php endforeach; ?>
  </select>
  <p class="form-helper"><span>ℹ️</span> <span>Chọn loại chứng chỉ cao nhất mà hướng dẫn viên sở hữu</span></p>
  <?php if (isset($_SESSION['error']['ChungChi'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['ChungChi'] ?></p>
  <?php } ?>
 </div>
  <div class="form-group form-group-full">
  <label for="KinhNghiem" class="form-label">
 <span class="field-icon">💼</span> Kinh Nghiệm
 <span class="required-mark">*</span>
  </label>
  <textarea id="KinhNghiem" class="form-textarea" name="KinhNghiem"
 placeholder="Mô tả kinh nghiệm làm việc, các tour đã dẫn, kỹ năng đặc biệt..."
 required><?= $huongdanvien['KinhNghiem'] ?? '' ?></textarea>
  <p class="form-helper"><span>💡</span> <span>Mô tả chi tiết để khách hàng hiểu rõ hơn về năng lực</span>
  </p>
  <?php if (isset($_SESSION['error']['KinhNghiem'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['KinhNghiem'] ?></p>
  <?php } ?>
 </div>

 <div class="form-group">
  <label for="NgonNgu" class="form-label">
 <span class="field-icon">🌍</span> Ngôn Ngữ
 <span class="required-mark">*</span>
  </label>
  <input type="text" id="NgonNgu" class="form-input" name="NgonNgu"
 value="<?= $huongdanvien['NgonNgu'] ?? '' ?>" placeholder="Nhập ngôn ngữ, ví dụ: Tiếng Anh, Tiếng Nhật"
 required>
  <p class="form-helper"><span>ℹ️</span> <span>Ngăn cách bởi dấu phẩy hoặc dấu chấm phẩy</span></p>
  <?php if (isset($_SESSION['error']['NgonNgu'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['NgonNgu'] ?></p>
  <?php } ?>
 </div>

 <div class="form-group">
  <label for="PhanLoai" class="form-label">
 <span class="field-icon">🏷️</span> Phân Loại
 <span class="required-mark">*</span>
  </label>
  <input type="text" id="PhanLoai" class="form-input" name="PhanLoai"
 value="<?= $huongdanvien['PhanLoai'] ?? '' ?>" placeholder="Nhập phân loại, ví dụ: Cao Cấp" required>
  <?php if (isset($_SESSION['error']['PhanLoai'])) { ?>
 <p class="text-danger" style="color: #dc3545; font-size: 13px; margin-top: 8px;">
 <?= $_SESSION['error']['PhanLoai'] ?></p>
  <?php } ?>
 </div>

 <div class="form-group form-group-full">
  <label class="form-label"> <span class="field-icon">⭐</span> <span>Đánh Giá Hiện Tại</span> </label>
  <div class="rating-display">
 <div class="rating-stars">★★★★☆</div>
 <div>
 <div class="rating-text">4.5 / 5.0</div>
 <div class="rating-count">Dựa trên X đánh giá từ khách hàng</div>
 </div>
 <p class="form-helper"><span>ℹ️</span> <span>Đây là dữ liệu tĩnh, cần được tích hợp từ cơ sở dữ liệu</span></p>
  </div>
 </div>

 </div>

 <div class="form-actions">
 <a href="<?= BASE_URL_ADMIN . '?act=huongdanvien' ?>" class="form-button btn-secondary"
  style="text-decoration: none;">
  <span>✖️</span> <span>Hủy</span>
 </a>
 <button type="submit" class="form-button btn-primary">
  <span>💾</span> <span>Lưu Thay Đổi</span>
 </button>
 </div>
  </form>
 </div>
  </div>
 </div>
 <?php
 // Tùy chọn: Bao gồm footer nếu cần
// include './views/layout/footer.php';
// Tùy chọn: Xóa session lỗi sau khi hiển thị
 if (isset($_SESSION['error'])) {
  unset($_SESSION['error']);
 }
 ?>
 <script>
  // Bạn có thể thêm JavaScript tùy chỉnh ở đây nếu cần cho các hiệu ứng
  // như xử lý file upload, tag ngôn ngữ, v.v.

  // Ví dụ: Xử lý nút Quay Lại (nếu không dùng thẻ <a>)
  document.querySelector('.back-button').addEventListener('click', function () {
 window.history.back(); // Quay lại trang trước
  });
 </script>
</body>

</html>