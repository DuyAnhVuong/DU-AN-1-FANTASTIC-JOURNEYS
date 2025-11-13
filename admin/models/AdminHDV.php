<?php 
    class AdminHDV{
        public $conn;
         public function __construct()
    {
        $this->conn = connectDB();
    }
        //Lay danh sach 
        public function getAllHDV($VaiTro){
            try{
                $sql = "SELECT * FROM tai_khoan WHERE VaiTro = :VaiTro";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':VaiTro' => $VaiTro]);
                return $stmt->fetchAll();
            } catch (Exception $e){
                echo "Lỗi: " .$e->getMessage();
            }
        }
    
    }
?>