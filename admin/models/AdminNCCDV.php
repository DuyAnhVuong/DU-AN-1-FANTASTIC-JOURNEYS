<?php
class AdminNCCDV
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllNCCDV()
    {
        try {
            $sql = "SELECT * FROM ncc_dichvu";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertNCCDV($Name_DV)
    {
        try {
            $sql = "INSERT INTO ncc_dichvu(Name_DV)
            VALUE(:Name_DV)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':Name_DV' => $Name_DV
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailNCCDV($id_dichvu)
    {
        try {
            $sql = "SELECT * FROM ncc_dichvu WHERE id_dichvu=:id_dichvu";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_dichvu' => $id_dichvu]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function updateNCCDV($id_dichvu, $Name_DV)
    {
        try {
            $sql = "UPDATE ncc_dichvu 
                SET Name_DV = :Name_DV 
                WHERE id_dichvu = :id_dichvu";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Name_DV' => $Name_DV,
                ':id_dichvu'            => $id_dichvu
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function destroyNCCDV($id_dichvu)
    {
        try {
            $sql = "DELETE FROM ncc_dichvu WHERE id_dichvu=:id_dichvu";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_dichvu' => $id_dichvu]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
