<?php
    class AdminBookingController{
        public $modelBooking;
        public $modelTour;
        public $modelNCC;
        public $modelLichTrinh;
        public $modelYeuCau;
        public $modelTrangThai;

    public function __construct()
    {
        $this->modelBooking = new AdminBooking();
        $this->modelTour = new AdminTour();
        $this->modelNCC = new AdminNCC();
        $this->modelLichTrinh = new AdminLichTrinhTheoTour();
        $this->modelYeuCau = new AdminYeuCau();
        $this->modelTrangThai = new AdminTrangThai();
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
        $listTrangThai = $this->modelTrangThai->getAllTrangThai();
        $listBooking = ['TourID' => null,'LoaiKhach' => '', 'TenNguoiDat' => '', 'SDT' => null, 'Email' => '', 'NgayVe' => '', 'NgayKhoiHanhDuKien' => '', 'TongSoKhach' => null, 'NCC_TourID' => null ] ;
        require './views/booking/addBooking.php';

    }
    public function postAddBooking()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $TourID = $_POST['TourID'] ?? null;
        var_dump($TourID);
        $LoaiKhach = $_POST['LoaiKhach'] ?? null;
        $TenNguoiDat = $_POST['TenNguoiDat'] ?? null;
        $SDT = $_POST['SDT'] ?? null;
        $Email = $_POST['Email'] ?? null;
        $NgayKhoiHanhDuKien = $_POST['NgayKhoiHanhDuKien'] ?? null;
        $NgayVe = $_POST['NgayVe'] ?? null;
        $TongSoKhach = $_POST['TongSoKhach'] ?? null;
        // ⚠️ THÊM DÒNG NÀY:
        $NCC_TourID = $_POST['NCC_TourID'] ?? null; 
        $TrangThaiID = $_POST['TrangThaiID'] ?? null; 

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
                $NCC_TourID,
                $TrangThaiID
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
    public function detailBooking()
    {
        $id = $_GET['id'];
        $dtbooking = $this->modelBooking->getDetailBooking($id);
        $trang_thai = $this->modelTrangThai->getAllTrangThai();
        require_once './views/booking/detailBooking.php';
        
    }

    public function cancelBooking()
    {
        $id = $_GET['id'] ?? null;
        
        if (empty($id)) {
            // Xử lý lỗi nếu không có ID
            header("location:" . BASE_URL_ADMIN . '?act=booking');
            exit();
        }

        // 1. Cập nhật trạng thái thành 'Hủy'
        $this->modelBooking->updateStatus($id, 'Hủy'); 

        // 2. Chuyển hướng về trang danh sách Booking
        header("location:" . BASE_URL_ADMIN . '?act=list-booking');
        exit();
    }
}
?>