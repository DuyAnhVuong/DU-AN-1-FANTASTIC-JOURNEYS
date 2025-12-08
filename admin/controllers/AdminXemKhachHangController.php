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
        $listXemKhachHang = $this->modelXemKhachHang->getAllXemKhachHang();
        require_once './views/xemkhachhang/listXemKhachHang.php';
    }

    public function formAddXemKhachHang()
    {

        $listTour = $this->modelTour->getAllTour();

        // Khởi tạo $listXemKhachHang là một mảng rỗng hoặc có khóa an toàn để view không bị lỗi khi truy cập $listXemKhachHang['TourID']
        $listXemKhachHang = ['Ten_KH' => null, 'SDT' => '', 'BookingID' => '', 'Gioi_Tinh' => '', 'Nam_Sinh' => ''];
        require './views/xemkhachhang/addXemKhachHang.php';
    }
    public function postAddXemKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Ten_KH = $_POST['Ten_KH'];
            $SDT = $_POST['SDT'];
            $BookingID = $_POST['BookingID'];
            $Gioi_Tinh = $_POST['Gioi_Tinh'];
            $Nam_Sinh = $_POST['Nam_Sinh'];


            $errors = [];

            if (empty($Ten_KH)) {
                $errors['Ten_KH'] = 'Ten_KH không được để trống';
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
                $this->modelXemKhachHang->insertXemKhachHang($Ten_KH, $SDT, $BookingID, $Gioi_Tinh, $Nam_Sinh);
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

            $Ten_KH = $_POST['Ten_KH'] ?? '';

            $SDT = $_POST['SDT'] ?? '';

            // CẢNH BÁO: Đã sửa lỗi khoảng trắng 'BookingID ' thành 'BookingID'
            $BookingID = $_POST['BookingID'] ?? '';

            $Gioi_Tinh = $_POST['Gioi_Tinh'] ?? '';
            $Nam_Sinh = $_POST['Nam_Sinh'] ?? '';

            $errors = [];


            if (empty($errors)) {
                // KHÔNG CÓ LỖI: Thực hiện cập nhật
                $this->modelXemKhachHang->updateXemKhachHang($id, $Ten_KH, $SDT, $BookingID, $Gioi_Tinh, $Nam_Sinh);

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