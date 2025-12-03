<?php
class AdminLichTrinh
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllLichTrinh(){
        try {
            $sql = "SELECT lich_trinh.*, tour.TenTour
            FROM lich_trinh
            INNER JOIN tour ON lich_trinh.TourID = tour.TourID";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailLichTrinh($id){
        try {
            $sql = "SELECT * FROM lich_trinh WHERE LichTrinhID=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getLichTrinhTheoTour($tourID)
{
    try {
        $sql = "SELECT * FROM lich_trinh WHERE TourID = :id ORDER BY Ngay ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $tourID]);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return [];
    }
}
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM lich_trinh WHERE LichTrinhID = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertLichTrinh($TourID, $Ngay, $ThoiGian, $DiemThamQuan, $HoatDong)
    {
        try {
            $sql = "INSERT INTO lich_trinh(`TourID`, `Ngay`, `ThoiGian`, `DiemThamQuan`, `HoatDong`)
            VALUES (:TourID, :Ngay, :ThoiGian, :DiemThamQuan, :HoatDong)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TourID' => $TourID,
                ':Ngay' => $Ngay,
                ':ThoiGian' => $ThoiGian,
                ':DiemThamQuan' => $DiemThamQuan,
                ':HoatDong' => $HoatDong
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
?>