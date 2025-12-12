<?php
class HDVBooking
{
    public $conn;
    public function __construct()
    {
        // Giả định hàm connectDB() tồn tại và hoạt động
        $this->conn = connectDB(); 
    }

    public function getAllbooking()
    {
        try {
            // Cần đảm bảo các cột NCCID là NOT NULL trong DB hoặc có LEFT JOIN nếu NULL
            $sql = "SELECT 
                        booking.*, 
                        tour.TenTour, 
                        tour.Gia, 
                        ncc_dichvu.Name_DV, 
                        ncc_phuongtien.Name_PhuongTien, 
                        ncc_khachsan.NameKS,
                        trang_thai.status
                    FROM booking 
                    INNER JOIN tour ON booking.TourID = tour.TourID
                    LEFT JOIN ncc_dichvu ON booking.id_dichvu = ncc_dichvu.id_dichvu
                    LEFT JOIN ncc_phuongtien ON booking.id_pt = ncc_phuongtien.id_pt
                    LEFT JOIN ncc_khachsan ON booking.id_ks = ncc_khachsan.id_ks
                    INNER JOIN trang_thai ON booking.id_trang_thai = trang_thai.id_trang_thai";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Lỗi khi lấy danh sách Booking: " . $e->getMessage());
            return [];
        }
    }

    public function insertBooking($TourID, $LoaiKhach, $TenNguoiDat, $SDT, $Email, $NgayKhoiHanhDuKien, $NgayVe, $TongSoKhach, $NCC_KS, $NCC_PT, $NCC_DV, $TrangThaiID)
    {
        try {
            $sql = "INSERT INTO `booking` 
                        (`TourID`, `LoaiKhach`, `TenNguoiDat`, `SDT`, `Email`, `NgayKhoiHanhDuKien`, `NgayVe`, `TongSoKhach`, `id_ks`, `id_pt`, `id_dichvu`, `id_trang_thai`) 
                    VALUES 
                        (:TourID, :LoaiKhach, :TenNguoiDat, :SDT, :Email, :NgayKhoiHanhDuKien, :NgayVe, :TongSoKhach, :id_ks, :id_pt, :id_dichvu, :id_trang_thai);";

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
            error_log("Lỗi khi chèn Booking: " . $e->getMessage());
            return false;
        }
    }

    public function getDetailBooking($id)
    {
        try {
            $sql = "SELECT 
                        booking.*, 
                        tour.TenTour, 
                        tour.TourID,
                        ncc_dichvu.Name_DV, 
                        ncc_phuongtien.Name_PhuongTien, 
                        ncc_khachsan.NameKS
                    FROM booking 
                    INNER JOIN tour ON booking.TourID = tour.TourID
                    LEFT JOIN ncc_dichvu ON booking.id_dichvu = ncc_dichvu.id_dichvu
                    LEFT JOIN ncc_phuongtien ON booking.id_pt = ncc_phuongtien.id_pt
                    LEFT JOIN ncc_khachsan ON booking.id_ks = ncc_khachsan.id_ks
                    WHERE BookingID = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            error_log("Lỗi khi lấy chi tiết Booking: " . $e->getMessage());
            return null;
        }
    }

    public function editBooking($id, $TourID, $LoaiKhach, $TenNguoiDat, $SDT, $Email, $NgayKhoiHanhDuKien, $NgayVe, $TongSoKhach, $NCC_KS, $NCC_PT, $NCC_DV, $TrangThaiID)
    {
        try {
            $sql = "UPDATE `booking` SET 
                        `TourID` = :TourID, 
                        `LoaiKhach` = :LoaiKhach,
                        `TenNguoiDat` = :TenNguoiDat, 
                        `SDT` = :SDT, 
                        `Email` = :Email, 
                        `NgayKhoiHanhDuKien` = :NgayKhoiHanhDuKien, 
                        `TongSoKhach` = :TongSoKhach, 
                        `NgayVe` = :NgayVe, 
                        `id_pt` = :id_pt, 
                        `id_ks` = :id_ks, 
                        `id_dichvu` = :id_dichvu, 
                        `id_trang_thai` = :id_trang_thai 
                    WHERE 
                        `booking`.`BookingID` = :id";
            
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
            error_log("Lỗi khi sửa Booking: " . $e->getMessage());
            return false;
        }
    }
    
    // Giữ nguyên hàm cancelBooking
    public function cancelBooking($id): bool
    {
        $statusCancelID = 4; // Giả định ID trạng thái Hủy là 4

        try {
            $sql = "UPDATE booking SET id_trang_thai = :status_id WHERE BookingID = :id";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([
                ':status_id' => $statusCancelID,
                ':id' => $id
            ]);

            if ($success && $stmt->rowCount() > 0) {
                return true;
            }
            return false;

        } catch (Exception $e) {
            error_log("Lỗi hủy booking: " . $e->getMessage());
            return false;
        }
    }
}