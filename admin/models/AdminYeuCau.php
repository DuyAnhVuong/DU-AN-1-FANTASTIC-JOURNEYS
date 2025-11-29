<?php
class AdminYeuCau
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    
    public function getAllYeuCau()
    {
        try {
            $sql = "SELECT yeu_cau_dac_biet.*, khach_le.HoTen
                FROM yeu_cau_dac_biet 
                INNER JOIN khach_le ON yeu_cau_dac_biet.KhachID = khach_le.KhachID";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi truy vấn SQL: " . $e->getMessage();
        }
    }
    

    public function getDetailYeuCau($id)
    {
        try {
            $sql = "SELECT * FROM yeu_cau_dac_biet WHERE YeuCauID = :YeuCauID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':YeuCauID' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function insertYeuCau($KhachID , $BookingID , $LoaiYeuCau, $ChiTiet) 
    {
        try {
            $sql = "INSERT INTO `yeu_cau_dac_biet` (`KhachID`, `BookingID`, `LoaiYeuCau`, `ChiTiet`) VALUES (:KhachID,:BookingID, :LoaiYeuCau, :ChiTiet)"; 
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':KhachID' => $KhachID,
                ':BookingID' => $BookingID,
                ':LoaiYeuCau' => $LoaiYeuCau,
                ':ChiTiet' =>$ChiTiet
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function updateYeuCau($YeuCauID, $LoaiYeuCau, $ChiTiet)
    {
        try {
            $sql = "UPDATE yeu_cau_dac_biet 
                    SET LoaiYeuCau = :LoaiYeuCau, ChiTiet = :ChiTiet
                    WHERE YeuCauID = :YeuCauID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':YeuCauID' => $YeuCauID,
                ':LoaiYeuCau' => $LoaiYeuCau,
                ':ChiTiet' => $ChiTiet,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
      public function deleteYeuCau($id)
    {
        try {
            $sql = "DELETE FROM yeu_cau_dac_biet WHERE YeuCauID=:YeuCauID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':YeuCauID' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
?>