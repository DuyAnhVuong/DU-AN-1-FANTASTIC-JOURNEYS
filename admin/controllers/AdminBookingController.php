    <?php
    class AdminBookingController
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
            $this->modelBooking = new AdminBooking();
            $this->modelTour = new AdminTour();
            $this->modelNCC = new AdminNCC();
            $this->modelLichTrinh = new AdminLichTrinhTheoTour();
            $this->modelYeuCau = new AdminYeuCau();
            $this->modelStatus = new AdminStatus();
            $this->modelNCCDV = new AdminNCCDV();
            $this->modelNCCPT = new AdminNCCPT();
            $this->modelNCCKS = new AdminNCCKS();
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
            $NCCDV = $this->modelNCCDV->getAllNCCDV();
            $NCCPT = $this->modelNCCPT->getAllNCCPT();
            $NCCKS = $this->modelNCCKS->getAllNCCKS();
            $listTrangThai = $this->modelStatus->getAllStatus();
            $listBooking = ['TourID' => null, 'LoaiKhach' => null, 'TenNguoiDat' => null, 'SDT' => null, 'Email' => null, 'NgayVe' => null, 'NgayKhoiHanhDuKien' => null, 'TongSoKhach' => null, 'NCC_TourID' => null];
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

                $NCC_KS = $_POST['id_ks'] ?? null;
                $NCC_PT = $_POST['id_pt'] ?? null;
                $NCC_DV = $_POST['id_dichvu'] ?? null;
                $TrangThaiID = $_POST['id_trang_thai'] ?? null;

                $errors = [];
                // ... (Kiểm tra lỗi nếu cần)
                if (empty($TourID)) {
                    $errors['TourID'] = 'Tên danh mục không được để trống';
                } else if (empty($LoaiKhach)) {
                    $errors['LoaiKhach'] = 'Tên danh mục không được để trống';
                } else if (empty($TenNguoiDat)) {
                    $errors['TenNguoiDat'] = 'Tên danh mục không được để trống';
                } else if (empty($SDT)) {
                    $errors['SDT'] = 'Tên danh mục không được để trống';
                } else if (empty($NgayKhoiHanhDuKien)) {
                    $errors['NgayKhoiHanhDuKien'] = 'Tên danh mục không được để trống';
                } else if (empty($NgayVe)) {
                    $errors['NgayVe'] = 'Tên danh mục không được để trống';
                } else if (empty($TongSoKhach)) {
                    $errors['TongSoKhach'] = 'Tên danh mục không được để trống';
                }

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
                        $NCC_KS,
                        $NCC_PT,
                        $NCC_DV,
                        $TrangThaiID
                    );

                    // Chuyển hướng thành công
                    header("Location: " . BASE_URL_ADMIN . '?act=list-booking');
                    exit();
                }
                // ...
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
            require_once './views/booking/editBooking.php';
            deleteSessionError();
        }

        public function editBooking()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'] ;
                $TourID = $_POST['TourID'] ?? null;
                $LoaiKhach = $_POST['LoaiKhach'] ?? null;
                $TenNguoiDat = $_POST['TenNguoiDat'] ?? null;
                $SDT = $_POST['SDT'] ?? null;
                $Email = $_POST['Email'] ?? null;
                $NgayKhoiHanhDuKien = $_POST['NgayKhoiHanhDuKien'] ?? null;
                $NgayVe = $_POST['NgayVe'] ?? null;
                $TongSoKhach = $_POST['TongSoKhach'] ?? null;
                $NCC_KS = $_POST['id_ks'] ?? null;
                $NCC_PT = $_POST['id_pt'] ?? null;
                $NCC_DV = $_POST['id_dichvu'] ?? null;
                $TrangThaiID = $_POST['id_trang_thai'] ?? null;

                $errors = [];
                if (empty($TourID)) {
                    $errors['Tour'] = 'Tên tour không được để trống';
                } else if (empty($LoaiKhach)) {
                    $errors['LoaiKhach'] = 'Loại khách không được để trống';
                } else if (empty($TenNguoiDat)) {
                    $errors['TenNguoiDat'] = 'Tên người đặt không được để trống';
                } else if (empty($SDT)) {
                    $errors['SDT'] = 'SDT không được để trống';
                } else if (empty($NgayKhoiHanhDuKien)) {
                    $errors['NgayKhoiHanhDuKien'] = 'Ngày khởi hành không được để trống';
                } else if (empty($NgayVe)) {
                    $errors['NgayVe'] = 'Ngày về không được để trống';
                } else if (empty($TongSoKhach)) {
                    $errors['TongSoKhach'] = 'Tổng khách không được để trống';
                }
                if (empty($errors)) {
                    $this->modelBooking->editBooking(
                        $id,
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
                    header("Location:" . BASE_URL_ADMIN . '?act=list-booking');
                    exit();
                } else {
                    $_SESSION['flash'] = true;
                    // Sửa lỗi chuyển hướng khi có lỗi để tránh lỗi "Undefined array key" nếu bạn dùng $id_quan_tri sau đó.
                    header("Location:" . BASE_URL_ADMIN . '?act=form-edit-booking&id=' . $id);
                    exit();
                }
            }
        }

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
    ?>