<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminTaiKhoanController.php';
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminTourController.php';
require_once './controllers/AdminNCCController.php';
require_once './controllers/AdminKhachHangController.php';
require_once './controllers/AdminBookingController.php';

require_once './controllers/AdminYeuCauController.php'; 
require_once './controllers/AdminLichTrinhTheoTourController.php'; 
require_once './controllers/AdminXemKhachHangController.php'; 

// Require toàn bộ file Models

require_once './models/AdminDanhMuc.php';
// require_once './models/AdminSanPham.php';
require_once './models/AdminTour.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminNCC.php';

require_once './models/AdminKhachHang.php';

require_once './models/AdminBooking.php';

require_once './models/AdminYeuCau.php';
require_once './models/AdminLichTrinhTheoTour.php';
require_once './models/AdminXemKhachHang.php';
// Route
$act = $_GET['act'] ?? '/';


// if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'check-logout-admin') {
//     // Kiểm tra đăng nhập admin
//     checkLoginAdmin();
// }

// if($act!== 'login-admin'&& $act!=='check-login-admin' && $act!=='check-logout-admin'){
//     // Kiểm tra đăng nhập admin
//     checkLoginAdmin();
// }


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route danh mục
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // // route Sản phẩm
   'ncc' => (new AdminNCCController())->danhSachNCC(),

    'form-them-ncc' => (new AdminNCCController())->formAddNCC(),
    'them-ncc' => (new AdminNCCController())->postAddNCC(),
    'form-sua-ncc' => (new AdminNCCController())->formEditNCC(),
    'sua-ncc' => (new AdminNCCController())->postEditNCC(),
    'xoa-ncc' => (new AdminNCCController())->deleteNCC(),
    // 'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    // 'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    // 'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    // 'chi-tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),

    // route khách hàng
    'khach-hang' => (new AdminKhachHangController())->danhSachKhachHang(),
    'form-them-khach-hang' => (new AdminKhachHangController())->formAddKhachHang(),
    'them-khach-hang' => (new AdminKhachHangController())->postAddKhachHang(),
    'form-sua-khach-hang' => (new AdminKhachHangController())->formEditKhachHang(),
    'sua-khach-hang' => (new AdminKhachHangController())->postEditKhachHang(),

    //  // route đơn hàng
    'tour' => (new AdminTourController())->danhSachTour(),
    'form-tour' => (new AdminTourController())->formAddTour(),
    'them-tour' => (new AdminTourController())->postAddTour(),
    'sua-tour' => (new AdminTourController())->postEditTour(),
    // 'chi-tiet-tuor' => (new AdminTuorController())->detailTuor(),
    'form-sua-tour' => (new AdminTourController())->formEditTour(),
    'xoa-tour' => (new AdminTourController())->deleteTour(),


    'yeu-cau-dac-biet','yeu-cau' => (new AdminYeuCauController())->danhSachYeuCau(),
    'form-sua-yeu-cau' => (new AdminYeuCauController())->formEditYeuCau(),
    'sua-yeu-cau' => (new AdminYeuCauController())->postEditYeuCau(),
    'form-them-yeu-cau' => (new AdminYeuCauController())->formAddYeuCau(),
    'them-yeu-cau' => (new AdminYeuCauController())->postAddYeuCau(),
    'xoa-yeu-cau' => (new AdminYeuCauController())->deleteYeuCau(),


    // route Trang chủ
    '/' => (new AdminBaoCaoThongKeController())->home(),


    // route quản lí tài khoản
// Quản lí tài khoản quản trị
    'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->listTaiKhoan(),
    'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuanTri(),
    'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),
    'xoa-quan-tri' => (new AdminTaiKhoanController())->deleteQuanTri(),
    //route reset password




    //lichttrinh
    // 'chi-tiet-lich-trinh-tour' => (new AdminLichTrinhTheoTourController())->listLichTrinh(),
    'chi-tiet-lt' => (new AdminLichTrinhTheoTourController())->getListLichTrinh(),






//route quản lý tài khoản HDV
// 'list-tai-khoan-hdv' => (new AdminTaiKhoanController())->danhSachHDV(),
// 'form-sua-hdv' => (new AdminTaiKhoanController())->formEditHDV(),
// 'sua-hdv' => (new AdminTaiKhoanController())->postEditHDV(),
// 'chi-tiet-hdv' => (new AdminTaiKhoanController())->detailHDV(),


//route login 
// 'login-admin' => (new AdminTaiKhoanController())->formLogin(),
// 'check-login-admin' => (new AdminTaiKhoanController())->login(),
// 'logout-admin' => (new AdminTaiKhoanController())->logout(),

//route booking 
'list-booking' => (new AdminBookingController())->listBooking(),
'form-add-booking' => (new AdminBookingController())->formAddBooking(),
'add-booking' => (new AdminBookingController())->postAddBooking(),
'xoa-booking' => (new AdminBookingController())->deleteBK(),
};