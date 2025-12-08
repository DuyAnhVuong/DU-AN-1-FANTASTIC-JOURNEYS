<?php
class AdminTourController
{
    public $modelTour;
    public $modelDanhMuc;
    public $modelNCCPT;
    public $modelNCCKS;
    public $modelNCCDV;
    public $modelLichTrinh;
    public function __construct()
    {
        $this->modelTour = new AdminTour();
        $this->modelDanhMuc = new AdminDanhMuc();
        $this->modelNCCPT = new AdminNCCPT();
        $this->modelNCCKS = new AdminNCCKS();
        $this->modelNCCDV = new AdminNCCDV();
        $this->modelLichTrinh = new AdminLichTrinh();
    }

    public function danhSachTour()
    {
        $listTour = $this->modelTour->getAllTour();
         // 🎯 Lấy số liệu thống kê
    $totalTours = $this->modelTour->countAllTours();
    $domesticTours = $this->modelTour->countDomesticTours();
    $internationalTours = $this->modelTour->countInternationalTours();
    $totalRevenue = $this->modelTour->getTotalRevenue();
        require_once './views/tour/listTour.php';
    }
    public function formAddTour()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listNCCPT = $this->modelNCCPT->getAllNCCPT();
        $listNCCKS = $this->modelNCCKS->getAllNCCKS();
        $listNCCDV = $this->modelNCCDV->getAllNCCDV();
        $listTour = ['TourID' => null, 'TenTour' => '', 'LoaiTourID' => null, 'MoTa' => '', 'NgayTao' => '', 'Gia' => null, 'Image' => '', 'id_pt' => '', 'id_ks' => '', 'id_dichvu' => ''];

        require './views/tour/addTour.php';

    }
    public function postAddTour()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $TenTour = $_POST['TenTour'];
            $LoaiTourID = $_POST['LoaiTourID'];
            

            $MoTa = $_POST['MoTa'];
            $NgayTao = $_POST['NgayTao'];
            $Gia = $_POST['Gia'];
            $Image = $_FILES['Image'] ?? null;
            $id_pt = $_POST['id_pt'];
            $id_ks = $_POST['id_ks'];
            $id_dichvu = $_POST['id_dichvu'];
            // luu hinh anh vao
            $file_thumb = uploadFile($Image, './uploads/');

            $img_array = $_FILES['img_array'];


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
            if ($Image['error'] !== 0) {
                $errors['Image'] = 'Phải chọn ảnh sản phẩm';
            }
            if (empty($errors)) {
                $this->modelTour->insertTour($TenTour, $LoaiTourID, $MoTa, $NgayTao, $Gia, $file_thumb, $id_pt, $id_ks, $id_dichvu);
                header("location:" . BASE_URL_ADMIN . '?act=tour');
                exit();
            } else {
                require_once './views/tour/addTour.php';
            }
        }
    }
    public function formEditTour()
    {
        $id = $_GET['id'] ?? null;
        if (empty($id)) {
            header("Location: " . BASE_URL_ADMIN . '?act=tour');
            exit();
        }
        $tour = $this->modelTour->getDetailTour($id);
        $listAnhTour = $this->modelTour->getListAnhTour($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listNCCPT = $this->modelNCCPT->getAllNCCPT();
        $listNCCKS = $this->modelNCCKS->getAllNCCKS();
        $listNCCDV = $this->modelNCCDV->getAllNCCDV();
        if (!$tour) {
            header("Location: " . BASE_URL_ADMIN . '?act=tour');
            exit();
        }
        require_once './views/tour/editTour.php';
        deleteSessionError();
    }
    public function postEditTour()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['TourID'] ?? '';
            $TenTour = $_POST['TenTour'] ?? '';
            $AnhCu = $this->modelTour->getDetailTour($id);
            $old_file = $AnhCu['Image'];
            $Image = $_FILES['Image'] ?? '';
            $LoaiTourID = $_POST['LoaiTourID'] ?? '';
            $MoTa = $_POST['MoTa'] ?? '';
            $NgayTao = $_POST['NgayTao'] ?? '';
            $Gia = $_POST['Gia'] ?? '';
            $id_pt = $_POST['id_pt'] ?? '';
            $id_ks = $_POST['id_ks'] ?? '';
            $id_dichvu = $_POST['id_dichvu'] ?? '';
            $errors = [];

            if (empty($TenTour)) {
                $errors['TenTour'] = 'Tên tour không được để trống';
            }
            $_SESSION['error'] = $errors;

            if (isset($Image) && $Image['error'] == UPLOAD_ERR_OK) {
                //upload file  anh mơi len
                $new_file = uploadFile($Image, './uploads/');

                if (!empty($old_file)) { //nếu có ảnh thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;

            }
            if (empty($errors)) {
                // Sửa: Hàm updateTour chỉ nhận 5 tham số
                $this->modelTour->updateTour($id, $TenTour, $LoaiTourID, $MoTa, $NgayTao, $Gia, $new_file, $id_pt, $id_ks, $id_dichvu);

                // Chuyển hướng
                header("Location:" . BASE_URL_ADMIN . '?act=tour');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Sửa lỗi chuyển hướng khi có lỗi để tránh lỗi "Undefined array key" nếu bạn dùng $id_quan_tri sau đó.
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tour&id=' . $id);
                exit();
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


    //  public function getDetailLichTrinh(){
//         $id = $_GET['id'];
//         return $lt = $this->modelLichTrinh->getDetailLichTrinh($id);
//     }
    public function formDetail()
    {
        $id = $_GET['id'];

        // lấy thông tin tour
        $tour = $this->modelTour->getDetailTour($id);

        // lấy lịch trình đúng theo tour (QUAN TRỌNG)
        $lichtrinh = $this->modelLichTrinh->getLichTrinhTheoTour($id);
        // var_dump($lichtrinh);

        // lấy album ảnh tour
        $listAnhTour = $this->modelTour->getListAnhTour($id);

    require_once './views/lichtrinh/linhtrinhtour.php';
}
    public function deleteLichTrinh(){
        $id = $_GET['id'];
        $lichtrinh = $this->modelLichTrinh->getDetailLichTrinh($id);
        if($lichtrinh){
            $this->modelLichTrinh->delete($id);
        }
        header("location: " .BASE_URL_ADMIN. '?act=chi-tiet-lich-trinh&id='.$lichtrinh['TourID']);
        exit();
    }
    public function formThemLichTrinh()
{  
    $listTour = $this->modelTour->getAllTour();
    require_once './views/lichtrinh/addLichTrinh.php';
}


    public function postThemLichTrinh()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $TenTour = $_POST['TenTour'];
        $Ngay = $_POST['Ngay'];
        $ThoiGian = $_POST['ThoiGian'];
        $DiemThamQuan = $_POST['DiemThamQuan'];
        $HoatDong = $_POST['HoatDong'];
        $this->modelLichTrinh->insertLichTrinh($TenTour, $Ngay, $ThoiGian, $DiemThamQuan, $HoatDong);

        header("Location: " . BASE_URL_ADMIN . "?act=tour");
        exit();
    }
}


   
    // album anh

    // album anh
        public function postEditAnhTour()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['TourID'] ?? '';

            // Lấy danh sách ảnh hiện tại
            $listAnhTourCurrent = $this->modelTour->getListAnhTour($id);

            $img_array = $_FILES['img_array'];
            $img_delete = $_POST['img_delete'] ?? [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            $upload_file = []; // FIX

            // Xử lý upload file mới + cập nhật file cũ
            foreach ($img_array['name'] as $key => $value) {

                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {

                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);

                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,  // id ảnh cũ, nếu có
                            'file' => $new_file
                        ];
                    }
                }
            }

            // Cập nhật hoặc thêm ảnh
            foreach ($upload_file as $file_info) {

                if ($file_info['id']) {

                    // lấy ảnh cũ
                    $old_file = $this->modelTour->getListAnhTour($file_info['id'])['URL'];

                    // cập nhật ảnh
                    $this->modelTour->updateAnhTour($file_info['id'], $file_info['file']);

                    // xóa file cũ
                    deleteFile($old_file);

                } else {
                    // thêm mới ảnh
                    $this->modelTour->insertAlbumTour($id, $file_info['file']);
                }
            }

            // Xóa ảnh bị chọn để xóa
            foreach ($listAnhTourCurrent as $anh) {

                if (in_array($anh['id'], $img_delete)) {

                    deleteFile($anh['URL']);  // chỉ xóa 1 lần

                    $this->modelTour->deleteAnhTour($anh['id']);
                }
            }

            header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tour&id=' . $id);
            exit();
        }
    }

}