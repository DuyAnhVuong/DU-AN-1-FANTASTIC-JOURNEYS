<?php
class AdminTourController
{
    public $modelTour;

    public function __construct()
    {
        $this->modelTour = new AdminTour();
    }

    public function danhSachTour()
    {
        $listTour = $this->modelTour->getAllTour();
        require_once './views/tour/listTour.php';
    }
    public function formAddTour()
    {
        require './views/tour/addTour.php';

    }
    public function postAddTour()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $TenTour = $_POST['TenTour'];

            $LoaiTourID = $_POST['LoaiTourID'];

            $MoTa = $_POST['MoTa'];
            $NgayTao = $_POST['NgayTao'];
            $Gia = $_POST['Gia'];

            $Image = $_FILES['Image'] ?? null;

            // luu hinh anh vao
            $file_thumb = uploadFile($Image, './uploads/');

            $img_array = $_FILES['img_array'];


            $errors = [];
            if (empty($TenTour)) {
                $errors['TenTour'] = 'Tên tour không được để trống';
            }
            if (empty($LoaiTourID)) {
                $errors['LoaiTourID'] = 'Tên tour không được để trống';
            }
            if (empty($NgayTao)) {
                $errors['NgayTao'] = 'Tên tour không được để trống';
            }
            if (empty($Gia)) {
                $errors['Gia'] = 'Tên tour không được để trống';
            }
            if ($Image['error'] !== 0) {
                $errors['Image'] = 'Phải chọn ảnh sản phẩm';
            }
            if (empty($errors)) {
                $this->modelTour->insertTour($TenTour, $LoaiTourID, $MoTa, $NgayTao, $Gia, $file_thumb);
                header("location:" . BASE_URL_ADMIN . '?act=tour');
                exit();
            } else {
                require_once './views/tour/addTour.php';
            }
        }
    }
    public function formEditTour()
    {
        $id = $_GET['id'] ?? null;
        if (empty($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=tour');
            exit();
        }
        $tour = $this->modelTour->getDetailTour($id);
        if (!$tour) {
            header("Location: " . BASE_URL_ADMIN . '?act=tour');
            exit();
        }
        require_once './views/tour/editTour.php';
        deleteSessionError();
    }
    public function postEditTour()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['TourID'] ?? '';
            $TenTour = $_POST['TenTour'] ?? '';
            $AnhCu = $this->modelTour->getDetailTour($id);
            $old_file = $AnhCu['Image'];
            $Image = $_FILES['Image'] ?? '';
            $LoaiTourID = $_POST['LoaiTourID'] ?? '';
            $MoTa = $_POST['MoTa'] ?? '';
            $NgayTao = $_POST['NgayTao'] ?? '';
            $Gia = $_POST['Gia'] ?? '';
            $errors = [];

            if (empty($TenTour)) {
                $errors['TenTour'] = 'Tên tour không được để trống';
            }
            $_SESSION['error'] = $errors;

            if (isset($Image) && $Image['error'] == UPLOAD_ERR_OK) {
                //upload file  anh mơi len
                $new_file = uploadFile($Image, './uploads/');
                
                if (!empty($old_file)) { //nếu có ảnh thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;

            }
            if (empty($errors)) {
                // Sửa: Hàm updateTour chỉ nhận 5 tham số
                $this->modelTour->updateTour($id, $TenTour, $LoaiTourID, $MoTa, $NgayTao, $Gia, $new_file);
                
                // Chuyển hướng
                header("Location:" . BASE_URL_ADMIN . '?act=tour');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Sửa lỗi chuyển hướng khi có lỗi để tránh lỗi "Undefined array key" nếu bạn dùng $id_quan_tri sau đó.
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tour&id=' . $id);
                exit();
            }
        }
    }

    public function deleteTour()
    {
        $id = $_GET['id'];
        $tour = $this->modelTour->getDetailTour($id);
        if ($tour) {
            $this->modelTour->delete($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=tour');
        exit();
    }
}