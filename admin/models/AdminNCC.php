<?php
class AdminNCC
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllNCC()
    {
        try {
            $sql = "SELECT nha_cung_cap_tour.*, tour.TenTour 
            FROM nha_cung_cap_tour 
            INNER JOIN tour 
            ON nha_cung_cap_tour.TourID = tour.TourID 
            WHERE nha_cung_cap_tour.NCC_TourID = NCC_TourID;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertNCC($TourID, $LoaiDichVu, $TenNCC, $ThongTinLienHe)
    {
        try {
            $sql = "INSERT INTO nha_cung_cap_tour( TourID,LoaiDichVu, TenNCC, ThongTinLienHe)
            VALUE (:TourID, :LoaiDichVu, :TenNCC, :ThongTinLienHe)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TourID' => $TourID,
                ':LoaiDichVu' => $LoaiDichVu,
                ':TenNCC' => $TenNCC,
                ':ThongTinLienHe' => $ThongTinLienHe,

            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }




    public function getDetailNCC($id)
    {
        try {
            $sql = "SELECT * FROM nha_cung_cap_tour WHERE NCC_TourID=:NCC_TourID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':NCC_TourID' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function deletecc($id)
    {
        try {
            $sql = "DELETE FROM nha_cung_cap_tour WHERE NCC_TourID=:NCC_TourID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['NCC_TourID' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
?>