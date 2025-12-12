<?php
class AdminXemKhachHangController
{
    public $modelXemKhachHang;
    public $modelTour;

    public function __construct()
    {
        $this->modelXemKhachHang = new AdminXemKhachHang();

        $this->modelTour = new AdminTour();
    }
    public function danhsachXemKhachHang()
    {
        // Lấy danh sách tour cho dropdown
        $listTour = $this->modelTour->getAllTour();

        // Kiểm tra lọc theo tour
        $tour_id = $_GET['tour_id'] ?? '';

        if (!empty($tour_id)) {
            // Lọc theo tour
            $sql = "SELECT khach_hang_theo_tour.*, booking.TongSoKhach, tour.TenTour
                FROM khach_hang_theo_tour
                INNER JOIN booking ON khach_hang_theo_tour.BookingID = booking.BookingID
                INNER JOIN tour ON khach_hang_theo_tour.TourID = tour.TourID
                WHERE khach_hang_theo_tour.TourID = :tour_id";
            $stmt = $this->modelXemKhachHang->conn->prepare($sql);
            $stmt->execute([':tour_id' => $tour_id]);
            $listXemKhachHang = $stmt->fetchAll();
        } else {
            // Hiển thị tất cả nếu không lọc
            $listXemKhachHang = $this->modelXemKhachHang->getAllXemKhachHang();
        }

        require_once './views/xemkhachhang/listXemKhachHang.php';
    }

    public function formAddXemKhachHang()
    {


        $listTour = $this->modelTour->getAllTour();
        // Khởi tạo $listXemKhachHang là một mảng rỗng hoặc có khóa an toàn để view không bị lỗi khi truy cập $listXemKhachHang['TourID']
        $listXemKhachHang = ['Ten_KH' => null, 'TourID' => '', 'SDT' => '', 'BookingID' => '', 'Gioi_Tinh' => '', 'Nam_Sinh' => ''];
        require './views/xemkhachhang/addXemKhachHang.php';
    }
    public function postAddXemKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $TourID = $_POST['TourID'];
            $Ten_KH = $_POST['Ten_KH'];
            $TourID = $_POST['TourID'];
            $SDT = $_POST['SDT'];
            $BookingID = $_POST['BookingID'];
            $Gioi_Tinh = $_POST['Gioi_Tinh'];
            $Nam_Sinh = $_POST['Nam_Sinh'];


            $errors = [];

            if (empty($TourID)) {
                $errors['TourID'] = 'TourID không được để trống';
            }
            if (empty($Ten_KH)) {
                $errors['Ten_KH'] = 'Ten_KH không được để trống';
            }
            if (empty($TourID)) {
                $errors['TourID'] = 'TourID không được để trống';
            }

            if (empty($SDT)) {
                $errors['SDT'] = 'SDT không được để trống';
            }
            if (empty($BookingID)) {
                $errors['BookingID'] = 'BookingID không được để trống';
            }
            if (empty($Gioi_Tinh)) {
                $errors['Gioi_Tinh'] = 'Gioi_Tinh không được để trống';
            }
            if (empty($Nam_Sinh)) {
                $errors['Nam_Sinh'] = 'Nam_Sinh không được để trống';
            }
            if (empty($errors)) {
                $this->modelXemKhachHang->insertXemKhachHang($TourID, $Ten_KH, $SDT, $BookingID, $Gioi_Tinh, $Nam_Sinh);
                header("location:" . BASE_URL_ADMIN . '?act=xemkhachhang');
                exit();

            } else {
                require_once './views/xemkhachhang/addXemKhachHang.php';


            }

        }
    }

    public function formEditXemKhachHang()
    {
        $id = $_GET['id-xkh'] ?? null;

        if (empty($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=xemkhachhang');
            exit();
        }
        $listXemKhachHang = $this->modelXemKhachHang->getDetailXemKhachHang($id);
        $listTour = $this->modelTour->getAllTour();

        if (!$listXemKhachHang) {
            header("Location: " . BASE_URL_ADMIN . '?act=xemkhachhang');
            exit();
        }
        require_once './views/xemkhachhang/editXemKhachHang.php';
        deleteSessionError();
    }

    public function postEditXemKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['KH_ID'] ?? '';
            $TourID = $_POST['TourID'] ?? '';

            $Ten_KH = $_POST['Ten_KH'] ?? '';

            $SDT = $_POST['SDT'] ?? '';

            // CẢNH BÁO: Đã sửa lỗi khoảng trắng 'BookingID ' thành 'BookingID'
            $BookingID = $_POST['BookingID'] ?? '';

            $Gioi_Tinh = $_POST['Gioi_Tinh'] ?? '';
            $Nam_Sinh = $_POST['Nam_Sinh'] ?? '';

            $errors = [];


            if (empty($errors)) {
                // KHÔNG CÓ LỖI: Thực hiện cập nhật
                $this->modelXemKhachHang->updateXemKhachHang($id, $TourID, $Ten_KH, $SDT, $BookingID, $Gioi_Tinh, $Nam_Sinh);

                // Chuyển hướng thành công
                header("Location:" . BASE_URL_ADMIN . '?act=xemkhachhang');
                exit();
            } else {
                // CÓ LỖI: Lưu session và chuyển hướng về form sửa
                $_SESSION['flash'] = true;


                // Dòng này đã được sửa lỗi cú pháp từ câu trả lời trước
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-xemkhachhang&id-xkh=' . $id);

                exit();
            }
        }
    }

    public function deleteXemkhachHang()
    {
        $id = $_GET['id_xkh'];
        $xkh = $this->modelXemKhachHang->getDetailXemKhachHang($id);

        if ($xkh) {
            $this->modelXemKhachHang->delete($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=xemkhachhang');
        exit();

    }





}
?>
