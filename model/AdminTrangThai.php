<?php
class AdminTrangThai
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTrangThai(){
        try{
            $sql = "SELECT trang_thai_booking.*, tai_khoan.TenDangNhap FROM trang_thai_booking INNER JOIN tai_khoan ON trang_thai_booking.NguoiCapNhatID = tai_khoan.TaiKhoanID";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertTrangThai($BookingID, $TrangThai, $ThoiGianCapNhat, $NguoiCapNhatID){
        try{
            $sql = "INSERT INTO trang_thai_booking(`BookingID`, `TrangThai`, `ThoiGianCapNhat`, `NguoiCapNhatID`)
            VALUES (:BookingID, :TrangThai, :ThoiGianCapNhat, :NguoiCapNhatID)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':BookingID' => $BookingID,
                ':TrangThai' => $TrangThai,
                ':ThoiGianCapNhat' => $ThoiGianCapNhat,
                ':NguoiCapNhatID' => $NguoiCapNhatID
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailTrangThai($id){
        try{
            $sql = "SELECT * FROM trang_thai_booking WHERE TrangThaiID=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function updateTrangThai($id, $BookingID, $TrangThai, $ThoiGianCapNhat, $NguoiCapNhatID){
        try{
            $sql = "UPDATE trang_thai_booking SET BookingID=:BookingID, TrangThai=:TrangThai, ThoiGianCapNhat=:ThoiGianCapNhat, NguoiCapNhatID=:NguoiCapNhatID WHERE TrangThaiID=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':BookingID' => $BookingID,
                ':TrangThai' => $TrangThai,
                ':ThoiGianCapNhat' => $ThoiGianCapNhat,
                ':NguoiCapNhatID' => $NguoiCapNhatID,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function deleteTrangThai($id){
        try{
            $sql = "DELETE FROM trang_thai_booking WHERE TrangThaiID=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
?>