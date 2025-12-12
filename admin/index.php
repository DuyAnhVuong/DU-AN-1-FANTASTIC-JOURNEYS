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

require_once './controllers/AdminKhachLeController.php';
require_once './controllers/AdminXemKhachHangController.php';
require_once './controllers/AdminStatusController.php';
require_once './controllers/AdminNCCPTController.php';
require_once './controllers/AdminNCCKSController.php';
require_once './controllers/AdminNCCDVController.php';

require_once './controllers/AdminHuongDanVienController.php';
require_once './controllers/AdminYeuCauController.php';
require_once './controllers/AdminTrangThaiController.php';
require_once './controllers/AdminXemKhachHangController.php';
require_once './controllers/AdminTourRunController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminTour.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminNCC.php';
require_once './models/AdminKhachHang.php';

require_once './models/AdminStatus.php';

require_once './models/AdminHuongDanVien.php';
require_once './models/AdminYeuCau.php';

require_once './models/AdminNCCPT.php';
require_once './models/AdminNCCKS.php';
require_once './models/AdminNCCDV.php';

require_once './models/AdminBooking.php';
require_once './models/AdminLichTrinhTheoTour.php';
require_once './models/AdminKhachLe.php';
require_once './models/AdminLichTrinh.php';
require_once './models/AdminTrangThai.php';
require_once './models/AdminXemKhachHang.php';
require_once './models/AdminTourRun.php';


// Route
$act = $_GET['act'] ?? '/';


// --- LOGIC KIỂM TRA ĐĂNG NHẬP ---

// Danh sách các action KHÔNG cần đăng nhập
if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'check-logout-admin') {
    // Kiểm tra đăng nhập admin
    checkLoginAdmin();
}
// elseif ($act !== 'login-hdv' && $act !== 'check-loginHDV' && $act !== 'check-logout-hdv') {
//     // Kiểm tra đăng nhập HDV
//     checkLoginHDV();
// }
// }else{
//     // Nếu action nằm trong danh sách miễn trừ, vẫn cần kiểm tra đăng nhập HDV
//     checkLoginHDV();
// }


// --- ROUTING ---

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route danh mục
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // route Nhà Cung Cấp
    'ncc' => (new AdminNCCController())->danhSachNCC(),
    'form-them-ncc' => (new AdminNCCController())->formAddNCC(),
    'them-ncc' => (new AdminNCCController())->postAddNCC(),
    'form-sua-ncc' => (new AdminNCCController())->formEditNCC(),
    'sua-ncc' => (new AdminNCCController())->postEditNCC(),
    'xoa-ncc' => (new AdminNCCController())->deleteNCC(),

    'xemkhachhang' => (new AdminXemKhachHangController())->danhsachXemKhachHang(),
    'form-them-xemkhachhang' => (new AdminXemKhachHangController())->formAddXemKhachHang(),
    'them-xemkhachhang' => (new AdminXemKhachHangController())->postAddXemKhachHang(),
    'form-sua-xemkhachhang' => (new AdminXemKhachHangController())->formEditXemKhachHang(),
    'sua-xemkhachhang' => (new AdminXemKhachHangController())->postEditXemKhachHang(),
    'xoa-xemkhachhang' => (new AdminXemKhachHangController())->deleteXemkhachHang(),


    'tourrun' => (new AdminTourRunController())->danhsachTourRun(),

    'form-them-tourrun' => (new AdminTourRunController())->formAddTourRun(),
    'them-tourrun' => (new AdminTourRunController())->postAddTourRun(),
    // 'form-sua-tourrun' => (new AdminTourRunController())->formEditTourRun(),
    // 'sua-tourrun' => (new AdminTourRunController())->postEditTourRun(),
    // 'xoa-tourrun' => (new AdminTourRunController())->deleteTourRun(),

    // 'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    // 'chi-tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),

    // route khách hàng
    'khach-hang' => (new AdminKhachHangController())->danhSachKhachHang(),
    'form-them-khach-hang' => (new AdminKhachHangController())->formAddKhachHang(),
    'them-khach-hang' => (new AdminKhachHangController())->postAddKhachHang(),
    'form-sua-khach-hang' => (new AdminKhachHangController())->formEditKhachHang(),
    'sua-khach-hang' => (new AdminKhachHangController())->postEditKhachHang(),
    'xoa-khach-hang' => (new AdminKhachHangController())->deleteKhachHang(),

    // route Tour
    'tour' => (new AdminTourController())->danhSachTour(),
    'form-tour' => (new AdminTourController())->formAddTour(),
    'them-tour' => (new AdminTourController())->postAddTour(),
    'sua-tour' => (new AdminTourController())->postEditTour(),
    'form-sua-tour' => (new AdminTourController())->formEditTour(),
    'xoa-tour' => (new AdminTourController())->deleteTour(),

    'chi-tiet-lich-trinh' => (new AdminTourController())->formDetail(),
    'xoa-lich-trinh' => (new AdminTourController())->deleteLichTrinh(),
    'form-them-lich-trinh' => (new AdminTourController())->formThemLichTrinh(),
    'them-lich-trinh' => (new AdminTourController())->postThemLichTrinh(),

    // route Yêu Cầu Đặc Biệt
    'yeu-cau-dac-biet' => (new AdminYeuCauController())->danhSachYeuCau(),
    'form-sua-yeu-cau' => (new AdminYeuCauController())->formEditYeuCau(),
    'sua-yeu-cau' => (new AdminYeuCauController())->postEditYeuCau(),
    'form-them-yeu-cau' => (new AdminYeuCauController())->formAddYeuCau(),
    'them-yeu-cau' => (new AdminYeuCauController())->postAddYeuCau(),
    'xoa-yeu-cau' => (new AdminYeuCauController())->deleteYeuCau(),<<<<<<< Tu


    'list-ncc-pt' => (new AdminNCCPTController())->listNCCPT(),
    'form-them-ncc-pt' => (new AdminNCCPTController())->formAddNCCPT(),
    'them-ncc-pt' => (new AdminNCCPTController())->postAddNCCPT(),
    'form-sua-ncc-pt' => (new AdminNCCPTController())->formEditNCCPT(),
    'sua-ncc-pt' => (new AdminNCCPTController())->postEditNCCPT(),
    'xoa-ncc-pt' => (new AdminNCCPTController())->deleteNCCPT(),
    
    // ncc khach san
    'list-ncc-ks' => (new AdminNCCKSController())->listNCCKS(),
    'form-them-ncc-ks' => (new AdminNCCKSController())->formAddNCCKS(),
    'them-ncc-ks' => (new AdminNCCKSController())->postAddNCCKS(),
    'form-sua-ncc-ks' => (new AdminNCCKSController())->formEditNCCKS(),
    'sua-ncc-ks' => (new AdminNCCKSController())->postEditNCCKS(),
    'xoa-ncc-ks' => (new AdminNCCKSController())->deleteNCCKS(),
    
    // ncc dich vu
    'list-ncc-dv' => (new AdminNCCDVController())->listNCCDV(),
    'form-them-ncc-dv' => (new AdminNCCDVController())->formAddNCCDV(),
    'them-ncc-dv' => (new AdminNCCDVController())->postAddNCCDV(),
    'form-sua-ncc-dv' => (new AdminNCCDVController())->formEditNCCDV(),
    'sua-ncc-dv' => (new AdminNCCDVController())->postEditNCCDV(),
    'xoa-ncc-dv' => (new AdminNCCDVController())->deleteNCCDV(),
    
    // route Trang chủ
    '/' => (new AdminBaoCaoThongKeController())->home(),

    // route quản lí tài khoản Admin
    'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->listTaiKhoan(),
    'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuanTri(),
    'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),
    'xoa-quan-tri' => (new AdminTaiKhoanController())->deleteQuanTri(),
    
    // route hướng dẫn viên
    'huongdanvien' => (new AdminHuongDanVienController())->danhsachHuongDanVien(),
    'form-them-huongdanvien' => (new AdminHuongDanVienController())->formAddHuongDanVien(),
    'them-huongdanvien' => (new AdminHuongDanVienController())->postAddHuongDanVien(),
    'form-sua-huongdanvien' => (new AdminHuongDanVienController())->formEditHuongDanVien(),
    'sua-huongdanvien' => (new AdminHuongDanVienController())->postEditHuongDanVien(),
    'xoa-huongdanvien' => (new AdminHuongDanVienController())->deleteHuongDanVien(),


    // route login/logout Admin
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),


    'list-trang-thai' => (new AdminTrangThaiController())->danhSachTrangThai(),
    'form-them-trang-thai' => (new AdminTrangThaiController())->formAddTrangThai(),
    'them-trang-thai' => (new AdminTrangThaiController())->postAddTrangThai(),
    'form-sua-trang-thai' => (new AdminTrangThaiController())->formEditTrangThai(),
    'sua-trang-thai' => (new AdminTrangThaiController())->postEditTrangThai(),
    'xoa-trang-thai' => (new AdminTrangThaiController())->deleteTrangThai(),

    'list-booking' => (new AdminBookingController())->listBooking(),
    'form-add-booking' => (new AdminBookingController())->formAddBooking(),
    'add-booking' => (new AdminBookingController())->postAddBooking(),
    'detail-booking' => (new AdminBookingController())->detailBooking(),
    'form-edit-booking' => (new AdminBookingController())->formEditBooking(),
    'edit-booking' => (new AdminBookingController())->editBooking(),
    'huy-booking' => (new AdminBookingController())->cancelBooking(),


    // Khách lẻ
    'khach-le' => (new AdminKhachLe())->getAllKhachLe(), // Lưu ý: Đây là Model, nên phải gọi qua Controller
    
    // Status

    'list-status' => (new AdminStatusController())->danhSachStatus(),
};