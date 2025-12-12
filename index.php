<?php
// FILE: [project_root]/index.php (Router chính của website)

session_start();

// 1. REQUIRE CÁC FILE CHUNG CẦN THIẾT
// Đường dẫn cần được điều chỉnh nếu cần thiết (ví dụ: nếu env.php nằm ngoài thư mục này)
require_once './commons/env.php'; 
require_once './commons/function.php'; 

// 2. REQUIRE CONTROLLER VÀ MODEL (Tối thiểu cần cho đăng nhập HDV)
// Giả định AdminTaiKhoanController và AdminTaiKhoan nằm trong thư mục admin/controllers và admin/models
require_once './controllers/HDVTaiKhoanController.php'; 
require_once './controllers/HomeController.php';
require_once './controllers/HDVTourController.php';
require_once './controllers/HDVBookingController.php';
require_once './controllers/HDVYeuCauController.php';
require_once './controllers/HDVKhachLeController.php';
require_once './controllers/HDVKhachHangController.php';
require_once './controllers/HDVNhatKyController.php';
require_once './controllers/HDVKhachHangController.php';
require_once './controllers/HDVNCCDVController.php';
require_once './controllers/HDVNCCPTController.php';    
require_once './controllers/HDVNCCKSController.php';
require_once './controllers/HDVStatusController.php';

// require_once './admin/controllers/AdminKhachHangController.php'; 
// require_once './admin/controllers/AdminBookingController.php'; 
// require_once './admin/controllers/AdminTourController.php.php'; 




require_once './model/HDVTaiKhoan.php';
require_once './model/HDVTour.php';
require_once './model/HDVLichTrinh.php';
require_once './model/HDVBooking.php';
require_once './model/HDVYeuCau.php';
require_once './model/HDVKhachLe.php';
require_once './model/HDVKhachHang.php';
require_once './model/HDVNhatKy.php';
require_once './model/HDVKhachHang.php';
require_once './model/HDVNCCDV.php';
require_once './model/HDVNCCPT.php';
require_once './model/HDVNCCKS.php';
require_once './model/HDVStatus.php';
// require_once './admin/models/AdminKhachHang.php';
// require_once './admin/models/AdminBooking.php.php';
// require_once './admin/models/AdminTaiKhoan.php';
// require_once './admin/models/AdminTour.php';


// Lấy hành động (action) từ URL
$act = $_GET['act'] ?? '/';


// --- LOGIC KIỂM TRA ĐĂNG NHẬP ---

// Danh sách các action KHÔNG cần đăng nhập


if ($act !== 'login-hdv' && $act !== 'check-login-hdv' && $act !== 'check-logout-hdv') {
    // Kiểm tra đăng nhập hdv
    checkLoginHDV();
}

// --- ĐỊNH TUYẾN CHÍNH CỦA WEBSITE ---

match ($act) {
    // 1. ROUTE GỐC ('/'): CHUYỂN HƯỚNG ĐẾN FORM LOGIN HDV
    // Khi người dùng truy cập BASE_URL/
    '/' => (new HomeController())->home(), 
    
    // 2. ROUTE HIỂN THỊ FORM ĐĂNG NHẬP HDV
    'login-hdv' => (new HDVTaiKhoanController())->formLoginHDV(),
    
    // 3. ROUTE XỬ LÝ ĐĂNG NHẬP HDV (POST)
    'check-login-hdv' => (new HDVTaiKhoanController())->loginHDV(),
    
    // 4. ROUTE ĐĂNG XUẤT HDV
    //tour
    'logout-hdv' => (new HDVTaiKhoanController())->logoutHDV(),
    'tour' => (new HDVTourController())->danhSachTour(),
    'chi-tiet-lich-trinh' => (new HDVTourController())->formDetail(),
    'xoa-lich-trinh' => (new HDVTourController())->deleteLichTrinh(),
    //booking
    'list-booking' => (new HDVBookingController())->listBooking(),
    'form-add-booking' => (new HDVBookingController())->formAddBooking(),
    'add-booking' => (new HDVBookingController())->postAddBooking(),
    'detail-booking' => (new HDVBookingController())->detailBooking(),
    'form-edit-booking' => (new HDVBookingController())->formEditBooking(),
    'edit-booking' => (new HDVBookingController())->editBooking(),
    'huy-booking' => (new HDVBookingController())->cancelBooking(),
    //ycdb
    'yeu-cau-dac-biet' => (new HDVYeuCauController())->danhSachYeuCau(),
    'form-sua-yeu-cau' => (new HDVYeuCauController())->formEditYeuCau(),
    'sua-yeu-cau' => (new HDVYeuCauController())->postEditYeuCau(),
    'form-them-yeu-cau' => (new HDVYeuCauController())->formAddYeuCau(),
    'them-yeu-cau' => (new HDVYeuCauController())->postAddYeuCau(),
    'xoa-yeu-cau' => (new HDVYeuCauController())->deleteYeuCau(),
    //nhatky
    'list-nhat-ky' => (new HDVNhatKyController())->danhSachNhatKy(),
    'form-them-nhat-ky' => (new HDVNhatKyController())->formAddNhatKy(),
    'them-nhat-ky' => (new HDVNhatKyController())->postAddNhatKy(),
    'form-edit-nhat-ky' => (new HDVNhatKyController())->formEditNhatKy(),
    'edit-nhat-ky' => (new HDVNhatKyController())->postEditNhatKy(),
    'xoa-nhat-ky' => (new HDVNhatKyController())->deleteNhatKy(),
    //khachhang
    'khach-hang' => (new HDVKhachHangController())->danhSachKhachHang(),
    'form-them-khach-hang' => (new HDVKhachHangController())->formAddKhachHang(),
    'them-khach-hang' => (new HDVKhachHangController())->postAddKhachHang(),
    'form-sua-khach-hang' => (new HDVKhachHangController())->formEditKhachHang(),
    'sua-khach-hang' => (new HDVKhachHangController())->postEditKhachHang(),
    'xoa-khach-hang' => (new HDVKhachHangController())->deleteKhachHang(),
    // 5. ROUTE TRANG CHỦ WEBSITE (Sau khi HDV đăng nhập thành công, sẽ được chuyển đến đây)
    // Bạn cần tạo một Controller riêng cho phần ngoài Admin, ví dụ: HomeController
    // Tạm thời, tôi sẽ để đây là một trang đơn giản
    'home' => require_once './views/trang_chu_hdv.php', 

    // Thêm các route khác của phần website/người dùng ở đây...
    
    default => require_once './views/home.php', // Trang mặc định nếu không khớp route

    
};
?>