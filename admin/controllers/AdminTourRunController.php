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
            if (empty($DiemTapTrung)) {
                $errors['DiemTapTrung'] = 'NgayKetThuc không được để trống';
            }
            if (empty($TrangThaiVanHanh)) {
                $errors['TrangThaiVanHanh'] = 'NgayKetThuc không được để trống';
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

    public function formEditTourRun()
    {
        $id = $_GET['id-tr'] ?? null;

        if (empty($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=tourrun');
            exit();
        }
        $listTourRun = $this->modelTourRun->getDetailTourRun($id);
        $listTour = $this->modelTour->getAllTour();
        $listBooking = $this->modelBooking->getAllBooking();
        $listHuongDanVien = $this->modelHuongDanVien->getAllHuongDanVien();
        // $listNCC = $this->modelNCC->getDetailNCC($id);
        if (!$listTourRun) {
            header("Location: " . BASE_URL_ADMIN . '?act=tourrun');
            exit();
        }
        require_once './views/tourrun/editTourRun.php';
        deleteSessionError();
    }

    public function postEditTourRun()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['TourRunID'] ?? '';

            $BookingID = $_POST['BookingID'] ?? '';

            $TourID = $_POST['TourID'] ?? '';

            $HDVID = $_POST['HDVID'] ?? '';

            $NgayKhoiHanhThucTe = $_POST['NgayKhoiHanhThucTe'] ?? '';

            $NgayKetThuc = $_POST['NgayKetThuc'] ?? '';
            // var_dump($id);
            // die;
            $DiemTapTrung = $_POST['DiemTapTrung'] ?? '';

            $TrangThaiVanHanh = $_POST['TrangThaiVanHanh'] ?? '';
            // var_dump($id);
            // die;
            // $NCC_TourID = $_POST['NCC_TourID'] ?? '';
            $errors = [];



            if (empty($errors)) {
                // Sửa: Hàm updateTour chỉ nhận 5 tham số
                $this->modelTourRun->updateTourRun($id, $BookingID, $TourID, $HDVID, $NgayKhoiHanhThucTe, $NgayKetThuc, $DiemTapTrung, $TrangThaiVanHanh);

                // Chuyển hướng
                header("Location:" . BASE_URL_ADMIN . '?act=tourrun');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Sửa lỗi chuyển hướng khi có lỗi để tránh lỗi "Undefined array key" nếu bạn dùng $id_quan_tri sau đó.
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tourrun&id-tr=' . $id);

                exit();
            }
        }
    }

    public function deleteTourRun()
    {
        $id = $_GET['id_tr'];
        $tourrun = $this->modelTourRun->getDetailTourRun($id);

        if ($tourrun) {
            $this->modelTourRun->delete($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=tourrun');
        exit();

    }








}
?>