<?php
class AdminTourRunController
{
    public $modelTourRun;
    public $modelTour;
    public $modelHuongDanVien;
    public $modelBooking;
    public function __construct()
    {
        $this->modelTourRun = new AdminTourRun();

        $this->modelHuongDanVien = new AdminHuongDanVien();
        $this->modelTour = new AdminTour();
        $this->modelBooking = new AdminBooking();
    }
    public function danhsachTourRun()
    {
        $listTourRun = $this->modelTourRun->getAllTourRun();
        require_once './views/tourrun/listTourRun.php';
    }

    public function formAddTourRun()
    {

        $listTour = $this->modelTour->getAllTour();
        $listHuongDanVien = $this->modelHuongDanVien->getAllHuongDanVien();
        $listBooking = $this->modelBooking->getAllBooking();

        // Khởi tạo $listXemKhachHang là một mảng rỗng hoặc có khóa an toàn để view không bị lỗi khi truy cập $listXemKhachHang['TourID']
        $listTourRun = ['BookingID' => null, 'TourID' => '', 'HDVID' => '', 'NgayKhoiHanhThucTe' => '', 'NgayKetThuc' => '', 'DiemTapTrung' => '', 'TrangThaiVanHanh' => ''];
        require './views/tourrun/addTourRun.php';
    }
    public function postAddTourRun()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $BookingID = $_POST['BookingID'];
            // var_dump($BookingID);
            // die;
            $TourID = $_POST['TourID'];
            // var_dump($TourID);
            // die;
            $HDVID = $_POST['HDVID'];
            // var_dump($HDVID);
            // die;
            $NgayKhoiHanhThucTe = $_POST['NgayKhoiHanhThucTe'];
            // var_dump($NgayKhoiHanhThucTe);
            // die;
            $NgayKetThuc = $_POST['NgayKetThuc'];
            // var_dump($NgayKetThuc);
            // die;
            $DiemTapTrung = $_POST['DiemTapTrung'];
            // var_dump($DiemTapTrung);
            // die;
            $TrangThaiVanHanh = $_POST['TrangThaiVanHanh'];
            // var_dump($TrangThaiVanHanh);
            // die;


            $errors = [];

            if (empty($BookingID)) {
                $errors['BookingID'] = 'HDVID không được để trống';
            }

            if (empty($TourID)) {
                $errors['TourID'] = 'TourID không được để trống';
            }
            if (empty($HDVID)) {
                $errors['HDVID'] = 'HDVID không được để trống';
            }
            if (empty($NgayKhoiHanhThucTe)) {
                $errors['NgayKhoiHanhThucTe'] = 'NgayKhoiHanhThucTe không được để trống';
            }
            if (empty($NgayKetThuc)) {
                $errors['NgayKetThuc'] = 'NgayKetThuc không được để trống';
            }
            if (empty($NgayKetThuc)) {
                $errors['NgayKetThuc'] = 'NgayKetThuc không được để trống';
            }
            if (empty($NgayKetThuc)) {
                $errors['NgayKetThuc'] = 'NgayKetThuc không được để trống';
            }
            if (empty($errors)) {
                $this->modelTourRun->insertTourRun($BookingID, $TourID, $HDVID, $NgayKhoiHanhThucTe, $NgayKetThuc, $DiemTapTrung, $TrangThaiVanHanh);
                header("location:" . BASE_URL_ADMIN . '?act=tourrun');
                exit();

            } else {
                require_once './views/tourrun/addTourRun.php';


            }

        }
    }




}
?>