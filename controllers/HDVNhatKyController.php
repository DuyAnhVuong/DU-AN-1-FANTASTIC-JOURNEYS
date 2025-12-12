<?php
class HDVNhatKyController
{
    public $modelNhatKy;

    public function __construct()
    {
        $this->modelNhatKy = new HDVNhatKy();
    }

    public function danhSachNhatKy()
    {
        $listNhatKy = $this->modelNhatKy->getAllNhatKy();
        require_once './views/nhatky/listNhatKy.php';
    }
    public function formAddNhatKy()
    {
        require_once './views/nhatky/addNhatKy.php';

    }
    public function postAddNhatKy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mo_ta = $_POST['mo_ta'];
            $ngay = $_POST['ngay'];
            $errors = [];
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Không được để trống';
            }
            if (empty($errors)) {
                $this->modelNhatKy->insertNhatKy($mo_ta, $ngay);
                header("location:" . BASE_URL . '?act=list-nhat-ky');
                exit();
            } else {
                require_once './views/nhatky/listNhatKy.php';
            }
        }
    }
    public function formEditNhatKy()
    {
        $id_nhat_ky = $_GET['id_nhat_ky'];
        $nhatky = $this->modelNhatKy->getDetailNhatKy($id_nhat_ky);
        if ($nhatky) {
            require_once './views/nhatky/editNhatKy.php';
        } else {
            header("Location:" . BASE_URL . '?act=list-nhat-ky');
            exit();
        }
    }
    public function postEditNhatKy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_nhat_ky = $_POST['id_nhat_ky'];
            $mo_ta = $_POST['mo_ta'];
            $ngay = $_POST['ngay'];
            $errors = [];
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Không được để trống';
            }
            if (empty($errors)) {
                $this->modelNhatKy->updateNhatKy($id_nhat_ky, $mo_ta, $ngay);
                header("Location:" . BASE_URL . '?act=list-nhat-ky');
                exit();
            } else {
                $nhatKy = ['id_nhat_ky' => $id_nhat_ky, 'mo_ta' => $mo_ta, 'ngay' => $ngay];
                require_once './views/nhatky/editNhatKy.php';
            }
        }
    }
    public function deleteNhatKy()
    {
        $id_nhat_ky = $_GET['id_nhat_ky'];
        $nhatky = $this->modelNhatKy->getDetailNhatKy($id_nhat_ky);
        if ($nhatky) {
            $this->modelNhatKy->destroyNhatKy($id_nhat_ky);
        }
        header("location:" . BASE_URL . '?act=list-nhat-ky');
        exit();
    }   
}
?>