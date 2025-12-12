<?php

class AdminHuongDanVienController
{
    public $modelHuongDanVien;

    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelHuongDanVien = new AdminHuongDanVien();
        $this->modelTaiKhoan = new AdminTaiKhoan();

    }
    public function danhsachHuongDanVien()
    {
        $listHuongDanVien = $this->modelHuongDanVien->getAllHuongDanVien();
        // var_dump($listHuongDanVien);
        // die();
        require_once './views/huongdanvien/listHuongDanVien.php';
    }

    public function formAddHuongDanVien()
    {
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        $listHuongDanVien = ['TaiKhoanID' => null, 'HoTen' => '', 'NgaySinh' => '', 'SDT' => '', 'Email' => '', 'ChungChi' => '', 'NgonNgu' => '', 'KinhNghiem' => '', 'PhanLoai' => '', 'Avatar' => ''];

        require './views/huongdanvien/addHuongDanVien.php';
    }
    public function postAddHuongDanVien()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // 1. Lấy dữ liệu từ POST
            $TaiKhoanID = $_POST['TaiKhoanID'] ?? null;
            $HoTen = $_POST['HoTen'] ?? '';
            $NgaySinh = $_POST['NgaySinh'] ?? '';
            $SDT = $_POST['SDT'] ?? '';
            $Email = $_POST['Email'] ?? '';
            $ChungChi = $_POST['ChungChi'] ?? '';
            $NgonNgu = $_POST['NgonNgu'] ?? '';
            $KinhNghiem = $_POST['KinhNghiem'] ?? '';
            $PhanLoai = $_POST['PhanLoai'] ?? '';
            $Avatar = $_FILES['Avatar'] ?? null;
            $file_thumb = uploadFile($Avatar, './uploads/');
            $img_array = $_FILES['img_array'];
            $errors = [];

            // 2. KIỂM TRA VALIDATION
            if (empty($TaiKhoanID)) {
                $errors['TaiKhoanID'] = 'Vui lòng chọn Tài khoản.';
            }
            if (empty($HoTen)) {
                $errors['HoTen'] = 'Họ tên không được để trống.';
            }
            if (empty($NgaySinh)) {
                $errors['NgaySinh'] = 'Ngày sinh không được để trống.';
            }
            if (empty($SDT)) {
                $errors['SDT'] = 'Số điện thoại không được để trống.';
            }
            if (empty($Email)) {
                $errors['Email'] = 'Email không được để trống.';
            }
            if (empty($ChungChi)) {
                $errors['ChungChi'] = 'Chứng chỉ không được để trống.';
            }
            if (empty($NgonNgu)) {
                $errors['NgonNgu'] = 'Ngôn ngữ không được để trống.';
            }
            if (empty($KinhNghiem)) {
                $errors['KinhNghiem'] = 'Kinh nghiệm không được để trống.';
            }
            if (empty($PhanLoai)) {
                $errors['PhanLoai'] = 'Phân loại không được để trống.';
            }

            // Kiểm tra lỗi upload file Avatar
            if ($Avatar['error'] !== 0) {
                $errors['Avatar'] = 'Phải chọn ảnh đại diện';
            }

            if (empty($errors)) {
                // 3. THÀNH CÔNG: Xử lý file và insert

                // => CHỈ GỌI UPLOAD FILE KHI KHÔNG CÓ LỖI VALIDATION


                $this->modelHuongDanVien->insertHuongDanVien(
                    $TaiKhoanID,
                    $HoTen,
                    $NgaySinh,
                    $SDT,
                    $Email,
                    $ChungChi,
                    $NgonNgu,
                    $KinhNghiem,
                    $PhanLoai,
                    $file_thumb
                );

                // Chuyển hướng
                header("location:" . BASE_URL_ADMIN . '?act=huongdanvien');
                exit();
            } else {
                // 4. THẤT BẠI: Tái tạo dữ liệu và hiển thị lại form

                // Biến $errors đã chứa lỗi và sẽ được truyền vào view.
                require_once './views/huongdanvien/addHuongDanVien.php';
            }
        }
    }

    public function formEditHuongDanVien()
    {
        $id = $_GET['id'] ?? null;

        if (empty($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=huongdanvien');
            exit();
        }
        $huongdanvien = $this->modelHuongDanVien->getDetailHuongDanVien($id);
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        if (!$huongdanvien) {
            header("Location: " . BASE_URL_ADMIN . '?act=huongdanvien');
            exit();
        }
        require_once './views/huongdanvien/editHuongDanVien.php';
        deleteSessionError();
    }
    public function postEditHuongDanVien()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['HDVID'] ?? '';


            $TaiKhoanID = $_POST['TaiKhoanID'] ?? '';

            $HoTen = $_POST['HoTen'] ?? '';

            $NgaySinh = $_POST['NgaySinh'] ?? '';


            $SDT = $_POST['SDT'] ?? '';

            $Email = $_POST['Email'] ?? '';
            $ChungChi = $_POST['ChungChi'] ?? '';
            $NgonNgu = $_POST['NgonNgu'] ?? '';
            $KinhNghiem = $_POST['KinhNghiem'] ?? '';
            $PhanLoai = $_POST['PhanLoai'] ?? '';
            $Avatar = $_FILES['Avatar'] ?? '';

            $AnhCu = $this->modelHuongDanVien->getDetailHuongDanVien($id);
            $old_file = $AnhCu['Avatar'];
            $errors = [];

            if (empty($TaiKhoanID)) {
                $errors['TaiKhoanID'] = 'TaiKhoanID không được để trống';
            }
            $_SESSION['error'] = $errors;

            if (isset($Avatar) && $Avatar['error'] == UPLOAD_ERR_OK) {
                //upload file  anh mơi len
                $new_file = uploadFile($Avatar, './uploads/');

                if (!empty($old_file)) { //nếu có ảnh thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;

            }
            if (empty($errors)) {
                // Sửa: Hàm updateTour chỉ nhận 5 tham số
                $this->modelHuongDanVien->updateHuongDanVien($id, $TaiKhoanID, $HoTen, $NgaySinh, $SDT, $Email, $ChungChi, $NgonNgu, $KinhNghiem, $PhanLoai, $new_file);

                // Chuyển hướng
                header("Location:" . BASE_URL_ADMIN . '?act=huongdanvien');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Sửa lỗi chuyển hướng khi có lỗi để tránh lỗi "Undefined array key" nếu bạn dùng $id_quan_tri sau đó.
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-huongdanvien&id=' . $id);
                exit();
            }
        }
    }

    // public function deleteHuongDanVien()
    // {
    //     $id = $_GET['id'];
    //     $tour = $this->modelHuongDanVien->getDetailHuongDanVien($id);
    //     if ($tour) {
    //         $this->modelHuongDanVien->delete($id);
    //     }
    //     header("location:" . BASE_URL_ADMIN . '?act=huongdanvien');
    //     exit();
    // }

    // public function formDetail()
    // {
    //     $id = $_GET['id'];
    //     $tour = $this->modelHuongDanVien->getDetailHuongDanVien($id);
    //     require_once './views/lichtrinh/linhtrinhtour.php';
    // }

    public function deleteHuongDanVien()
    {
        $id = $_GET['id_huongdanvien'];

        $huongdanvien = $this->modelHuongDanVien->getDetailHuongDanVien($id);
        if ($huongdanvien) {
            $this->modelHuongDanVien->delete($id);
        }
        header("location:" . BASE_URL_ADMIN . '?act=huongdanvien');
        exit();
    }






}