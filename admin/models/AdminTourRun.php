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
            $sql = "SELECT * FROM tour_run";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }




}
?>