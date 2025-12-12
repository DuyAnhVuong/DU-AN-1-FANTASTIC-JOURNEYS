<?php
 class HDVStatus{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllStatus(){
        try{
            $sql = "SELECT * FROM trang_thai";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
        catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
?>