<?php
class AdminStatusController{
    public $modelStatus;
    public function __construct(){
        $this->modelStatus = new AdminStatus();
    }
    public function danhSachStatus(){
        $listStatus = $this->modelStatus->getAllStatus();
        require_once './views/status/listStatus.php';
    }
}
?>