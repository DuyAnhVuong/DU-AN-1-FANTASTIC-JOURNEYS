<?php
// Giả định đã có các class AdminBooking, AdminTour, AdminNCCDV, AdminNCCPT, AdminNCCKS, AdminStatus

class HDVBookingController
{
    public $modelBooking;
    public $modelTour;
    public $modelNCC;
    public $modelLichTrinh;
    public $modelYeuCau;
    public $modelNCCDV;
    public $modelNCCPT;
    public $modelNCCKS;
    public $modelStatus;

    public function __construct()
    {
        $this->modelBooking = new HDVBooking();
        $this->modelTour = new HDVTour();
        // $this->modelNCC = new HDVNCC();
        // $this->modelLichTrinh = new HDVLichTrinhTheoTour();
        // $this->modelYeuCau = new HDVYeuCau();
        // $this->modelStatus = new HDVStatus();
        // $this->modelNCCDV = new HDVNCCDV();
        // $this->modelNCCPT = new HDVNCCPT();
        // $this->modelNCCKS = new HDVNCCKS();
    }

    public function listbooking()
    {
        $listbooking = $this->modelBooking->getAllbooking();
        // Hiển thị thông báo thành công nếu có
        $success_message = $_SESSION['success_message'] ?? null;
        if ($success_message) unset($_SESSION['success_message']);
        
        require_once './views/booking/listBooking.php';
    }

    public function formAddBooking()
    {
        // Yêu cầu: listTour phải có cột Gia
        $listTour = $this->modelTour->getAllTour(); 
        $NCCDV = $this->modelNCCDV->getAllNCCDV();
        $NCCPT = $this->modelNCCPT->getAllNCCPT();
        $NCCKS = $this->modelNCCKS->getAllNCCKS();
        $listTrangThai = $this->modelStatus->getAllStatus();
        
        // Form sẽ sử dụng $_SESSION['error'] và $_SESSION['old_data'] nếu có
        require './views/booking/addBooking.php';
        
        // Xóa session lỗi và dữ liệu cũ sau khi hiển thị xong trên form
        if (isset($_SESSION['error'])) unset($_SESSION['error']);
        if (isset($_SESSION['old_data'])) unset($_SESSION['old_data']);
    }
    
    public function postAddBooking()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $TourID = $_POST['TourID'] ?? null;
            $LoaiKhach = $_POST['LoaiKhach'] ?? null;
            $TenNguoiDat = trim($_POST['TenNguoiDat'] ?? '');
            $SDT = trim($_POST['SDT'] ?? '');
            $Email = trim($_POST['Email'] ?? '');
            $NgayKhoiHanhDuKien = $_POST['NgayKhoiHanhDuKien'] ?? null;
            $NgayVe = $_POST['NgayVe'] ?? null;
            $TongSoKhach = (int)($_POST['TongSoKhach'] ?? 0);
            
            $NCC_KS = $_POST['id_ks'] ?? null;
            $NCC_PT = $_POST['id_pt'] ?? null;
            $NCC_DV = $_POST['id_dichvu'] ?? null;
            $TrangThaiID = $_POST['id_trang_thai'] ?? null;

            $errors = [];
        
            // SỬA LỖI: SỬ DỤNG IF ĐỘC LẬP ĐỂ THU THẬP TẤT CẢ LỖI
            if (empty($TourID)) {
                $errors['TourID'] = 'Vui lòng chọn Tour.';
            } 
            if (empty($LoaiKhach)) {
                $errors['LoaiKhach'] = 'Vui lòng chọn Loại Khách.';
            }
            if (empty($TenNguoiDat)) {
                $errors['TenNguoiDat'] = 'Tên Khách Hàng không được để trống.';
            }
            if (empty($SDT)) {
                $errors['SDT'] = 'Số Điện Thoại không được để trống.';
            } else if (!preg_match('/^0[0-9]{9,10}$/', $SDT)) {
                 $errors['SDT'] = 'Số Điện Thoại không hợp lệ (10-11 số, bắt đầu bằng 0).';
            }
            if (empty($Email)) {
                $errors['Email'] = 'Email không được để trống.';
            } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                 $errors['Email'] = 'Email không đúng định dạng.';
            }
            if (empty($NgayKhoiHanhDuKien)) {
                $errors['NgayKhoiHanhDuKien'] = 'Ngày Khởi Hành không được để trống.';
            }
            if (empty($NgayVe)) {
                $errors['NgayVe'] = 'Ngày Về không được để trống.';
            } else if ($NgayKhoiHanhDuKien && $NgayVe && $NgayVe < $NgayKhoiHanhDuKien) {
                 $errors['NgayVe'] = 'Ngày Về phải sau Ngày Khởi Hành.';
            }
            if ($TongSoKhach <= 0) {
                $errors['TongSoKhach'] = 'Số Lượng Khách phải lớn hơn 0.';
            }
            if (empty($TrangThaiID)) {
                $errors['id_trang_thai'] = 'Vui lòng chọn Trạng Thái Booking.';
            }
            // HẾT SỬA LỖI VALIDATION

            if (empty($errors)) {
                
                $result = $this->modelBooking->insertBooking(
                    $TourID,
                    $LoaiKhach,
                    $TenNguoiDat,
                    $SDT,
                    $Email,
                    $NgayKhoiHanhDuKien,
                    $NgayVe,
                    $TongSoKhach,
                    $NCC_KS,
                    $NCC_PT,
                    $NCC_DV,
                    $TrangThaiID
                );
                
                if ($result) {
                     $_SESSION['success_message'] = "Tạo Booking thành công!";
                } else {
                     $_SESSION['error_message'] = "Lỗi hệ thống: Không thể chèn Booking vào CSDL.";
                }
                
                header("Location: " . BASE_URL_ADMIN . '?act=list-booking');
                exit();
            } else {
                // Lưu lại tất cả lỗi và dữ liệu đã nhập để quay lại form
                $_SESSION['error'] = $errors;
                $_SESSION['old_data'] = $_POST; 
                header("Location: " . BASE_URL_ADMIN . '?act=form-add-booking');
                exit();
            }
        }
    }

    public function detailBooking()
    {
        $id = $_GET['id'];
        $bk = $this->modelBooking->getDetailBooking($id);
        require_once './views/booking/detailBooking.php';
    }

    public function formEditBooking()
    {
        $id = $_GET['id'];
        $detailBooking = $this->modelBooking->getDetailBooking($id);
        $listTour = $this->modelTour->getAllTour();
        $NCCDV = $this->modelNCCDV->getAllNCCDV();
        $NCCPT = $this->modelNCCPT->getAllNCCPT();
        $NCCKS = $this->modelNCCKS->getAllNCCKS();
        $listTrangThai = $this->modelStatus->getAllStatus();
        
        if (!$detailBooking) {
            header("Location:" . BASE_URL_ADMIN . '?act=list-booking');
            exit();
        }
        
        // Nếu không có dữ liệu cũ từ POST (ví dụ: lần đầu vào form), thì dùng dữ liệu từ DB
        if (!isset($_SESSION['old_data'])) {
             $_SESSION['old_data'] = $detailBooking;
        }

        require_once './views/booking/editBooking.php';
        
        // Xóa session lỗi và dữ liệu cũ sau khi hiển thị xong trên form
        if (isset($_SESSION['error'])) unset($_SESSION['error']);
        if (isset($_SESSION['old_data'])) unset($_SESSION['old_data']);
    }

    
    public function editBooking()
    {
        // Giữ nguyên logic editBooking (vì nó đã dùng IF độc lập)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            $TourID = $_POST['TourID'];
            $LoaiKhach = $_POST['LoaiKhach'];
            $TenNguoiDat = trim($_POST['TenNguoiDat']);
            $SDT = trim($_POST['SDT']);
            $Email = trim($_POST['Email']);
            $NgayKhoiHanhDuKien = $_POST['NgayKhoiHanhDuKien'];
            $NgayVe = $_POST['NgayVe'];
            $TongSoKhach = (int)($_POST['TongSoKhach'] ?? 0);
            $NCC_KS = $_POST['id_ks'];
            $NCC_PT = $_POST['id_pt'];
            $NCC_DV = $_POST['id_dichvu'];
            $TrangThaiID = $_POST['id_trang_thai'];

            $errors = [];
            
            // Validation
            if (empty($TourID)) { $errors['TourID'] = 'Tên tour không được để trống'; } 
            if (empty($LoaiKhach)) { $errors['LoaiKhach'] = 'Loại khách không được để trống'; }
            if (empty($TenNguoiDat)) { $errors['TenNguoiDat'] = 'Tên người đặt không được để trống'; } 
            if (empty($SDT)) { $errors['SDT'] = 'SDT không được để trống'; }
             else if (!preg_match('/^0[0-9]{9,10}$/', $SDT)) { $errors['SDT'] = 'Số Điện Thoại không hợp lệ.'; }
            if (empty($Email)) { $errors['Email'] = 'Email không được để trống'; }
             else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) { $errors['Email'] = 'Email không đúng định dạng.'; }
            if (empty($NgayKhoiHanhDuKien)) { $errors['NgayKhoiHanhDuKien'] = 'Ngày khởi hành không được để trống'; } 
            if (empty($NgayVe)) { $errors['NgayVe'] = 'Ngày về không được để trống'; } 
            else if ($NgayKhoiHanhDuKien && $NgayVe && $NgayVe < $NgayKhoiHanhDuKien) { $errors['NgayVe'] = 'Ngày Về phải sau Ngày Khởi Hành.'; }
            if ($TongSoKhach < 1) { $errors['TongSoKhach'] = 'Tổng khách phải lớn hơn 0'; }
            if (empty($TrangThaiID)) { $errors['id_trang_thai'] = 'Trạng thái Booking không được để trống'; }
            

            if (empty($errors)) {
                
                $result = $this->modelBooking->editBooking(
                    $id, $TourID, $LoaiKhach, $TenNguoiDat, $SDT, $Email, 
                    $NgayKhoiHanhDuKien, $NgayVe, $TongSoKhach, $NCC_KS, 
                    $NCC_PT, $NCC_DV, $TrangThaiID
                );
                
                 if ($result) {
                     $_SESSION['success_message'] = "Cập nhật Booking ID #$id thành công!";
                } else {
                     $_SESSION['error_message'] = "Lỗi hệ thống: Không thể cập nhật Booking.";
                }
                
                header("Location:" . BASE_URL_ADMIN . '?act=list-booking');
                exit();
            } else {
                $_SESSION['error'] = $errors; 
                $_SESSION['old_data'] = $_POST;
                header("Location:" . BASE_URL_ADMIN . '?act=form-edit-booking&id=' . $id);
                exit();
            }
        }
    }

    // Giữ nguyên các hàm khác (cancelBooking)
    // ...
    public function cancelBooking()
    {
        if (isset($_GET['act']) && $_GET['act'] == 'huy-booking') {

            $bookingId = $_GET['id'] ?? null;

            if (!empty($bookingId) && is_numeric($bookingId)) {

                $isCancelled = $this->modelBooking->cancelBooking($bookingId);

                if ($isCancelled) {
                    $_SESSION['success_message'] = "Booking ID #$bookingId đã được hủy thành công. Trạng thái đã chuyển sang Hủy.";
                } else {
                    $_SESSION['error_message'] = "Lỗi: Không tìm thấy Booking ID #$bookingId hoặc không thể cập nhật trạng thái.";
                }
            } else {
                $_SESSION['error_message'] = "Lỗi: Yêu cầu hủy booking không hợp lệ.";
            }

            header("Location: " . BASE_URL_ADMIN . '?act=list-booking');
            exit();
        }
    }
}