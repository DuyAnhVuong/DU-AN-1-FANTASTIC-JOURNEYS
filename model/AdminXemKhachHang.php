<?php
class AdminXemKhachHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllXemKhachHang()
    {
        try {
            $sql = "SELECT khach_hang_theo_tour.*, booking.TongSoKhach 
            FROM khach_hang_theo_tour 
            INNER JOIN booking 
            ON khach_hang_theo_tour.BookingID = booking.BookingID 
            -- WHERE khach_hang_theo_tour.KH_ID = KH_ID
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function insertXemKhachHang($Ten_KH, $SDT, $BookingID, $Gioi_Tinh, $Nam_Sinh)
    {
        try {
            $sql = "INSERT INTO khach_hang_theo_tour( Ten_KH,SDT, BookingID, Gioi_Tinh,Nam_Sinh)
            VALUE (:Ten_KH, :SDT, :BookingID, :Gioi_Tinh, :Nam_Sinh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':Ten_KH' => $Ten_KH,
                ':SDT' => $SDT,
                ':BookingID' => $BookingID,
                ':Gioi_Tinh' => $Gioi_Tinh,
                ':Nam_Sinh' => $Nam_Sinh,

            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function getDetailXemKhachHang($id)
    {
        try {
            $sql = "SELECT * FROM khach_hang_theo_tour WHERE KH_ID =:KH_ID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':KH_ID' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }



    public function updateXemKhachHang($id, $Ten_KH, $SDT, $BookingID, $Gioi_Tinh, $Nam_Sinh)
    {
        try {
            $sql = "UPDATE khach_hang_theo_tour SET 
            Ten_KH=:Ten_KH, 
            SDT=:SDT,
            BookingID=:BookingID,
            Gioi_Tinh=:Gioi_Tinh,
            Nam_Sinh=:Nam_Sinh
            WHERE KH_ID=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':Ten_KH' => $Ten_KH,
                ':SDT' => $SDT,
                ':BookingID' => $BookingID,
                ':Gioi_Tinh' => $Gioi_Tinh,
                ':Nam_Sinh' => $Nam_Sinh,

                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM khach_hang_theo_tour WHERE KH_ID=:KH_ID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':KH_ID' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }




}
?>