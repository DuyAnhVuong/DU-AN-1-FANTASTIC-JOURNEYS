<?php
// Đảm bảo bạn đã require các tệp cần thiết như AdminTaiKhoan.php, hàm connectDB(), deleteSessionError(), và hằng số BASE_URL, BASE_URL_ADMIN

class HDVTaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        // Giả định class AdminTaiKhoan đã được định nghĩa và có thể khởi tạo
        $this->modelTaiKhoan = new HDVTaiKhoan();
    }

    // --- QUẢN TRỊ VIÊN (Vai trò ID 1) ---

    


    // --- ĐĂNG NHẬP (Chức năng Chung) ---

    // 1. Đăng nhập ADMIN (VaiTro = 1)

    // 2. Đăng nhập HƯỚNG DẪN VIÊN (VaiTro = 2)
    public function formLoginHDV()
    {
        // Hiển thị form, action của form này phải là BASE_URL . '?act=login-hdv'
        require_once './views/auth/formLoginHDV.php'; 
        deleteSessionError();
    }

    public function loginHDV()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['Email']; // Sửa từ 'Email' thành 'email' (theo form HTML)
            $password = $_POST['MatKhauHash']; // Sửa từ 'MatKhauHash' thành 'password' (theo form HTML)

            // Kiểm tra đăng nhập, hàm này chỉ cho phép VaiTro khác 1 (giả sử VaiTro = 2)
            $user = $this->modelTaiKhoan->checkLoginHDV($email, $password);

            if (is_array($user)) { 
                $_SESSION['user'] = $user;
                header("Location: " . BASE_URL); // Chuyển hướng đến trang người dùng/HDV
                unset($_SESSION["error"]);
                exit();
            } else { 
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=login-hdv'); // Về form login HDV
                exit();
            }
        }
    }


   

    public function logoutHDV()
    {
        unset($_SESSION['user']);
        header("Location: " . BASE_URL . '?act=login-hdv');
        exit();
    }
}