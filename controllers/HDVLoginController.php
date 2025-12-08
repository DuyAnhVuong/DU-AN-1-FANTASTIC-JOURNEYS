<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    // public $modelHDV;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        // $this->modelHDV = new AdminHDV();
    }

    // Hàm này sẽ xử lý danh sách Quản trị (Vai trò ID 1)
  

      public function formLoginHDV()
    {
        require_once './views/auth/formLoginHDV.php';
        deleteSessionError();
    }

    public function loginHDV()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['Email'];
            $password = $_POST['MatKhauHash'];

            $user = $this->modelTaiKhoan->checkLoginHDV($email, $password);

            // SỬA LỖI LOGIC TẠI ĐÂY:
            if (is_array($user)) { // Nếu kết quả trả về là một MẢNG -> Đăng nhập thành công
                $_SESSION['user_hdv'] = $user;
                header("Location: " . BASE_URL);
                unset($_SESSION["error"]);
                exit();
            } else { // Nếu kết quả trả về là một CHUỖI -> Đăng nhập thất bại (thông báo lỗi)
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=login-hdv');
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
}
