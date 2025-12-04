<?php
// BẮT BUỘC: Khởi tạo session (Chắc chắn đã có ở index.php, nhưng để an toàn)
// session_start(); 

// Lấy thông báo lỗi từ session (nếu có)
$error_message = null;
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    // Xóa session lỗi sau khi hiển thị
    unset($_SESSION['error']);
}
?>
<!doctype html>
<html lang="vi">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Nhập Admin</title>
  <style>
    /* ------------------------------------------- */
    /* CSS TỪ LAYOUT MỚI CỦA BẠN (Đã lược bỏ scripts không cần thiết) */
    /* ------------------------------------------- */
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh; /* Sửa min-height thành 100vh để căn giữa */
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      position: relative;
      overflow: hidden;
    }

    body::before {
      content: '✈️';
      position: absolute;
      font-size: 60px;
      opacity: 0.1;
      animation: fly 15s linear infinite;
      top: 20%;
      left: -100px; /* Bắt đầu ngoài màn hình */
    }

    body::after {
      content: '🏝️';
      position: absolute;
      font-size: 80px;
      opacity: 0.1;
      bottom: 10%;
      right: 10%;
    }

    @keyframes fly {
      from { 
        left: -100px; 
        transform: rotate(-15deg); 
      }
      to { 
        left: calc(100% + 100px); 
        transform: rotate(-15deg); 
      }
    }

    * {
      box-sizing: border-box;
    }

    .login-container {
      width: 100%;
      max-width: 450px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      padding: 50px 40px;
      position: relative;
      z-index: 1;
    }

    .travel-icons {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 24px;
      opacity: 0.2;
      display: flex;
      gap: 10px;
    }

    .travel-icons-bottom {
      position: absolute;
      bottom: 20px;
      left: 20px;
      font-size: 24px;
      opacity: 0.2;
      display: flex;
      gap: 10px;
    }

    .login-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .admin-icon {
      width: 100px;
      height: 100px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px auto;
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
      position: relative;
    }

    .admin-icon::before {
      content: '';
      position: absolute;
      width: 120px;
      height: 120px;
      border: 3px dashed #667eea;
      border-radius: 50%;
      opacity: 0.3;
      animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    .admin-icon-text {
      font-size: 50px;
      z-index: 1;
    }

    .login-title {
      font-size: 28px;
      font-weight: 700;
      color: #2d3748;
      margin: 0 0 10px 0;
    }

    .login-subtitle {
      font-size: 15px;
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

    .input-wrapper {
      position: relative;
    }

    .form-input {
      width: 100%;
      padding: 14px 16px;
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

    .form-input.password-input {
      padding-right: 50px;
    }

    .toggle-password {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      font-size: 20px;
      color: #718096;
      transition: color 0.3s ease;
      padding: 0; /* Đảm bảo không có padding làm lệch vị trí */
      line-height: 1; /* Cố định chiều cao dòng */
    }

    .toggle-password:hover {
      color: #667eea;
    }

    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      font-size: 14px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      gap: 8px;
      color: #4a5568;
      cursor: pointer;
    }

    .remember-me input[type="checkbox"] {
      width: 18px;
      height: 18px;
      cursor: pointer;
      accent-color: #667eea;
    }

    .forgot-password {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .forgot-password:hover {
      color: #764ba2;
      text-decoration: underline;
    }

    .login-button {
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
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .login-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .required {
      color: #e53e3e;
      margin-left: 4px;
    }
    
    /* Thêm style cho thông báo lỗi */
    .alert-error {
        padding: 15px;
        background-color: #fcebeb;
        color: #e53e3e;
        border-radius: 8px;
        border: 1px solid #e53e3e;
        margin-bottom: 25px;
        font-weight: 600;
        text-align: center;
    }

    @media (max-width: 768px) {
      .login-container {
        padding: 40px 30px;
      }

      .login-title {
        font-size: 24px;
      }

      .form-options {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
      }
    }
  </style>
 </head>
 <body>
  <main class="login-container">
   <div class="travel-icons"><span>🏖️</span> <span>🗺️</span> <span>🧳</span>
   </div>
   <div class="travel-icons-bottom"><span>🏔️</span> <span>🚢</span> <span>🎒</span>
   </div>
   <header class="login-header">
    <div class="admin-icon"><span class="admin-icon-text">🌍</span>
    </div>
    <h1 class="login-title">🎫 Quản Trị Du Lịch</h1>
    
    <?php if ($error_message): ?>
        <p class="alert-error"><?= $error_message; ?></p>
    <?php else: ?>
        <p class="login-subtitle">✈️ Vui lòng đăng nhập để quản lý tour của bạn</p>
    <?php endif; ?>
   </header>
   
   <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
    <div class="form-group"><label for="email" class="form-label"> Email<span class="required">*</span> </label> 
    <input type="email" id="email" name="Email" class="form-input" placeholder="admin@example.com" required>
    </div>
    
    <div class="form-group"><label for="password" class="form-label"> Mật Khẩu<span class="required">*</span> </label>
      <div class="input-wrapper">
      <input type="password" id="password" name="MatKhauHash" class="form-input password-input" placeholder="••••••••" required> 
      <button type="button" class="toggle-password" id="togglePassword"> 👁️ </button>
      </div>
    </div>
    
    <div class="form-options"><label class="remember-me"> <input type="checkbox" id="rememberMe"> <span>Ghi nhớ đăng nhập</span> </label> <a href="forgot-password.html" class="forgot-password">Quên mật khẩu?</a>
    </div><button type="submit" class="login-button"> 🔐 Đăng Nhập </button>
   </form>
  </main>
  
  <script>
    // Toggle password visibility (giữ nguyên JavaScript)
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
      const type = passwordInput.type === 'password' ? 'text' : 'password';
      passwordInput.type = type;
      this.textContent = type === 'password' ? '👁️' : '🙈';
    });

    // Xóa logic xử lý form bằng JavaScript để PHP có thể xử lý POST Request
    // const loginForm = document.getElementById('loginForm');
    // loginForm.addEventListener('submit', function(e) { e.preventDefault(); ... }); 
  </script>
 </body>
</html>