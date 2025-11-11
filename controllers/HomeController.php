<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function trangchu()
    {
        echo "day la trang chu";
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFormSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        
        // var_dump($listSanPhamCungDanhMuc);die;

        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") { //Yêu cầu thực hiện đến phương thức POST
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $result = $this->modelTaiKhoan->checkLogin($email, $password);

            // Nếu đăng nhập thành công → $result sẽ là email
            if ($result == $email) {
                // Lấy lại thông tin user để lưu vào session
                $sql = "SELECT * FROM tai_khoans WHERE email = :email LIMIT 1";
                $stmt = $this->modelTaiKhoan->conn->prepare($sql);
                $stmt->execute(['email' => $email]);
                $userData = $stmt->fetch();

                $_SESSION['user_client'] = $userData;

                header("Location: " . BASE_URL);
                exit();
            }

            // Nếu thất bại → $result là chuỗi báo lỗi
            $_SESSION['error'] = $result;
            $_SESSION['flash'] = true;
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client']['email'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']['email']);
                //lấy dữ liệu giỏ hàng của người dùng
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                }


                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                header('Location: ' . BASE_URL . '?act=gio-hang');

            } else {
                var_dump('Lỗi chưa đăng nhập');
                die;
            }
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION['user_client']['email'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']['email']);
            //lấy dữ liệu giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }
            require_once './views/gioHang.php';
            header('Location: ' . BASE_URL . '?act=gio-hang');

        } else {
            header("Location :" . BASE_URL . '?act=login');
        }
    }

    public function thanhToan()
    {
        if (isset($_SESSION['user_client']['email'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']['email']);
            //lấy dữ liệu giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }
            require_once './views/thanhToan.php';
            header('Location: ' . BASE_URL . '?act=gio-hang');
        } else {
            var_dump('Lỗi chưa đăng nhập');
            die;
        }

    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            $ma_don_hang = 'DH' . rand(1000, 9999);
            // thêm thông tin vào db
            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id

            );

            //Lấy thông tin giỏ hàng

            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

            //Lưu sản phẩm và chi tiết đơn hàng
            if ($donHang) {
                //Lấy ra toàn bộ sản phẩm trong giỏ hàng
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                //thêm từng sản phẩm từ giỏ hàng vào bản chi tiết đơn hàng
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];
                    $this->modelDonHang->addChiTietDonHang(
                        $donHang, //ID đơn hàng vừa tạo
                        $item['san_pham_id'], //ID sản phẩm
                        $donGia, //đơn giá
                        $item['so_luong'], //số lượng
                        $donGia * $item['so_luong'] //Thành tiền
                    );
                }

                // Sau khi thanh toán thì xác nhận xóa sản phẩm trong giỏ hàng
                //Xóa toàn bộ sản phẩm trong chi tiết gổi hàng
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);

                //xóa toàn bộ giỏ hàng ng dùng
                $this->modelGioHang->clearGioHang($tai_khoan_id);

                //Chuyển hướng về trang lịch sử mua hàng
                header('Location: ' . BASE_URL . '?act=lich-su-mua-hang');
                exit();
            } else {
                var_dump('Lỗi khi đặt hàng, vui lòng thử lại !!!');
            }
        }
    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            //Lấy thông tin tài khoản
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];

            //Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            //Lấy ra danh sách trạng thái thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            //Lấy ra danh sách tất cả đơn hàng của tài khoản
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once './views/lichSuMuaHang.php';
        } else {
            var_dump('Bạn chưa đăng nhập');
            die;
        }
    }
    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            //Lấy thông tin tài khoản
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            //lấy đơn truyền từ url
            $donHangId = $_GET['id'];
             //Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            //Lấy ra danh sách trạng thái thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            //Lấy ra thông tin đơn hàng theo ID
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            // echo "<pre>";
            // print_r($donHang);
            //Lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết 
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);
            // echo "<pre>";
            // print_r($chiTietDonHang);
            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                echo "Bạn không có quyền truy cập đơn hàng";
                exit();
            }

            require_once './views/chiTietMuaHang.php';

        } else {
            var_dump('Bạn chưa đăng nhập');
            die;
        }
    }
    public function huyDonHang()
    {
         if (isset($_SESSION['user_client'])) {
            //Lấy thông tin tài khoản
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            //lấy đơn truyền từ url
            $donHangId = $_GET['id'];

            //kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                echo "Bạn không có quyền hủy đơn hàng";
            }
            if($donHang['trang_thai_id'] != 1){
                echo "Chỉ đơn hàng ở trạng thái chưa xác nhận mới có thể hủy";
            }
            //Hủy
            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);
            header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
            exit();
        } else {
            var_dump('Bạn chưa đăng nhập');
            die;
        }
    }

    
}