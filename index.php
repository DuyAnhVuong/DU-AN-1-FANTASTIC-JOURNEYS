<?php
// FILE: [project_root]/index.php (Router chính của website)

session_start();

// 1. REQUIRE CÁC FILE CHUNG CẦN THIẾT
// Đường dẫn cần được điều chỉnh nếu cần thiết (ví dụ: nếu env.php nằm ngoài thư mục này)
require_once './commons/env.php'; 
require_once './commons/function.php'; 

// 2. REQUIRE CONTROLLER VÀ MODEL (Tối thiểu cần cho đăng nhập HDV)
// Giả định AdminTaiKhoanController và AdminTaiKhoan nằm trong thư mục admin/controllers và admin/models
require_once './admin/controllers/AdminTaiKhoanController.php'; 
require_once './admin/controllers/AdminKhachHangController.php'; 
require_once './admin/controllers/AdminBookingController.php'; 
require_once './admin/controllers/AdminTourController.php.php'; 



require_once './admin/models/AdminTaiKhoan.php';
require_once './admin/models/AdminKhachHang.php';
require_once './admin/models/AdminBooking.php.php';
require_once './admin/models/AdminTaiKhoan.php';
require_once './admin/models/AdminTour.php';


// Lấy hành động (action) từ URL
$act = $_GET['act'] ?? '/';


// --- ĐỊNH TUYẾN CHÍNH CỦA WEBSITE ---

match ($act) {
    // 1. ROUTE GỐC ('/'): CHUYỂN HƯỚNG ĐẾN FORM LOGIN HDV
    // Khi người dùng truy cập BASE_URL/
    '/' => (new AdminTaiKhoanController())->formLoginHDV(), 
    
    // 2. ROUTE HIỂN THỊ FORM ĐĂNG NHẬP HDV
    'login-hdv' => (new AdminTaiKhoanController())->formLoginHDV(),
    
    // 3. ROUTE XỬ LÝ ĐĂNG NHẬP HDV (POST)
    'check-loginHDV' => (new AdminTaiKhoanController())->loginHDV(),
    
    // 4. ROUTE ĐĂNG XUẤT HDV
    'logout-hdv' => (new AdminTaiKhoanController())->logoutHDV(),
    
    // 5. ROUTE TRANG CHỦ WEBSITE (Sau khi HDV đăng nhập thành công, sẽ được chuyển đến đây)
    // Bạn cần tạo một Controller riêng cho phần ngoài Admin, ví dụ: HomeController
    // Tạm thời, tôi sẽ để đây là một trang đơn giản
    'home' => require_once './views/trang_chu_hdv.php', 

    // Thêm các route khác của phần website/người dùng ở đây...
    
    default => require_once './views/home.php', // Trang mặc định nếu không khớp route

    
};
?>