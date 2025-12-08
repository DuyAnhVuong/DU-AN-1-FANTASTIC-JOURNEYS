    <?php
    class AdminBooking
    {
        public $conn;
        public function __construct()
        {
            $this->conn = connectDB();
        }

        public function getAllbooking()
        {
            try {
                $sql = "SELECT booking.*, tour.TenTour, tour.Gia, ncc_dichvu.Name_DV, ncc_phuongtien.Name_PhuongTien, ncc_khachsan.NameKS,trang_thai.status
                    FROM booking 
                    INNER JOIN tour ON booking.TourID = tour.TourID
                    INNER JOIN ncc_dichvu ON booking.id_dichvu = ncc_dichvu.id_dichvu
                    INNER JOIN ncc_phuongtien ON booking.id_pt = ncc_phuongtien.id_pt
                    INNER JOIN ncc_khachsan ON booking.id_ks = ncc_khachsan.id_ks
                    INNER JOIN trang_thai ON booking.id_trang_thai = trang_thai.id_trang_thai";
                $stmt = $this->conn->prepare($sql);

                $stmt->execute();

                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }
        public function insertBooking($TourID, $LoaiKhach, $TenNguoiDat, $SDT, $Email, $NgayKhoiHanhDuKien, $NgayVe, $TongSoKhach, $NCC_KS, $NCC_PT, $NCC_DV, $TrangThaiID)
        // ⚠️ THÊM $NCC_TourID VÀO DANH SÁCH THAM SỐ
        {
            try {
                $sql = "INSERT INTO `booking` (`TourID`,`LoaiKhach`, `TenNguoiDat`, `SDT`, `Email`, `NgayKhoiHanhDuKien`,`NgayVe`, `TongSoKhach`, `id_ks`, `id_pt`, `id_dichvu`, `id_trang_thai`) 
                    VALUES (:TourID, :LoaiKhach, :TenNguoiDat, :SDT, :Email, :NgayKhoiHanhDuKien, :NgayVe, :TongSoKhach, :id_ks, :id_pt, :id_dichvu, :id_trang_thai);";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':TourID' => $TourID,
                    ':LoaiKhach' => $LoaiKhach,
                    ':TenNguoiDat' => $TenNguoiDat,
                    ':SDT' => $SDT,
                    ':Email' => $Email,
                    ':NgayVe' => $NgayVe,
                    ':NgayKhoiHanhDuKien' => $NgayKhoiHanhDuKien,
                    ':TongSoKhach' => $TongSoKhach,
                    ':id_ks' => $NCC_KS,
                    ':id_pt' => $NCC_PT,
                    ':id_dichvu' => $NCC_DV,
                    ':id_trang_thai' => $TrangThaiID
                ]);

                return true;
            } catch (Exception $e) {
                echo "Lỗi khi chèn Booking: " . $e->getMessage();
            }
        }
        public function getDetailBooking($id)
        {
            try {
                $sql = "SELECT booking.*, tour.TenTour, tour.TourID
                    FROM booking 
                    INNER JOIN tour ON booking.TourID = tour.TourID
                    INNER JOIN ncc_dichvu ON booking.id_dichvu = ncc_dichvu.id_dichvu
                    INNER JOIN ncc_phuongtien ON booking.id_pt = ncc_phuongtien.id_pt
                    INNER JOIN ncc_khachsan ON booking.id_ks = ncc_khachsan.id_ks
                    WHERE BookingID =:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id' => $id]);
                return $stmt->fetch();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }



        public function editBooking($id, $TourID, $LoaiKhach, $TenNguoiDat, $SDT, $Email, $NgayKhoiHanhDuKien, $NgayVe, $TongSoKhach, $NCC_KS, $NCC_PT, $NCC_DV, $TrangThaiID)
        {
            try {
                // Cập nhật TrangThaiID của Booking có BookingID = :id
                $sql = "UPDATE booking SET TourID=:TourID, LoaiKhach=:LoaiKhach, TenNguoiDat=:TenNguoiDat, SDT=:SDT, Email=:Email, NgayKhoiHanhDuKien=:NgayKhoiHanhDuKien, NgayVe=:NgayVe, TongSoKhach=:TongSoKhach, id_ks=:id_ks, id_pt=:id_pt, id_dichvu=:id_dichvu, id_trang_thai=:id_trang_thai WHERE BookingID=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':TourID' => $TourID,
                    ':LoaiKhach' => $LoaiKhach,
                    ':TenNguoiDat' => $TenNguoiDat,
                    ':SDT' => $SDT,
                    ':Email' => $Email,
                    ':NgayKhoiHanhDuKien' => $NgayKhoiHanhDuKien,
                    ':NgayVe' => $NgayVe,
                    ':TongSoKhach' => $TongSoKhach,
                    ':id_ks' => $NCC_KS,
                    ':id_pt' => $NCC_PT,
                    ':id_dichvu' => $NCC_DV,
                    ':id_trang_thai' => $TrangThaiID,
                    ':id' => $id
                ]);
                return true;
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
                return false;
            }
        }
        public function cancelBooking($id): bool
        {
            // Xác định ID trạng thái Hủy (giá trị cố định 4)
            $statusCancelID = 4;

            try {
                // Sử dụng tham số ràng buộc CHUẨN (? hoặc :ten_tham_so)
                $sql = "UPDATE booking SET id_trang_thai = :status_id WHERE BookingID = :id";

                // Chuẩn bị statement
                $stmt = $this->conn->prepare($sql);

                // Thực thi truy vấn với mảng tham số (giúp chống SQL Injection)
                $success = $stmt->execute([
                    ':status_id' => $statusCancelID,
                    ':id' => $id
                ]);

                // Kiểm tra xem truy vấn có chạy thành công và có hàng nào bị ảnh hưởng không
                if ($success && $stmt->rowCount() > 0) {
                    return true;
                }

                return false; // Truy vấn chạy nhưng không có hàng nào được cập nhật

            } catch (Exception $e) {
                // Ghi lại lỗi thay vì chỉ 'echo' (không nên echo lỗi ra production)
                error_log("Lỗi hủy booking: " . $e->getMessage());
                return false;
            }
        }
    }


    ?>