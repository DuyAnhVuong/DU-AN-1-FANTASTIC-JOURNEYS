<?php
class AdminNCCController
{
    public $modelNCC;
    public $modelTour;
    public function __construct()
    {
        $this->modelNCC = new AdminNCC();

        $this->modelTour = new AdminTour();
    }
    public function danhsachNCC()
    {
        $listNCC = $this->modelNCC->getAllNCC();
        require_once './views/ncc/listNCC.php';
    }
    // Trong AdminNCCController.php

    public function formAddNCC()
    {
        // Chỉ lấy danh sách Tour (danh mục sản phẩm)
        $listTour = $this->modelTour->getAllTour();

        // Khởi tạo $listNCC là một mảng rỗng hoặc có khóa an toàn để view không bị lỗi khi truy cập $listNCC['TourID']
        $listNCC = ['TourID' => null, 'LoaiDichVu' => '', 'TenNCC' => '', 'ThongTinLienHe' => ''];
        require './views/ncc/addNCC.php';
    }
    public function postAddNCC()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $TourID = $_POST['TourID'];


            $LoaiDichVu = $_POST['LoaiDichVu'];
            $TenNCC = $_POST['TenNCC'];
            $ThongTinLienHe = $_POST['ThongTinLienHe'];

            $errors = [];

            if (empty($TourID)) {
                $errors['TourID'] = 'TourID không được để trống';
            }

            if (empty($LoaiDichVu)) {
                $errors['LoaiDichVu'] = 'LoaiDichVu không được để trống';
            }
            if (empty($TenNCC)) {
                $errors['TenNCC'] = 'TenNCC không được để trống';
            }
            if (empty($ThongTinLienHe)) {
                $errors['ThongTinLienHe'] = 'ThongTinLienHe không được để trống';
            }
            if (empty($errors)) {
                $this->modelNCC->insertNCC($TourID, $LoaiDichVu, $TenNCC, $ThongTinLienHe);
                header("location:" . BASE_URL_ADMIN . '?act=ncc');
                exit();

            } else {
                require_once './views/ncc/addNCC.php';


            }

        }
    }
    public function deleteNCC()
    {
        $id = $_GET['id_ncc'];



        $ncc = $this->modelNCC->getDetailNCC($id);

        if ($ncc) {
            $this->modelNCC->deletecc($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=ncc');
        exit();

    }


    public function formEditNCC()
    {
        $id = $_GET['id-ncc'] ?? null;

        if (empty($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=ncc');
            exit();
        }
        $listNCC = $this->modelNCC->getDetailNCC($id);
        $listTour = $this->modelTour->getAllTour();
        // $listNCC = $this->modelNCC->getDetailNCC($id);
        if (!$listNCC) {
            header("Location: " . BASE_URL_ADMIN . '?act=ncc');
            exit();
        }
        require_once './views/ncc/editNCC.php';
        deleteSessionError();
    }

    public function postEditNCC()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['NCC_TourID'] ?? '';
            $TourID = $_POST['TourID'] ?? '';
            $LoaiDichVu = $_POST['LoaiDichVu'] ?? '';
            $TenNCC = $_POST['TenNCC'] ?? '';
            $ThongTinLienHe = $_POST['ThongTinLienHe'] ?? '';
            // $NCC_TourID = $_POST['NCC_TourID'] ?? '';
            $errors = [];



            if (empty($errors)) {
                // Sửa: Hàm updateTour chỉ nhận 5 tham số
                $this->modelNCC->updateNCC($id, $TourID, $LoaiDichVu, $TenNCC, $ThongTinLienHe);

                // Chuyển hướng
                header("Location:" . BASE_URL_ADMIN . '?act=ncc');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Sửa lỗi chuyển hướng khi có lỗi để tránh lỗi "Undefined array key" nếu bạn dùng $id_quan_tri sau đó.
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-ncc&id-ncc' . $id);

                exit();
            }
        }
    }
}
?>