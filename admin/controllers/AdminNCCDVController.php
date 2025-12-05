<?php
class AdminNCCDVController{
    public $modelNCCDV;
    public function __construct(){
        $this->modelNCCDV = new AdminNCCDV();
    }
    public function listNCCDV(){
        $ncc_dv = $this->modelNCCDV->getAllNCCDV();
        require_once './views/nccdv/listNCCDV.php';
    }
    public function formAddNCCDV(){
        require_once './views/nccdv/addNCCDV.php';
    }
    public function postAddNCCDV(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $NameDV = $_POST['Name_DV'];
            $errors = [];
            if(empty($NameDV)){
                $errors['NameDV'] = 'Tên nhà cung cấp không được để trống';
            }
            if(empty($errors)){
                $this->modelNCCDV->insertNCCDV($NameDV);
                header("location:".BASE_URL_ADMIN.'?act=list-ncc-dv');
                exit();
            }else{
                require_once './views/nccdv/addNCCDV.php';
            }
        }
    }
    public function formEditNCCDV(){
        $id_dichvu = $_GET['id_dichvu'];
       
        $ncc_dv = $this->modelNCCDV->getDetailNCCDV($id_dichvu);
            require_once './views/nccdv/editNCCDV.php';
        
    }
    public function postEditNCCDV(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_dichvu = $_POST['id_dichvu'];
             
            $NameDV = $_POST['Name_DV'];
            $errors = [];
            if(empty($NameDV)){
                $errors['NameDV'] = 'Tên nhà cung cấp không được để trống';
            }
            if(empty($errors)){
                $this->modelNCCDV->updateNCCDV($id_dichvu, $NameDV);
                header("location:".BASE_URL_ADMIN.'?act=list-ncc-dv');
                exit();
            }else{
                $ncc_dv = $this->modelNCCDV->getDetailNCCDV($id_dichvu);
                require_once './views/nccdv/editNCCDV.php';
            }
        }
    }
    public function deleteNCCDV(){
        if(isset($_GET['id_dichvu'])){
            $id_dichvu = $_GET['id_dichvu'];
            $this->modelNCCDV->destroyNCCDV($id_dichvu);
            header("Location:".BASE_URL_ADMIN.'?act=list-ncc-dv');
            exit();
        }
    }
}
?>