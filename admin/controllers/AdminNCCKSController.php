<?php
class AdminNCCKSController{
    public $modelNCCKS;
    public function __construct(){
        $this->modelNCCKS = new AdminNCCKS();
    }
    public function listNCCKS(){
        $ncc_ks = $this->modelNCCKS->getAllNCCKS();
        require_once './views/nccks/listNCCKS.php';
    }
    public function formAddNCCKS(){
        require_once './views/nccks/addNCCKS.php';
    }
    public function postAddNCCKS(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $NameKS = $_POST['NameKS'];
            $errors = [];
            if(empty($NameKS)){
                $errors['NameKS'] = 'Tên nhà cung cấp không được để trống';
            }
            if(empty($errors)){
                $this->modelNCCKS->insertNCCKS($NameKS);
                header("location:".BASE_URL_ADMIN.'?act=list-ncc-ks');
                exit();
            }else{
                require_once './views/nccks/addNCCKS.php';
            }
        }
    }
    public function formEditNCCKS(){
        $id_ks = $_GET['id_ks'];
        $ncc_ks = $this->modelNCCKS->getDetailNCCKS($id_ks);
            require_once './views/nccks/editNCCKS.php';
        
    }
    public function postEditNCCKS(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_ks = $_POST['id_ks'];
            $NameKS = $_POST['NameKS'];
            $errors = [];
            if(empty($NameKS)){
                $errors['NameKS'] = 'Tên nhà cung cấp không được để trống';
            }
            if(empty($errors)){
                $this->modelNCCKS->updateNCCKS($id_ks, $NameKS);
                header("location:".BASE_URL_ADMIN.'?act=list-ncc-ks');
                exit();
            }else{
                $ncc_ks = $this->modelNCCKS->getDetailNCCKS($id_ks);
                require_once './views/nccks/editNCCKS.php';
            }
        }
    }
    public function deleteNCCKS(){
        if(isset($_GET['id_ks'])){
            $id_ks = $_GET['id_ks'];
            $this->modelNCCKS->destroyNCCKS($id_ks);
            header("Location:".BASE_URL_ADMIN.'?act=list-ncc-ks');
            exit();
        }
    }
}
?>