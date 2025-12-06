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
    public function listTaiKhoan(): void
    {
        // Lấy tham số lọc từ URL
        $keyword = $_GET['keyword'] ?? '';
        // Nếu tham số 'vai_tro' không có hoặc rỗng thì đặt là null
        $vai_tro = isset($_GET['vai_tro']) && $_GET['vai_tro'] !== '' ? (int) $_GET['vai_tro'] : null;

        // GỌI MODEL VỚI CÁC THAM SỐ LỌC (Cần Model phải được cập nhật)
        // Nếu Model chưa sửa, bạn có thể gọi: $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan($vai_tro, $keyword);

        // TRUYỀN CÁC BIẾN LỌC XUỐNG VIEW
        require_once './views/taikhoan/quantri/listQuanTri.php'; // Dùng View này làm View chung
    }
    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
    }



    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // SỬA LỖI: Cần nhận dữ liệu POST theo tên 'name', 'email', 'vaitro' 
            // vì đó là thuộc tính name trong HTML form.
            $name = $_POST['ho_ten'];
            $password = $_POST['password'];       // Lấy tên từ form
            $email = $_POST['email'];
            $vaitro = $_POST['chuc_vu_id'];   // Lấy vai trò từ form

            $errors = [];
            if (empty($name)) {
                $errors['ho_ten'] = 'Tên không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
            }

            if (empty($email)) {
                $errors['email'] = 'Email không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
            }

            // ... (các phần kiểm tra lỗi khác)

            $_SESSION['error'] = $errors; // Gán errors

            if (empty($errors)) {


                // Tham số truyền vào Model là đúng
                $this->modelTaiKhoan->insertTaiKhoan(
                    $name,

                    $password,
                    $email,
                    $vaitro

                );

                // Chuyển hướng thành công
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // SỬA LỖI CHUYỂN HƯỚNG KHI CÓ LỖI (Về form thêm)
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }


    public function formEditQuantri()
    {
        // Đảm bảo URL gửi là ?act=form-sua-quan-tri&id=X
        $id_quan_tri = $_GET['id'] ?? null;

        // Nếu URL là ?act=form-sua-quan-tri&id_quan_tri=X thì sửa lại thành:
        // $id_quan_tri = $_GET['id_quan_tri'] ?? null;

        // Xử lý nếu không có ID
        if (empty($id_quan_tri)) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }

        // Gọi Model
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);

        // Xử lý khi không tìm thấy tài khoản
        if (!$quanTri) {
            // Có thể thêm thông báo lỗi vào $_SESSION nếu cần
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

            // Đảm bảo form HTML dùng các name này
            $ho_ten = $_POST['TenDangNhap'] ?? '';
            $email = $_POST['Email'] ?? '';
            $password = $_POST['MatKhauHash'] ?? ''; // Mật khẩu có thể là null nếu không đổi
            $vaitro = $_POST['VaiTro'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['TenDangNhap'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['Email'] = 'Email người dùng không được để trống';
            }
            // Bạn đang kiểm tra $trang_thai nhưng biến này không tồn tại
            /*
        if (empty($trang_thai)) {
            $errors['VaiTro'] = 'Chọn trạng thái'; 
        }
        */

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                // Sửa: Hàm updateTaiKhoan chỉ nhận 5 tham số
                $this->modelTaiKhoan->updateTaiKhoan($id_quan_tri, $ho_ten, $password, $email, $vaitro);

                // Chuyển hướng
                header("Location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Sửa lỗi chuyển hướng khi có lỗi để tránh lỗi "Undefined array key" nếu bạn dùng $id_quan_tri sau đó.
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

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['Email'];
            $password = $_POST['MatKhauHash'];

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            // SỬA LỖI LOGIC TẠI ĐÂY:
            if (is_array($user)) { // Nếu kết quả trả về là một MẢNG -> Đăng nhập thành công
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN);
                unset($_SESSION["error"]);
                exit();
            } else { // Nếu kết quả trả về là một CHUỖI -> Đăng nhập thất bại (thông báo lỗi)
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

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
                $_SESSION['user'] = $user;
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

    public function logoutHDV()
    {
        unset($_SESSION['user']);
        header("Location: " . BASE_URL . '?act=login-hdv');
        exit();
    }
}
