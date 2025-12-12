<?php
class HDVYeuCauController
{
    public $modelYeuCau;
    public $modelKhachHang;
    public $modelKhachLe;

    public function __construct()
    {
        $this->modelYeuCau = new HDVYeuCau();
        // $this->modelKhachHang = new HDVKhachHang();
        $this->modelKhachLe = new HDVKhachLe();
    }


    public function danhSachYeuCau()
    {
        $listYeuCau = $this->modelYeuCau->getAllYeuCau();
        require_once './views/yeucau/listYeuCau.php';
    }
    public function formAddYeuCau()
    {

        $yc = ['KhachID' => '', 'BookingID' => '', 'LoaiYeuCau' => '', 'ChiTiet' => ''];
        $KhachLe = $this->modelKhachLe->getAllKhachLe();

        require_once './views/yeucau/addYeuCau.php';
    }

    public function postAddYeuCau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $KhachID = $_POST['KhachID'];
            $BookingID = $_POST['BookingID'];

            $LoaiYeuCau = $_POST['LoaiYeuCau'];

            $ChiTiet = $_POST['ChiTiet'];

            $errors = [];
            if (empty($KhachID) || !is_numeric($KhachID)) {
                $errors['KhachID'] = 'Khách hàng ID không hợp lệ';
            }
            if (empty($BookingID) || !is_numeric($BookingID)) {
                $errors['BookingID'] = 'Booking ID không hợp lệ';
            }
            if (empty($LoaiYeuCau)) {
                $errors['LoaiYeuCau'] = 'Loại yêu cầu không được để trống';
            }
            if (empty($ChiTiet)) {
                $errors['ChiTiet'] = 'Chi tiết không được để trống';
            }

            if (empty($errors)) {
                $this->modelYeuCau->insertYeuCau($KhachID, $BookingID, $LoaiYeuCau, $ChiTiet);
                header("location:" . BASE_URL_ADMIN . '?act=yeu-cau-dac-biet');
                exit();
            } else {
                // Nếu có lỗi, load lại form với dữ liệu cũ và lỗi
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=them-yeu-cau-dac-biet');
            }
        }
    }

    public function formEditYeuCau()
    {
        $id = $_GET['id_yeucau'];
        $yeuCauDetail = $this->modelYeuCau->getDetailYeuCau($id);

        require_once './views/yeucau/editYeuCau.php';
    }


    public function postEditYeuCau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $YeuCauID = $_POST['YeuCauID'];
            $LoaiYeuCau = $_POST['LoaiYeuCau'];
            $ChiTiet = $_POST['ChiTiet'];

            $errors = [];
            if (empty($LoaiYeuCau)) {
                $errors['LoaiYeuCau'] = 'Loại yêu cầu không được để trống';
            }
            if (empty($ChiTiet)) {
                $errors['ChiTiet'] = 'Chi tiết không được để trống';
            }

            if (empty($errors)) {
                $this->modelYeuCau->updateYeuCau($YeuCauID, $LoaiYeuCau, $ChiTiet);
                header("location:" . BASE_URL_ADMIN . '?act=yeu-cau-dac-biet');
                exit();
            } else {

                $yeuCauDetail = [
                    'YeuCauID' => $YeuCauID,
                    'LoaiYeuCau' => $LoaiYeuCau,
                    'ChiTiet' => $ChiTiet
                ];
                require_once './views/yeucau/editYeuCau.php';
            }
        }
    }
    public function deleteYeuCau()
    {
        $id = $_GET['id'];


        $ncc = $this->modelYeuCau->getDetailYeuCau($id);

        if ($ncc) {
            $this->modelYeuCau->deleteYeuCau($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=yeu-cau-dac-biet');
        exit();

    }
}
?>