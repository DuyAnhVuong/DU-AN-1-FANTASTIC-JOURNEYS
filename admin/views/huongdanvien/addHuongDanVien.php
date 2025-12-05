<?php
// BỎ CÁC DÒNG: require './views/layout/header.php';
// BỎ CÁC DÒNG: include './views/layout/navbar.php';
// BỎ CÁC DÒNG: include './views/layout/sidebar.php';

// Lưu ý: Biến $listTaiKhoan vẫn phải được định nghĩa TRƯỚC khi đoạn code này được thực thi 
// (thường là trong Controller/Model PHP của bạn).
?>
<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Hướng Dẫn Viên</title>
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
      display: flex;
      align-items: center;
      /* Căn giữa dọc */
      justify-content: center;
      /* Căn giữa ngang */
    }

    .form-wrapper {
      width: 100%;
      padding: 40px 20px;
      display: flex;
      align-items: center;
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
      text-decoration: none;
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

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group-full {
      grid-column: 1 / -1;
    }

    .form-label {
      display: block;
      font-size: 14px;
      font-weight: 600;
      color: #495057;
      margin-bottom: 8px;
    }

    .required-mark {
      color: #dc3545;
      margin-left: 4px;
    }

    .form-input {
      width: 100%;
      padding: 12px 16px;
      border: 2px solid #dee2e6;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-input:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-select {
      width: 100%;
      padding: 12px 16px;
      border: 2px solid #dee2e6;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s;
      background-color: #ffffff;
      cursor: pointer;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-select:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .avatar-upload-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 16px;
      padding: 24px;
      border: 2px dashed #dee2e6;
      border-radius: 12px;
      background-color: #f8f9fa;
      text-align: center;
    }

    .avatar-preview {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ffffff;
      font-size: 48px;
      font-weight: 700;
      overflow: hidden;
    }

    .upload-button {
      padding: 10px 20px;
      background-color: #667eea;
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }

    .upload-button:hover {
      background-color: #5568d3;
      transform: translateY(-2px);
    }

    .upload-text {
      font-size: 12px;
      color: #6c757d;
    }

    .language-checkboxes {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
      padding: 16px;
      border: 2px solid #dee2e6;
      border-radius: 8px;
      background-color: #f8f9fa;
    }

    .checkbox-item {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .checkbox-input {
      width: 18px;
      height: 18px;
      cursor: pointer;
      accent-color: #667eea;
    }

    .checkbox-label {
      font-size: 14px;
      color: #495057;
      cursor: pointer;
    }

    .form-helper {
      font-size: 12px;
      color: #6c757d;
      margin-top: 6px;
    }

    .experience-input-group {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .experience-input {
      flex: 1;
    }

    .experience-unit {
      font-size: 14px;
      color: #495057;
      font-weight: 600;
    }

    .info-box {
      background-color: #e7f3ff;
      border-left: 4px solid #0c5ea8;
      padding: 12px 16px;
      border-radius: 4px;
      font-size: 13px;
      color: #0c5ea8;
      margin-top: 8px;
    }

    .form-actions {
      display: flex;
      gap: 12px;
      margin-top: 32px;
      padding-top: 24px;
      border-top: 1px solid #e9ecef;
      grid-column: 1 / -1;
    }

    .form-button {
      flex: 1;
      padding: 14px 24px;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-primary {
      background-color: #28a745;
      color: #ffffff;
    }

    .btn-primary:hover {
      background-color: #218838;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4);
    }

    .btn-secondary {
      background-color: #6c757d;
      color: #ffffff;
    }

    .btn-secondary:hover {
      background-color: #5a6268;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(108, 117, 125, 0.4);
    }

    .text-danger {
      color: #dc3545;
      font-size: 13px;
      margin-top: 4px;
    }

    /* Media Queries */
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
        font-size: 24px;
      }

      .form-body {
        padding: 24px 20px;
      }

      .form-grid {
        grid-template-columns: 1fr;
      }

      .language-checkboxes {
        grid-template-columns: repeat(2, 1fr);
      }

      .form-actions {
        flex-direction: column;
      }

      .form-button {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="form-wrapper">
    <div class="form-container">
      <a href="<?= BASE_URL_ADMIN . '?act=huongdanvien' ?>" class="back-button">
        <span>◀</span> <span>Quay Lại</span>
      </a>

      <header class="form-header">
        <h1 class="form-title">
          <span>👤</span>
          <span>Thêm Hướng Dẫn Viên Mới</span>
        </h1>
        <p class="form-subtitle">Điền đầy đủ thông tin hướng dẫn viên để thêm vào hệ thống</p>
      </header>

      <div class="form-body">
        <form action="<?= BASE_URL_ADMIN . '?act=them-huongdanvien' ?>" method="POST" enctype="multipart/form-data">
          <div class="form-grid">

            <div class="form-group form-group-full">
              <label for="TaiKhoanID" class="form-label">Tên đăng nhập <span class="required-mark">*</span></label>
              <select id="TaiKhoanID" name="TaiKhoanID" class="form-select">
                <?php
                // Đảm bảo $listTaiKhoan tồn tại và là mảng
                if (isset($listTaiKhoan) && is_array($listTaiKhoan)):
                  foreach ($listTaiKhoan as $TaiKhoan):
                    ?>
                    <option value="<?= $TaiKhoan['TaiKhoanID'] ?>">
                      <?= $TaiKhoan['TenDangNhap'] ?>
                    </option>
                    <?php
                  endforeach;
                endif;
                ?>
              </select>
              <p class="form-helper">Chọn tài khoản đã tạo có vai trò HDV</p>
              <?php if (isset($_SESSION['error']['TaiKhoanID'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['TaiKhoanID'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="HoTen" class="form-label">Họ tên <span class="required-mark">*</span></label>
              <input type="text" id="HoTen" class="form-input" name="HoTen" placeholder="Nhập Họ tên">
              <?php if (isset($_SESSION['error']['HoTen'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['HoTen'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="NgaySinh" class="form-label">Ngày sinh <span class="required-mark">*</span></label>
              <input type="date" id="NgaySinh" class="form-input" name="NgaySinh">
              <?php if (isset($_SESSION['error']['NgaySinh'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['NgaySinh'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="SDT" class="form-label">Số điện thoại <span class="required-mark">*</span></label>
              <input type="text" id="SDT" class="form-input" name="SDT" placeholder="Nhập Số điện thoại">
              <?php if (isset($_SESSION['error']['SDT'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['SDT'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="Email" class="form-label">Email <span class="required-mark">*</span></label>
              <input type="email" id="Email" class="form-input" name="Email" placeholder="Nhập Email">
              <?php if (isset($_SESSION['error']['Email'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['Email'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group form-group-full">
              <label class="form-label">Ảnh Đại Diện</label>
              <div class="avatar-upload-section">
                <div class="avatar-preview" id="avatarPreview">
                  👤
                </div>
                <input type="file" name="Avatar" id="avatarFileInput" style="display: none;" accept="image/*">
                <button type="button" class="upload-button"
                  onclick="document.getElementById('avatarFileInput').click()">
                  📁 Chọn Ảnh
                </button>
                <p class="upload-text">Định dạng: JPG, PNG. Kích thước tối đa: 2MB</p>
                <?php if (isset($_SESSION['error']['Avatar'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['Avatar'] ?></p>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="ChungChi" class="form-label">Chứng Chỉ <span class="required-mark">*</span></label>
              <select id="ChungChi" name="ChungChi" class="form-select">
                <option value="">-- Chọn chứng chỉ --</option>
                <option value="Chứng Chỉ Vàng">Chứng Chỉ Vàng</option>
                <option value="Chứng Chỉ Bạc">Chứng Chỉ Bạc</option>
                <option value="Chứng Chỉ Đồng">Chứng Chỉ Đồng</option>
                <option value="Chưa Có">Chưa Có Chứng Chỉ</option>
              </select>
              <?php if (isset($_SESSION['error']['ChungChi'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['ChungChi'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="PhanLoai" class="form-label">Phân Loại <span class="required-mark">*</span></label>
              <select id="PhanLoai" name="PhanLoai" class="form-select">
                <option value="">-- Chọn phân loại --</option>
                <option value="Chuyên Gia">Chuyên Gia (Expert)</option>
                <option value="Trung Cấp">Trung Cấp (Intermediate)</option>
                <option value="Sơ Cấp">Sơ Cấp (Beginner)</option>
              </select>
              <?php if (isset($_SESSION['error']['PhanLoai'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['PhanLoai'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="KinhNghiem" class="form-label">Kinh Nghiệm <span class="required-mark">*</span></label>
              <div class="experience-input-group">
                <input type="number" id="KinhNghiem" class="form-input experience-input" name="KinhNghiem"
                  placeholder="0" min="0" max="50">
                <span class="experience-unit">năm</span>
              </div>
              <p class="form-helper">Số năm kinh nghiệm làm hướng dẫn viên du lịch</p>
              <?php if (isset($_SESSION['error']['KinhNghiem'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['KinhNghiem'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="NgonNgu" class="form-label">Ngôn ngữ <span class="required-mark">*</span></label>
              <input type="text" id="NgonNgu" class="form-input" name="NgonNgu"
                placeholder="Ví dụ: Tiếng Anh, Tiếng Pháp">
              <p class="form-helper">Ngăn cách các ngôn ngữ bằng dấu phẩy (,)</p>
              <?php if (isset($_SESSION['error']['NgonNgu'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['NgonNgu'] ?></p>
              <?php } ?>
            </div>

            <div class="form-actions">
              <a href="<?= BASE_URL_ADMIN . '?act=huongdanvien' ?>" class="form-button btn-secondary">
                <span>✖️</span> <span>Hủy</span>
              </a>
              <button type="submit" class="form-button btn-primary">
                <span>➕</span> <span>Thêm Hướng Dẫn Viên</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const avatarFileInput = document.getElementById('avatarFileInput');
    const avatarPreview = document.getElementById('avatarPreview');

    if (avatarFileInput) {
      avatarFileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            avatarPreview.innerHTML = `<img src="${e.target.result}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;
          };
          reader.readAsDataURL(file);
        } else {
          avatarPreview.innerHTML = '👤';
        }
      });
    }
  </script>
</body>

</html>
<?php
// BỎ DÒNG: include './views/layout/footer.php';
// BỎ DÒNG: }
?>