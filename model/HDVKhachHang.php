<?php
class HDVKhachHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllKhachHang()
    {
        try {
            $sql = "SELECT * FROM danh_sach_khach_tour";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertKhachHang($TenKH, $CheckInStatus, $ThoiGianCapNhat)
    {
        try {
            $sql = "INSERT INTO danh_sach_khach_tour(TenKH, CheckInStatus, ThoiGianCapNhat)
            VALUE (:TenKH, :CheckInStatus, :ThoiGianCapNhat)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TenKH' => $TenKH,
                ':CheckInStatus' => $CheckInStatus,
                ':ThoiGianCapNhat' => $ThoiGianCapNhat,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailKhachHang($id)
    {
        try {
            $sql = "SELECT * FROM danh_sach_khach_tour WHERE DSSK_ID=:id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function updateKhachHang($id, $TenKH, $CheckInStatus, $ThoiGianCapNhat)
    {
        try {
            $sql = "UPDATE danh_sach_khach_tour SET TenKH=:TenKH, CheckInStatus=:CheckInStatus, ThoiGianCapNhat= :ThoiGianCapNhat WHERE DSSK_ID=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TenKH' => $TenKH,
                ':CheckInStatus' => $CheckInStatus,
                ':ThoiGianCapNhat' => $ThoiGianCapNhat,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function destroyKhachHang($id)
    {
        try {
            $sql = "DELETE FROM danh_sach_khach_tour WHERE DSSK_ID=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
?>