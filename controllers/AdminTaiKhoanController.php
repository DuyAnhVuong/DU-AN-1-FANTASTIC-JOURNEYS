<?php
// Đảm bảo bạn đã require các tệp cần thiết như AdminTaiKhoan.php, hàm connectDB(), deleteSessionError(), và hằng số BASE_URL, BASE_URL_ADMIN

class AdminTaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        // Giả định class AdminTaiKhoan đã được định nghĩa và có thể khởi tạo
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }

    // --- QUẢN TRỊ VIÊN (Vai trò ID 1) ---

    public function listTaiKhoan(): void
    {
        $keyword = $_GET['keyword'] ?? '';
        $vai_tro = isset($_GET['vai_tro']) && $_GET['vai_tro'] !== '' ? (int) $_GET['vai_tro'] : null;

        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan($vai_tro, $keyword);

        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
        deleteSessionError();
    }

    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['ho_ten'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $vaitro = $_POST['chuc_vu_id']; // Vai trò được truyền từ form

            $errors = [];
            if (empty($name)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($password)) {
                 $errors['password'] = 'Mật khẩu không được để trống';
            }
            // Thêm kiểm tra định dạng email, độ dài mật khẩu...

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                // Giả định model insertTaiKhoan đã được điều chỉnh để nhận đúng tên cột
                $this->modelTaiKhoan->insertTaiKhoan($name, $password, $email, $vaitro);

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }

    public function formEditQuantri()
    {
        $id_quan_tri = $_GET['id'] ?? null;

        if (empty($id_quan_tri)) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }

        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);

        if (!$quanTri) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }

        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionError();
    }

    public function postEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_quan_tri = $_POST['id'] ?? '';
            $ho_ten = $_POST['TenDangNhap'] ?? '';
            $email = $_POST['Email'] ?? '';
            $password = $_POST['MatKhauHash'] ?? ''; 
            $vaitro = $_POST['VaiTro'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['TenDangNhap'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['Email'] = 'Email người dùng không được để trống';
            }
            // Không cần kiểm tra mật khẩu trống nếu người dùng không bắt buộc đổi

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($id_quan_tri, $ho_ten, $password, $email, $vaitro);

                header("Location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id=' . $id_quan_tri);
                exit();
            }
        }
    }

    public function deleteQuanTri()
    {
        $id = $_GET['id'];
        $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        if ($taiKhoan) {
            $this->modelTaiKhoan->delete($id);
        }
        header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
        exit();
    }


    // --- ĐĂNG NHẬP (Chức năng Chung) ---

    // 1. Đăng nhập ADMIN (VaiTro = 1)
    public function formLogin()
    {
        // Hiển thị form, action của form này phải là BASE_URL_ADMIN . '?act=login-admin'
        require_once './views/auth/formLogin.php'; 
        deleteSessionError();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email']; // Sửa từ 'Email' thành 'email' (theo form HTML)
            $password = $_POST['password']; // Sửa từ 'MatKhauHash' thành 'password' (theo form HTML)

            // Kiểm tra đăng nhập, hàm này chỉ cho phép VaiTro = 1
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if (is_array($user)) { 
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN); // Chuyển hướng đến trang Admin
                unset($_SESSION["error"]);
                exit();
            } else { 
                $_SESSION['error'] = $user; // Thông báo lỗi từ Model
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

    // 2. Đăng nhập HƯỚNG DẪN VIÊN (VaiTro = 2)
    public function formLoginHDV()
    {
        // Hiển thị form, action của form này phải là BASE_URL . '?act=login-hdv'
        require_once './views/auth/formLogin.php'; 
        deleteSessionError();
    }

    public function loginHDV()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email']; // Sửa từ 'Email' thành 'email' (theo form HTML)
            $password = $_POST['password']; // Sửa từ 'MatKhauHash' thành 'password' (theo form HTML)

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


    public function logout()
    {
        unset($_SESSION['user_admin']);
        header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        exit();
    }

    public function logoutHDV()
    {
        unset($_SESSION['user']);
        header("Location: " . BASE_URL . '?act=login-hdv');
        exit();
    }
}