<?php
class AdminNCCPTController{
    public $modelNCCPT;
    public function __construct(){
        $this->modelNCCPT = new AdminNCCPT();
    }
    public function listNCCPT(){
        $ncc_pt = $this->modelNCCPT->getAllNCCPT();
        require_once './views/nccpt/listNCCPT.php';
    }
    public function formAddNCCPT(){
        require_once './views/nccpt/addNCCPT.php';
    }
    public function postAddNCCPT(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $Name_PhuongTien = $_POST['Name_PhuongTien'];
            $errors = [];
            if(empty($Name_PhuongTien)){
                $errors['Name_PhuongTien'] = 'Tên nhà cung cấp phương tiện không được để trống';
            }
            if(empty($errors)){
                $this->modelNCCPT->insertNCCPT($Name_PhuongTien);
                header("location:".BASE_URL_ADMIN.'?act=list-ncc-pt');
                exit();
            }else{
                require_once './views/nccpt/addNCCPT.php';
            }
        }
    }
    public function formEditNCCPT(){
        $id_pt = $_GET['id_pt'];
        $ncc_pt = $this->modelNCCPT->getDetailNCCPT($id_pt);
            require_once './views/nccpt/editNCCPT.php';
        
    }
    public function postEditNCCPT(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_pt = $_POST['id_pt'];
            $Name_PhuongTien = $_POST['Name_PhuongTien'];
            $errors = [];
            if(empty($Name_PhuongTien)){
                $errors['Name_PhuongTien'] = 'Tên nhà cung cấp phương tiện không được để trống';
            }
            if(empty($errors)){
                $this->modelNCCPT->updateNCCPT($id_pt, $Name_PhuongTien);
                header("location:".BASE_URL_ADMIN.'?act=list-ncc-pt');
                exit();
            }else{
                $ncc_pt = $this->modelNCCPT->getDetailNCCPT($id_pt);
                require_once './views/nccpt/editNCCPT.php';
            }
        }
    }
    public function deleteNCCPT(){
        if(isset($_GET['id_pt'])){
            $id_pt = $_GET['id_pt'];
            $this->modelNCCPT->destroyNCCPT($id_pt);
            header("Location:".BASE_URL_ADMIN.'?act=list-ncc-pt');
            exit();
        }
    }
}
?>