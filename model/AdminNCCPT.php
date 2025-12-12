<?php
class AdminNCCPT
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllNCCPT()
    {
        try {
            $sql = "SELECT * FROM ncc_phuongtien";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertNCCPT($Name_PhuongTien)
    {
        try {
            $sql = "INSERT INTO ncc_phuongtien(Name_PhuongTien)
            VALUE(:Name_PhuongTien)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':Name_PhuongTien' => $Name_PhuongTien
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailNCCPT($id_pt)
    {
        try {
            $sql = "SELECT * FROM ncc_phuongtien WHERE id_pt=:id_pt";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_pt' => $id_pt]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function updateNCCPT($id_pt, $Name_PhuongTien)
    {
        try {
            $sql = "UPDATE ncc_phuongtien 
                SET Name_PhuongTien = :Name_PhuongTien 
                WHERE id_pt = :id_pt";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Name_PhuongTien' => $Name_PhuongTien,
                ':id_pt'            => $id_pt
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function destroyNCCPT($id_pt)
    {
        try {
            $sql = "DELETE FROM ncc_phuongtien WHERE id_pt=:id_pt";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_pt' => $id_pt]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
