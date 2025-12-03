<?php
    class AdminLichTrinhTheoTourController{
        public $modelLichTrinh;
        public $modelTour;
        // public $modelNCC;

    public function __construct()
    {
        $this->modelLichTrinh= new AdminLichTrinhTheoTour();
        $this->modelTour = new AdminTour();
        // $this->modelNCC = new AdminNCC();
    }

    public function getListLichTrinh(){
        $id = $_GET['id'];
        var_dump($id);
        $tour = $this->modelTour->getDetailTour($id);
           $list = $this->modelLichTrinh->getAllLichTrinh();
        require_once './views/lichtrinh/lichtrinhtheotour.php';
    }

    // public function listLichTrinh()
    // {
    //    $id = $_GET['id'];
    
    //    $lichTrinh = $this->modelLichTrinh->getDetailLichTrinh($id);
    //     require_once './views/lichtrinh/lichtrinhtheotour.php';
    // }

  

    // public function formAddBooking()
    // {
        
    //     $listTour = $this->modelTour->getAllTour();
    //     $listNCC = $this->modelNCC->getAllNCC(); 
        
    //     $listBooking = ['TourID' => null,'LoaiKhach' => '', 'TenNguoiDat' => '', 'SDT' => null, 'Email' => '', 'NgayVe' => '', 'NgayKhoiHanhDuKien' => '', 'TongSoKhach' => null, 'NCC_TourID' => null ] ;
    //     require './views/booking/addBooking.php';

    // }
    //  public function postAddBooking()
    // {
    //    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         // SỬA LỖI: Cần nhận dữ liệu POST theo tên 'name', 'email', 'vaitro' 
    //         // vì đó là thuộc tính name trong HTML form.
    //         $TourID = $_POST['TourID']; 
    //           // Lấy tên từ form
    //         $LoaiKhach = $_POST['LoaiKhach'];
            
    //         $TenNguoiDat = $_POST['TenNguoiDat'];
             
    //         $SDT = $_POST['SDT'];
           
            
    //         $Email = $_POST['Email'];
          
    //         $NgayKhoiHanhDuKien = $_POST['NgayKhoiHanhDuKien'];
           
    //         $NgayVe = $_POST['NgayVe'];
     
    //         $TongSoKhach = $_POST['TongSoKhach'];
     
            
            

    //         $errors = [];
    //         if (empty($TourID)) {
    //             $errors['TourID'] = 'Tên không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
    //         }

    //         if (empty($LoaiKhach)) {
    //             $errors['LoaiKhach'] = 'Email không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
    //         }
    //         if (empty($SDT)) {
    //             $errors['SDT'] = 'Email không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
    //         }
    //         if (empty($Email)) {
    //             $errors['Email'] = 'Email không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
    //         }
    //         if (empty($NgayKhoiHanhDuKien)) {
    //             $errors['NgayKhoiHanhDuKien'] = 'Ngày khởi hành không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
    //         }
    //         if (empty($NgayVe)) {
    //             $errors['Ngay$NgayVe'] = 'Ngày về không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
    //         }
    //         if (empty($TongSoKhach)) {
    //             $errors['TongSoKhach'] = 'Số khách không được để trống'; // Sửa lỗi khóa của lỗi cũng phải khớp
    //         }

    //         // ... (các phần kiểm tra lỗi khác)

    //         $_SESSION['error'] = $errors; // Gán errors

    //         if (empty($errors)) {


    //             // Tham số truyền vào Model là đúng
    //             $this->modelBooking->insertBooking(
    //                 $TourID,
    //                 $LoaiKhach,
    //                 $TenNguoiDat,
    //                 $SDT,
    //                 $Email,
    //                 $NgayKhoiHanhDuKien,
    //                 $NgayVe,
    //                 $TongSoKhach

    //             );

    //             // Chuyển hướng thành công
    //             header("Location: " . BASE_URL_ADMIN . '?act=list-booking');
    //             exit();
    //         } else {
    //             // SỬA LỖI CHUYỂN HƯỚNG KHI CÓ LỖI (Về form thêm)
    //             $_SESSION['flash'] = true;
    //             header("Location: " . BASE_URL_ADMIN . '?act=form-add-booking');
    //             exit();
    //         }
    //     }
    // }

    }
?>