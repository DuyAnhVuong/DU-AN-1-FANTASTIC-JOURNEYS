<?php
    class AdminBookingController{
        public $modelBooking;
        public $modelTour;
        public $modelNCC;
        public $modelLichTrinh;
        public $modelYeuCau;

    public function __construct()
    {
        $this->modelBooking = new AdminBooking();
        $this->modelTour = new AdminTour();
        $this->modelNCC = new AdminNCC();
        $this->modelLichTrinh = new AdminLichTrinhTheoTour();
        $this->modelYeuCau = new AdminYeuCau();
    }

    public function listbooking()
    {
       
        $listbooking = $this->modelBooking->getAllbooking();
       
        
        require_once './views/booking/listBooking.php';
    }

    public function formAddBooking()
    {
        $listTour = $this->modelTour->getAllTour();
        $listNCC = $this->modelNCC->getAllNCC(); 
        $listBooking = ['TourID' => null,'LoaiKhach' => '', 'TenNguoiDat' => '', 'SDT' => null, 'Email' => '', 'NgayVe' => '', 'NgayKhoiHanhDuKien' => '', 'TongSoKhach' => null, 'NCC_TourID' => null ] ;
        require './views/booking/addBooking.php';

    }
    public function postAddBooking()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $TourID = $_POST['TourID'] ?? null;
        $LoaiKhach = $_POST['LoaiKhach'] ?? null;
        $TenNguoiDat = $_POST['TenNguoiDat'] ?? null;
        $SDT = $_POST['SDT'] ?? null;
        $Email = $_POST['Email'] ?? null;
        $NgayKhoiHanhDuKien = $_POST['NgayKhoiHanhDuKien'] ?? null;
        $NgayVe = $_POST['NgayVe'] ?? null;
        $TongSoKhach = $_POST['TongSoKhach'] ?? null;
        // ⚠️ THÊM DÒNG NÀY:
        $NCC_TourID = $_POST['NCC_TourID'] ?? null; 

        $errors = [];
        // ... (Kiểm tra lỗi nếu cần)

        if (empty($errors)) {
            $this->modelBooking->insertBooking(
                $TourID,
                $LoaiKhach,
                $TenNguoiDat,
                $SDT,
                $Email,
                $NgayKhoiHanhDuKien,
                $NgayVe,
                $TongSoKhach,
                $NCC_TourID // ⚠️ THÊM THAM SỐ VÀO HÀM GỌI
            );

            // Chuyển hướng thành công
            header("Location: " . BASE_URL_ADMIN . '?act=list-booking');
            exit();
        } 
        // ...
    }
}

        public function deleteBK()
    {
        $id = $_GET['id'];
        


        $booking = $this->modelBooking->getDetailBooking($id);

        if ($booking) {
            $this->modelBooking->deleteBooking($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=list-booking');
        exit();

    }

    }
?>