<?php 
class HDVNhatKy
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }


    public function getAllNhatKy()
    {
        try {
            $sql = "SELECT * FROM `nhat_ky_tour`";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi truy vấn SQL: " . $e->getMessage();
        }
    }


    public function getDetailNhatKy($id_nhat_ky)
    {
        try {
            $sql = "SELECT * FROM nhat_ky_tour WHERE id_nhat_ky = :id_nhat_ky";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_nhat_ky' => $id_nhat_ky]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function insertNhatKy($mo_ta, $ngay)
    {
        try {
            $sql = "INSERT INTO `nhat_ky_tour` (`mo_ta`, `ngay`) VALUES (:mo_ta, :ngay)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mo_ta' => $mo_ta,
                ':ngay' => $ngay
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function updateNhatKy($id_nhat_ky ,$mo_ta, $ngay)
    {
        try {
            $sql = "UPDATE nhat_ky_tour 
                    SET mo_ta = :mo_ta, ngay = :ngay
                    WHERE id_nhat_ky = :id_nhat_ky";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_nhat_ky' => $id_nhat_ky,
                ':mo_ta' => $mo_ta,
                ':ngay' => $ngay,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function destroyNhatKy($id_nhat_ky)
    {
        try {
            $sql = "DELETE FROM nhat_ky_tour WHERE id_nhat_ky=:id_nhat_ky";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_nhat_ky' => $id_nhat_ky]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
?>