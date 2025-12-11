<?php
class AdminTourRun
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTourRun()
    {
        try {
            $sql = "SELECT  tour_run.*, booking.BookingID, tour.TenTour ,huong_dan_vien.HoTen
              FROM tour_run
              INNER JOIN booking ON tour_run.BookingID = booking.BookingID
              INNER JOIN tour ON tour_run.TourID = tour.TourID
              INNER JOIN huong_dan_vien ON tour_run.HDVID = huong_dan_vien.HDVID";



            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function insertTourRun($BookingID, $TourID, $HDVID, $NgayKhoiHanhThucTe, $NgayKetThuc, $DiemTapTrung, $TrangThaiVanHanh)
    {
        try {
            $sql = "INSERT INTO tour_run( BookingID,TourID, HDVID, NgayKhoiHanhThucTe,NgayKetThuc,DiemTapTrung,TrangThaiVanHanh)
            VALUE (:BookingID, :TourID, :HDVID, :NgayKhoiHanhThucTe, :NgayKetThuc, :DiemTapTrung, :TrangThaiVanHanh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':BookingID' => $BookingID,
                ':TourID' => $TourID,
                ':HDVID' => $HDVID,
                ':NgayKhoiHanhThucTe' => $NgayKhoiHanhThucTe,
                ':NgayKetThuc' => $NgayKetThuc,
                ':DiemTapTrung' => $DiemTapTrung,
                ':TrangThaiVanHanh' => $TrangThaiVanHanh,

            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function getDetailTourRun($id)
    {
        try {
            $sql = "SELECT * FROM tour_run WHERE TourRunID =:TourRunID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':TourRunID' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function updateTourRun($id, $BookingID, $TourID, $HDVID, $NgayKhoiHanhThucTe, $NgayKetThuc, $DiemTapTrung, $TrangThaiVanHanh)
    {
        try {
            $sql = "UPDATE tour_run SET 
            BookingID=:BookingID, 
            TourID=:TourID,
            HDVID=:HDVID,
            NgayKhoiHanhThucTe=:NgayKhoiHanhThucTe,  
            NgayKetThuc=:NgayKetThuc,  
            DiemTapTrung=:DiemTapTrung, 
            TrangThaiVanHanh=:TrangThaiVanHanh  
            WHERE TourRunID=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':BookingID' => $BookingID,
                ':TourID' => $TourID,
                ':HDVID' => $HDVID,
                ':NgayKhoiHanhThucTe' => $NgayKhoiHanhThucTe,
                ':NgayKetThuc' => $NgayKetThuc,
                ':DiemTapTrung' => $DiemTapTrung,
                ':TrangThaiVanHanh' => $TrangThaiVanHanh,


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
            $sql = "DELETE FROM tour_run WHERE TourRunID =:TourRunID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':TourRunID' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }



}
?>