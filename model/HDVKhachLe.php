<?php
class HDVKhachLe
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllKhachLe(): array
    {
        try {
            // Chỉ cần lấy KhachID và HoTen
            $sql = "SELECT KhachID, HoTen FROM khach_le ORDER BY HoTen ASC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            // RẤT QUAN TRỌNG: Phải dùng FETCH_ASSOC để có khóa 'KhachID' và 'HoTen'
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            echo "Lỗi truy vấn SQL getAllKhachHang: " . $e->getMessage();
            return [];
        }
    }
    // public function insertKhachHang($TenKH, $CheckInStatus)
    // {
    //     try {
    //         $sql = "INSERT INTO danh_sach_khach_tour(TenKH, CheckInStatus)
    //         VALUE (:TenKH, :CheckInStatus)";

    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([
    //             ':TenKH' => $TenKH,
    //             ':CheckInStatus' => $CheckInStatus,
    //         ]);
    //         return true;
    //     } catch (Exception $e) {
    //         echo "Lỗi" . $e->getMessage();
    //     }
    // }
    // public function getDetailKhachHang($id)
    // {
    //     try {
    //         $sql = "SELECT * FROM danh_sach_khach_tour WHERE DSSK_ID=:id";

    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([':id' => $id]);
    //         return $stmt->fetch();
    //     } catch (Exception $e) {
    //         echo "Lỗi" . $e->getMessage();
    //     }
    // }
    // public function updateKhachHang($id, $TenKH, $CheckInStatus)
    // {
    //     try {
    //         $sql = "UPDATE danh_sach_khach_tour SET TenKH=:TenKH, CheckInStatus=:CheckInStatus WHERE DSSK_ID=:id";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([
    //             ':TenKH' => $TenKH,
    //             ':CheckInStatus' => $CheckInStatus,
    //             ':id' => $id,
    //         ]);
    //         return true;
    //     } catch (Exception $e) {
    //         echo "Lỗi" . $e->getMessage();
    //     }
    // }
    // public function destroyKhachHang($id)
    // {
    //     try {
    //         $sql = "DELETE FROM danh_sach_khach_tour WHERE DSSK_ID=:id";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([':id' => $id]);
    //         return true;
    //     } catch (Exception $e) {
    //         echo "Lỗi" . $e->getMessage();
    //     }
    // }
}
?>