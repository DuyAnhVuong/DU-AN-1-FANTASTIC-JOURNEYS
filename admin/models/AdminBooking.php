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
                $sql = "SELECT booking.*, tour.TenTour, tour.Gia, nha_cung_cap_tour.TenNCC, trang_thai_booking.TrangThai, trang_thai_booking.NguoiCapNhatID, trang_thai_booking.TrangThaiID
                    FROM booking 
                    INNER JOIN tour ON booking.TourID = tour.TourID
                    INNER JOIN nha_cung_cap_tour ON booking.NCC_TourID = nha_cung_cap_tour.NCC_TourID
                    INNER JOIN trang_thai_booking ON booking.TrangThaiID = trang_thai_booking.TrangThaiID";
                $stmt = $this->conn->prepare($sql);

                $stmt->execute();

                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }
        public function insertBooking($TourID, $LoaiKhach, $TenNguoiDat, $SDT, $Email, $NgayKhoiHanhDuKien, $NgayVe, $TongSoKhach, $NCC_TourID, $TrangThaiID)
    // ⚠️ THÊM $NCC_TourID VÀO DANH SÁCH THAM SỐ
    {
        try {
            $sql = "INSERT INTO `booking` (`TourID`,`LoaiKhach`, `TenNguoiDat`, `SDT`, `Email`, `NgayKhoiHanhDuKien`,`NgayVe`, `TongSoKhach`, `NCC_TourID`, `TrangThaiID`) 
                    VALUES (:TourID, :LoaiKhach, :TenNguoiDat, :SDT, :Email, :NgayKhoiHanhDuKien, :NgayVe, :TongSoKhach, :NCC_TourID, :TrangThaiID);";
            
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
                ':NCC_TourID' => $NCC_TourID, // ⚠️ THÊM THAM SỐ RÀNG BUỘC
                ':TrangThaiID' => $TrangThaiID // ⚠️ THÊM THAM SỐ RÀNG BUỘC
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi khi chèn Booking: " . $e->getMessage();
        }
    }
            public function getDetailBooking($id)
        {
            try {
                $sql = "SELECT booking.*, tour.TenTour, tour.TourID, nha_cung_cap_tour.TenNCC
                    FROM booking 
                    INNER JOIN tour ON booking.TourID = tour.TourID
                    INNER JOIN nha_cung_cap_tour ON booking.NCC_TourID = nha_cung_cap_tour.NCC_TourID WHERE BookingID=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id' => $id]);
                return $stmt->fetch();
            } catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }
    //     public function updateDanhMuc($id, $ten_danh_muc, $mo_ta)
    //     {
    //         try {
    //             $sql = "UPDATE danh_muc SET ten_danh_muc=:ten_danh_muc, mo_ta=:mo_ta WHERE id=:id";
    //             $stmt = $this->conn->prepare($sql);
    //             $stmt->execute([
    //                 ':ten_danh_muc' => $ten_danh_muc,
    //                 ':mo_ta' => $mo_ta,
    //                 ':id' => $id
    //             ]);
    //             return true;
    //         } catch (Exception $e) {
    //             echo "Lỗi" . $e->getMessage();
    //         }
    //     }
        public function deleteBooking($id){
            try{
                $sql="DELETE FROM booking WHERE BookingID=:id";
                $stmt=$this->conn->prepare($sql);
                $stmt->execute([':id'=>$id]);
                return true;
            }catch(Exception $e){
                echo "Lỗi".$e->getMessage();
            }
        }

        public function updateStatus($bookingID, $newStatus)
    {
        try {
            $sql = "UPDATE booking SET TrangThai = :TrangThai WHERE BookingID = :BookingID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TrangThai' => $newStatus,
                ':BookingID' => $bookingID
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}


    ?>