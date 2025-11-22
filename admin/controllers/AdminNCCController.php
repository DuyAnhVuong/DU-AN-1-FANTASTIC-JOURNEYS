<?php
class AdminNCCController
{
    public $modelNCC;

    public function __construct()
    {
        $this->modelNCC = new AdminNCC();
    }
    public function danhsachNCC()
    {
        $listNCC = $this->modelNCC->getAllNCC();
        require_once './views/ncc/listNCC.php';
    }

    public function formAddNCC()
    {
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
        $id = $_GET['id'];
        $ncc = $this->modelNCC->getDetailNCC($id);
        if ($ncc) {
            $this->modelNCC->deleteNCC($id);
        }
      header("Location: " . BASE_URL_ADMIN . '?act=ncc');
        exit();

    }
}
?>