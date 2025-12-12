<?php
class AdminHuongDanVien
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();

    }

    public function getAllHuongDanVien()
    {
        try {
            $sql = "SELECT huong_dan_vien. *, tai_khoan.TenDangNhap 
            FROM huong_dan_vien
            INNER JOIN tai_khoan
            ON huong_dan_vien.TaiKhoanID = tai_khoan.TaiKhoanID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }

    }
    public function insertHuongDanVien($TaiKhoanID, $HoTen, $NgaySinh, $SDT, $Email, $ChungChi, $NgonNgu, $KinhNghiem, $PhanLoai, $Avatar)
    {
        try {
            $sql = "INSERT INTO `huong_dan_vien` (`TaiKhoanID`, `HoTen`, `NgaySinh`, `SDT`, `Email`, `ChungChi`, `NgonNgu`, `KinhNghiem`, `PhanLoai`, `Avatar`)
        VALUES (:TaiKhoanID, :HoTen, :NgaySinh, :SDT, :Email, :ChungChi, :NgonNgu, :KinhNghiem, :PhanLoai, :Avatar)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TaiKhoanID' => $TaiKhoanID,
                ':HoTen' => $HoTen,
                ':NgaySinh' => $NgaySinh,
                ':SDT' => $SDT,
                ':Email' => $Email,
                ':ChungChi' => $ChungChi,
                ':NgonNgu' => $NgonNgu,
                ':KinhNghiem' => $KinhNghiem,
                ':PhanLoai' => $PhanLoai,
                ':Avatar' => $Avatar
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            return false;
        }
    }

    public function getDetailHuongDanVien($id)
    {
        try {
            $sql = "SELECT huong_dan_vien.*, tai_khoan.TenDangNhap 
        FROM huong_dan_vien
        INNER JOIN tai_khoan 
        ON huong_dan_vien.TaiKhoanID = tai_khoan.TaiKhoanID
        WHERE huong_dan_vien.HDVID  = :HDVID"; // SỬA: Thay 'TourID;' bằng ':TourID'

            $stmt = $this->conn->prepare($sql);
            // SỬA: Đảm bảo key trong execute khớp với tham số trong SQL
            $stmt->execute([':HDVID' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function updateHuongDanVien($id, $TaiKhoanID, $HoTen, $NgaySinh, $SDT, $Email, $ChungChi, $NgonNgu, $KinhNghiem, $PhanLoai, $Avatar)
    {
        try {
            $sql = "UPDATE huong_dan_vien SET 
            TaiKhoanID = :TaiKhoanID,
            HoTen = :HoTen,
            NgaySinh = :NgaySinh,
            SDT = :SDT,
            Email = :Email,
            ChungChi = :ChungChi,
            NgonNgu = :NgonNgu,
            KinhNghiem = :KinhNghiem,
            PhanLoai = :PhanLoai,
            Avatar = :Avatar
            WHERE HDVID=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TaiKhoanID' => $TaiKhoanID,
                ':HoTen' => $HoTen,
                ':NgaySinh' => $NgaySinh,
                ':SDT' => $SDT,
                ':Email' => $Email,
                ':ChungChi' => $ChungChi,
                ':NgonNgu' => $NgonNgu,
                ':KinhNghiem' => $KinhNghiem,
                ':PhanLoai' => $PhanLoai,
                ':Avatar' => $Avatar,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi:" . $e->getMessage();
            return false;
        }
    }
    // public function getDetailHuongDanVien($id)
    // {
    //     try {
    //         $sql = "SELECT * FROM huong_dan_vien WHERE HDVID =:HDVID";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([':HDVID' => $id]);
    //         return $stmt->fetch();
    //     } catch (Exception $e) {
    //         echo "Lỗi" . $e->getMessage();
    //     }
    // }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM huong_dan_vien WHERE HDVID=:HDVID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':HDVID' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }



}
?>