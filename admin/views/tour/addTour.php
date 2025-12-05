<!doctype html>
<html lang="vi">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Tour Mới</title>
  <script src="/_sdk/element_sdk.js"></script>
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
      display: flex;
      align-items: center;
      gap: 12px;
    }

                


    .file-upload-input {
      display: none;
    }

    .file-upload-button {
      padding: 12px 24px;
      background: #667eea;
      color: #ffffff;
      border: none;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .file-upload-button:hover {
      background: #5568d3;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .file-upload-label {
      font-size: 14px;
      color: #718096;
    }

    .image-preview {
      margin-top: 15px;
      border-radius: 10px;
      overflow: hidden;
      border: 2px solid #e2e8f0;
      max-width: 300px;
    }

    .image-preview img {
      width: 100%;
      height: auto;
      display: block;
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
    
    .error-message {
        color: #e53e3e;
        font-size: 13px;
        margin-top: 5px;
        font-weight: 500;
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
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <div class="container">
   <div class="form-header">
    <h1 class="form-title" id="formTitle">Thêm Tour Du Lịch Mới</h1>
    <p class="form-subtitle">Điền đầy đủ thông tin tour để thêm vào hệ thống</p>
   </div>
   <form action="<?= BASE_URL_ADMIN . '?act=them-tour' ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tourName" class="form-label"> Tên Tour<span class="required">*</span> </label> 
            <input type="text" id="tourName" class="form-input" name="TenTour" placeholder="Ví dụ: Tour Hạ Long 3 ngày 2 đêm">
            <?php if (isset($_SESSION['error']['TenTour'])) { ?>
                <p class="error-message"><?= $_SESSION['error']['TenTour'] ?></p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="tourImage" class="form-label"> Ảnh Tour<span class="required">*</span> </label>
            <div class="file-upload-wrapper">
                <input type="file" id="tourImage" class="file-upload-input" name="Image" accept="image/"> 
                <button type="button" class="file-upload-button" onclick="document.getElementById('tourImage').click()"> 📁 Chọn Ảnh </button> 
                <span class="file-upload-label" id="fileNameLabel">Chưa chọn file</span>
            </div>
            <?php if (isset($_SESSION['error']['Image'])) { ?>
                <p class="error-message"><?= $_SESSION['error']['Image'] ?></p>
            <?php } ?>
            <div class="image-preview" id="imagePreview" style="display: none;">
                <img src="" alt="Preview" id="previewImg">
            </div>
        </div>

        <div class="form-group">
            <label for="tourType" class="form-label"> Loại Tour<span class="required">*</span> </label> 
            <select id="tourType" name="LoaiTourID" class="form-select">
                 <option value="">-- Chọn loại tour --</option>
                 <?php foreach ($listDanhMuc as $DanhMuc): ?>
                                        <option value="<?= $DanhMuc['id'] ?>">
                        <?= $DanhMuc['ten_danh_muc'] ?>
                    </option>
                 <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tourDescription" class="form-label"> Mô Tả Tour<span class="required">*</span> </label> 
            <textarea id="tourDescription" name="MoTa" class="form-input form-textarea" placeholder="Nhập mô tả chi tiết về tour, lịch trình, điểm đến..."></textarea>
            <?php if (isset($_SESSION['error']['MoTa'])) { ?>
                <p class="error-message"><?= $_SESSION['error']['MoTa'] ?></p>
            <?php } ?>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="tourDate" class="form-label"> Ngày Tạo<span class="required">*</span> </label> 
                <input type="date" id="tourDate" name="NgayTao" class="form-input">
                <?php if (isset($_SESSION['error']['NgayTao'])) { ?>
                    <p class="error-message"><?= $_SESSION['error']['NgayTao'] ?></p>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="tourPrice" class="form-label"> Giá Tour (VNĐ)<span class="required">*</span> </label> 
                <input type="text" id="tourPrice" name="Gia" class="form-input" placeholder="Ví dụ: 5000000">
                <?php if (isset($_SESSION['error']['Gia'])) { ?>
                    <p class="error-message"><?= $_SESSION['error']['Gia'] ?></p>
                <?php } ?>
            </div>
        </div>
        
        <button type="submit" class="submit-button" id="submitButton"> ✈️ Thêm Tour Mới </button>
   </form>
  </div>
  <script>
    // Hàm hiển thị tên file và preview ảnh
    document.getElementById('tourImage').addEventListener('change', function() {
        const file = this.files[0];
        const fileNameLabel = document.getElementById('fileNameLabel');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (file) {
            fileNameLabel.textContent = file.name;
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            fileNameLabel.textContent = 'Chưa chọn file';
            imagePreview.style.display = 'none';
            previewImg.src = '';
        }
    });

    const defaultConfig = {
      form_title: "Thêm Tour Du Lịch Mới",
      submit_button_text: "✈️ Thêm Tour Mới",
      background_color: "#667eea",
      surface_color: "#ffffff",
      text_color: "#2d3748",
      primary_action_color: "#667eea",
      secondary_action_color: "#718096",
      font_family: "Segoe UI",
      font_size: 16
    };

    async function onConfigChange(config) {
      const formTitle = document.getElementById('formTitle');
      const submitButton = document.getElementById('submitButton');
      const body = document.body;
      const container = document.querySelector('.container');
      
      if (formTitle) {
        formTitle.textContent = config.form_title || defaultConfig.form_title;
      }
      
      if (submitButton) {
        submitButton.textContent = config.submit_button_text || defaultConfig.submit_button_text;
      }

      const bgColor = config.background_color || defaultConfig.background_color;
      const surfaceColor = config.surface_color || defaultConfig.surface_color;
      const textColor = config.text_color || defaultConfig.text_color;
      const primaryColor = config.primary_action_color || defaultConfig.primary_action_color;
      const fontFamily = config.font_family || defaultConfig.font_family;
      const fontSize = config.font_size || defaultConfig.font_size;

      body.style.background = `linear-gradient(135deg, ${bgColor} 0%, ${primaryColor} 100%)`;
      body.style.fontFamily = `${fontFamily}, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif`;
      
      if (container) {
        container.style.background = surfaceColor;
      }

      document.querySelectorAll('.form-title, .form-label').forEach(el => {
        el.style.color = textColor;
        el.style.fontFamily = `${fontFamily}, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif`;
      });

      document.querySelector('.form-title').style.fontSize = `${fontSize * 2}px`;
      document.querySelector('.form-subtitle').style.fontSize = `${fontSize}px`;
      document.querySelectorAll('.form-label').forEach(el => {
        el.style.fontSize = `${fontSize * 0.875}px`;
      });
      document.querySelectorAll('.form-input, .form-select').forEach(el => {
        el.style.fontSize = `${fontSize * 0.9375}px`;
      });

      const buttons = document.querySelectorAll('.file-upload-button');
      buttons.forEach(btn => {
        btn.style.background = primaryColor;
      });

      const submitBtn = document.querySelector('.submit-button');
      if (submitBtn) {
        submitBtn.style.background = `linear-gradient(135deg, ${bgColor} 0%, ${primaryColor} 100%)`;
        submitBtn.style.fontSize = `${fontSize}px`;
      }

      document.querySelectorAll('.form-input, .form-select').forEach(el => {
        el.addEventListener('focus', function() {
          this.style.borderColor = primaryColor;
          this.style.boxShadow = `0 0 0 3px ${primaryColor}33`;
        });
      });
    }

    function mapToCapabilities(config) {
      return {
        recolorables: [
          {
            get: () => config.background_color || defaultConfig.background_color,
            set: (value) => {
              config.background_color = value;
              if (window.elementSdk) {
                window.elementSdk.setConfig({ background_color: value });
              }
            }
          },
          {
            get: () => config.surface_color || defaultConfig.surface_color,
            set: (value) => {
              config.surface_color = value;
              if (window.elementSdk) {
                window.elementSdk.setConfig({ surface_color: value });
              }
            }
          },
          {
            get: () => config.text_color || defaultConfig.text_color,
            set: (value) => {
              config.text_color = value;
              if (window.elementSdk) {
                window.elementSdk.setConfig({ text_color: value });
              }
            }
          },
          {
            get: () => config.primary_action_color || defaultConfig.primary_action_color,
            set: (value) => {
              config.primary_action_color = value;
              if (window.elementSdk) {
                window.elementSdk.setConfig({ primary_action_color: value });
              }
            }
          },
          {
            get: () => config.secondary_action_color || defaultConfig.secondary_action_color,
            set: (value) => {
              config.secondary_action_color = value;
              if (window.elementSdk) {
                window.elementSdk.setConfig({ secondary_action_color: value });
              }
            }
          }
        ],
        borderables: [],
        fontEditable: {
          get: () => config.font_family || defaultConfig.font_family,
          set: (value) => {
            config.font_family = value;
            if (window.elementSdk) {
              window.elementSdk.setConfig({ font_family: value });
            }
          }
        },
        fontSizeable: {
          get: () => config.font_size || defaultConfig.font_size,
          set: (value) => {
            config.font_size = value;
            if (window.elementSdk) {
              window.elementSdk.setConfig({ font_size: value });
            }
          }
        }
      };
    }

    function mapToEditPanelValues(config) {
      return new Map([
        ["form_title", config.form_title || defaultConfig.form_title],
        ["submit_button_text", config.submit_button_text || defaultConfig.submit_button_text]
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
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9a7cbbcce4698b32',t:'MTc2NDY5ODUyOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>