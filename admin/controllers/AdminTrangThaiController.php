<?php
class AdminTrangThaiController
{
    public $modelTrangThai;
    public function __construct()
    {
        $this->modelTrangThai = new AdminTrangThai();
    }
    public function danhSachTrangThai()
    {
        $listTrangThai = $this->modelTrangThai->getAllTrangThai();
        require_once './views/trangthai/listTrangThai.php';
    }
    public function formAddTrangThai()
    {
        require_once './views/trangthai/addTrangThai.php';
    }
    public function postAddTrangThai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $BookingID = $_POST['BookingID'];
            $TrangThai = $_POST['TrangThai'];
            $ThoiGianCapNhat = $_POST['ThoiGianCapNhat'];
            $NguoiCapNhatID = $_POST['NguoiCapNhatID'];
            $errors = [];
            if (empty($BookingID)) {
                $errors['BookingID'] = 'Booking ID không được để trống';
            }
            if (empty($TrangThai)) {
                $errors['TrangThai'] = 'Trạng thái không được để trống';
            }
            if (empty($ThoiGianCapNhat)) {
                $errors['ThoiGianCapNhat'] = 'Thời gian cập nhật không được để trống';
            }
            if (empty($NguoiCapNhatID)) {
                $errors['NguoiCapNhatID'] = 'Người cập nhật ID không được để trống';
            }
            if (empty($errors)) {
                $this->modelTrangThai->insertTrangThai($BookingID, $TrangThai, $ThoiGianCapNhat, $NguoiCapNhatID);
                header("location:" . BASE_URL_ADMIN . '?act=list-trang-thai');
                exit();
            } else {
                require_once './views/trangthai/addTrangThai.php';
            }
        }
    }
    public function formEditTrangThai()
    {
        $id = $_GET['id_trang_thai'];
        $trangThai = $this->modelTrangThai->getDetailTrangThai($id);
        if ($trangThai) {
            require_once './views/trangthai/editTrangThai.php';
        } else {
            header("Location:" . BASE_URL_ADMIN . '?act=list-trang-thai');
            exit();
        }
    }
    public function postEditTrangThai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['TrangThaiID'] ?? '';
            $BookingID = $_POST['BookingID'];
            $TrangThai = $_POST['TrangThai'];
            $ThoiGianCapNhat = $_POST['ThoiGianCapNhat'];
            $NguoiCapNhatID = $_POST['NguoiCapNhatID'];
            $errors = [];
            if (empty($BookingID)) {
                $errors['BookingID'] = 'Booking ID không được để trống';
            }
            if (empty($TrangThai)) {
                $errors['TrangThai'] = 'Trạng thái không được để trống';
            }
            if (empty($ThoiGianCapNhat)) {
                $errors['ThoiGianCapNhat'] = 'Thời gian cập nhật không được để trống';
            }
            if (empty($NguoiCapNhatID)) {
                $errors['NguoiCapNhatID'] = 'Người cập nhật ID không được để trống';
            }
            if (empty($errors)) {
                $this->modelTrangThai->updateTrangThai($id, $BookingID, $TrangThai, $ThoiGianCapNhat, $NguoiCapNhatID);
                header("Location:" . BASE_URL_ADMIN . '?act=list-trang-thai');
                exit();
            } else {
                $trangThai = [
                    'id' => $id,
                    'BookingID' => $BookingID,
                    'TrangThai' => $TrangThai,
                    'ThoiGianCapNhat' => $ThoiGianCapNhat,
                    'NguoiCapNhatID' => $NguoiCapNhatID
                ];
                require_once './views/trangthai/editTrangThai.php';
            }
        }
    }
    public function deleteTrangThai()
    {
        $id = $_GET['id_trang_thai'];
        $trangThai = $this->modelTrangThai->getDetailTrangThai($id);
        if ($trangThai) {
            $this->modelTrangThai->deleteTrangThai($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=list-trang-thai');
        exit();
    }
}
?>