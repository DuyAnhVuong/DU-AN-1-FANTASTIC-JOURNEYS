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
}
?>