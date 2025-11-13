<?php
class AdminTaiKhoanController{
    public $modelTaiKhoan;
    public function __construct(){
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelHDV = new AdminHDV();
    }
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }
    public function danhSachHDV(){
        $listHDV = $this->modelHDV->getAllHDV(2);
        require_once './views/taikhoan/hdv/listHDV.php';
    }
}
?>