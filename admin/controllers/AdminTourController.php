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
            $Image = $_POST['Image'];
            $LoaiTourID = $_POST['LoaiTourID'];
            $MoTa = $_POST['MoTa'];
            $NgayTao = $_POST['NgayTao'];
            $Gia = $_POST['Gia'];
            
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
            if (empty($errors)) {
                $this->modelTour->insertTour($TenTour,  $LoaiTourID, $MoTa, $NgayTao , $Gia,$Image);
                header("location:" . BASE_URL_ADMIN . '?act=tour');
                exit();
            } else {
                require_once './views/tour/addTour.php';
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