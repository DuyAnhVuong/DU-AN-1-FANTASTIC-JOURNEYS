<!doctype html>
<html lang="vi">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa Tour</title>
  <style>
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    * {
      box-sizing: border-box;
    }

    .container {
      width: 100%;
      max-width: 800px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      padding: 40px;
    }

    .form-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .form-title {
      font-size: 32px;
      font-weight: 700;
      color: #2d3748;
      margin: 0 0 10px 0;
    }

    .form-subtitle {
      font-size: 16px;
      color: #718096;
      margin: 0;
    }

    .form-group {
      margin-bottom: 25px;
    }

    .form-label {
      display: block;
      font-size: 14px;
      font-weight: 600;
      color: #4a5568;
      margin-bottom: 8px;
    }

    .form-input {
      width: 100%;
      padding: 12px 16px;
      font-size: 15px;
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      transition: all 0.3s ease;
      background: #f7fafc;
    }

    .form-input:focus {
      outline: none;
      border-color: #667eea;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-textarea {
      min-height: 120px;
      resize: vertical;
      font-family: inherit;
    }

    .form-select {
      width: 100%;
      padding: 12px 16px;
      font-size: 15px;
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      background: #f7fafc;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .form-select:focus {
      outline: none;
      border-color: #667eea;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .file-upload-wrapper {
      position: relative;
    }

    .file-upload-input {
      width: 100%;
      padding: 12px 16px;
      font-size: 15px;
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      background: #f7fafc;
      cursor: pointer;
    }

    .image-preview-container {
      margin-top: 15px;
      border-radius: 10px;
      overflow: hidden;
      border: 2px solid #e2e8f0;
      max-width: 300px;
    }
    
    .image-preview-container.current {
        border-color: #38a169; /* Màu xanh lá cho ảnh hiện tại */
    }

    .image-preview-container img {
      width: 100%;
      height: auto;
      display: block;
    }

    .image-note {
      font-size: 13px;
      color: #718096;
      margin-top: 8px;
      font-style: italic;
    }
    
    .error-message {
        color: #e53e3e;
        font-size: 13px;
        margin-top: 5px;
        font-weight: 500;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .submit-button {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #ffffff;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 30px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .submit-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .required {
      color: #e53e3e;
      margin-left: 4px;
    }

    @media (max-width: 768px) {
      .container {
        padding: 30px 20px;
      }

      .form-title {
        font-size: 24px;
      }

      .form-row {
        grid-template-columns: 1fr;
      }
    }
  </style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <main class="container">
   <header class="form-header">
    <h1 class="form-title">Sửa Thông Tin Tour</h1>
    <p class="form-subtitle">Cập nhật thông tin tour du lịch</p>
   </header>
   <form action="<?= BASE_URL_ADMIN . '?act=sua-tour' ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="TourID" value="<?= $tour['TourID'] ?>">

        <div class="form-group">
            <label for="tourName" class="form-label"> Tên Tour<span class="required">*</span> </label> 
            <input type="text" id="tourName" class="form-input" name="TenTour" 
                   placeholder="Nhập tên Tour" value="<?= $tour['TenTour'] ?>">
            <?php if (isset($_SESSION['error']['TenTour'])) { ?>
                <p class="error-message"><?= $_SESSION['error']['TenTour'] ?></p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="tourImage" class="form-label"> Ảnh minh họa </label>
            <div class="file-upload-wrapper">
                <input type="file" id="tourImage" class="file-upload-input" name="Image" accept="image/*">
            </div>
            <p class="image-note">💡 Chọn ảnh mới để thay thế ảnh hiện tại</p>
            <?php if (isset($_SESSION['error']['Image'])) { ?>
                <p class="error-message"><?= $_SESSION['error']['Image'] ?></p>
            <?php } ?>
            <?php if (!empty($tour['Image'])): ?>
                <div id="currentImageContainer" class="image-preview-container current">
                    <img src="<?= BASE_URL . $tour['Image'] ?>" alt="Ảnh tour hiện tại">
                </div>
            <?php endif; ?>
            <div id="newImagePreview" class="image-preview-container" style="display: none;">
                <img id="previewImg" src="" alt="Ảnh mới">
            </div>
        </div>

        <div class="form-group">
            <label for="LoaiTourID" class="form-label"> Danh mục sản phẩm<span class="required">*</span> </label> 
            <select id="LoaiTourID" name="LoaiTourID" class="form-select">
                <?php foreach ($listDanhMuc as $danhMuc): ?>
                    <option <?= $danhMuc['id'] == $tour['LoaiTourID'] ? 'selected' : '' ?> 
                            value="<?= $danhMuc['id'] ?>">
                        <?= $danhMuc['ten_danh_muc'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_pt" class="form-label">Nhà cung cấp phương tiện<span class="required">*</span> </label> 
            <select id="tourType" name="id_pt" class="form-select">
                 <option value="">-- Chọn nhà cung cấp phương tiện --</option>
                 <?php foreach ($listNCCPT as $pt): ?>
                                        <option <?= $pt['id_pt'] == $tour['id_pt'] ? 'selected' : '' ?> value="<?= $pt['id_pt'] ?>">
                        <?= $pt['Name_PhuongTien'] ?>
                    </option>
                 <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_ks" class="form-label">Nhà cung cấp khách sạn<span class="required">*</span> </label> 
            <select id="tourType" name="id_ks" class="form-select">
                 <option value="">-- Chọn nhà cung cấp khách sạn --</option>
                 <?php foreach ($listNCCKS as $ks): ?>
                                        <option <?= $ks['id_ks'] == $tour['id_ks'] ? 'selected' : '' ?> value="<?= $ks['id_ks'] ?>">
                        <?= $ks['NameKS'] ?>
                    </option>
                 <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_dichvu" class="form-label">Nhà cung cấp dịch vụ<span class="required">*</span> </label> 
            <select id="tourType" name="id_dichvu" class="form-select">
                 <option value="">-- Chọn nhà cung cấp dịch vụ --</option>
                 <?php foreach ($listNCCDV as $dv): ?>
                                        <option <?= $dv['id_dichvu'] == $tour['id_dichvu'] ? 'selected' : '' ?> value="<?= $dv['id_dichvu'] ?>">
                        <?= $dv['Name_DV'] ?>
                    </option>
                 <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="MoTa" class="form-label"> Mô tả<span class="required">*</span> </label> 
            <textarea id="MoTa" name="MoTa" class="form-input form-textarea" 
                      placeholder="Nhập mô tả chi tiết về tour, lịch trình, điểm đến..."><?= $tour['MoTa'] ?></textarea>
            <?php if (isset($_SESSION['error']['MoTa'])) { ?>
                <p class="error-message"><?= $_SESSION['error']['MoTa'] ?></p>
            <?php } ?>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="NgayTao" class="form-label"> Ngày tạo<span class="required">*</span> </label> 
                <input type="date" id="NgayTao" name="NgayTao" class="form-input" 
                       value="<?= $tour['NgayTao'] ?>">
                <?php if (isset($_SESSION['error']['NgayTao'])) { ?>
                    <p class="error-message"><?= $_SESSION['error']['NgayTao'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="Gia" class="form-label"> Giá<span class="required">*</span> </label> 
                <input type="text" id="Gia" name="Gia" class="form-input" 
                       placeholder="Nhập giá" value="<?= $tour['Gia'] ?>">
                <?php if (isset($_SESSION['error']['Gia'])) { ?>
                    <p class="error-message"><?= $_SESSION['error']['Gia'] ?></p>
                <?php } ?>
            </div>
        </div>
        
        <button type="submit" class="submit-button"> 💾 Cập Nhật Tour </button>
   </form>
  </main>
 <script>
    // Xử lý preview ảnh mới khi chọn file
    document.getElementById('tourImage').addEventListener('change', function() {
        const file = this.files[0];
        const newImagePreview = document.getElementById('newImagePreview');
        const previewImg = document.getElementById('previewImg');
        const currentImageContainer = document.getElementById('currentImageContainer');

        if (file) {
            // Ẩn ảnh cũ nếu có
            if (currentImageContainer) {
                currentImageContainer.style.display = 'none';
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                newImagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            // Nếu hủy chọn, hiển thị lại ảnh cũ
            if (currentImageContainer) {
                currentImageContainer.style.display = 'block';
            }
            newImagePreview.style.display = 'none';
            previewImg.src = '';
        }
    });
</script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9a7cc590d4c68b32',t:'MTc2NDY5ODkyOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
