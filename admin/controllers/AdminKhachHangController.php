<?php
class AdminKhachHangController
{
    public $modelKhachHang;
    public function __construct()
    {
        $this->modelKhachHang = new AdminKhachHang();
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelKhachHang->getAllKhachHang();
        require_once './views/khachhang/listKhachHang.php';
    }
    public function formAddKhachHang()
    {
        require_once './views/khachhang/addKhachHang.php';
    }
    public function postAddKhachHang()
    {
        // Xử lý thêm khách hàng
        $this->modelKhachHang->insertKhachHang($_POST['TenKH'], $_POST['CheckInStatus']);
        header('Location: ' . BASE_URL_ADMIN . '?act=khach-hang');
    }
    public function formEditKhachHang()
    {
        $id = $_GET['id_khach_hang'];
        $khachHang = $this->modelKhachHang->getDetailKhachHang($id);
        if ($khachHang) {
            require_once './views/khachhang/editKhachHang.php';
        }else{
            header("Location:" . BASE_URL_ADMIN . '?act=khach-hang');
            exit();
        }
        
    }
    public function postEditKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['DSSK_ID'];
            $ten_khach_hang = $_POST['TenKH'];
            $check_in_status = $_POST['CheckInStatus'];
            $errors = [];
            if (empty($ten_khach_hang)) {
                $errors['ten_khach_hang'] = 'Tên khách hàng không được để trống';
            }
            if (empty($errors)) {
                $this->modelKhachHang->updateKhachHang($id, $ten_khach_hang, $check_in_status);
                header("Location:" . BASE_URL_ADMIN . '?act=khach-hang');
                exit();
            } else {
                $khachHang = ['id' => $id, 'TenKH' => $ten_khach_hang, 'CheckInStatus' => $check_in_status];
                require_once './views/khachhang/editKhachHang.php';
            }
        }
    }
    public function deleteKhachHang(){
        $id = $_GET['id_khach_hang'];
        $khachHang = $this->modelKhachHang->getDetailKhachHang($id);
        if ($khachHang) {
            $this->modelKhachHang->destroyKhachHang($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=khach-hang');
        exit();
    }
}
?>