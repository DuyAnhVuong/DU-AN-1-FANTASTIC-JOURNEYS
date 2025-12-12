<?php
class HDVNCCKS
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllNCCKS()
    {
        try {
            $sql = "SELECT * FROM ncc_khachsan";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertNCCKS($NameKS)
    {
        try {
            $sql = "INSERT INTO ncc_khachsan(NameKS)
            VALUE(:NameKS)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':NameKS' => $NameKS
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailNCCKS($id_ks)
    {
        try {
            $sql = "SELECT * FROM ncc_khachsan WHERE id_ks=:id_ks";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_ks' => $id_ks]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function updateNCCKS($id_ks, $NameKS)
    {
        try {
            $sql = "UPDATE ncc_khachsan 
                SET NameKS = :NameKS 
                WHERE id_ks = :id_ks";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':NameKS' => $NameKS,
                ':id_ks'   => $id_ks
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function destroyNCCKS($id_ks)
    {
        try {
            $sql = "DELETE FROM ncc_khachsan WHERE id_ks=:id_ks";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_ks' => $id_ks]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
