<?php
class AdminTour
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTour()
    {
        try {
            $sql = "SELECT tour.*, danh_muc.ten_danh_muc 
                FROM tour 
                INNER JOIN danh_muc ON tour.LoaiTourID = danh_muc.id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertTour($TenTour, $LoaiTourID, $MoTa, $NgayTao , $Gia, $Image)
    {
        try {
            $sql = "INSERT INTO tour(TenTour,  LoaiTourID, MoTa, NgayTao , Gia, Image)
            VALUE (:TenTour,  :LoaiTourID , :MoTa, :NgayTao, :Gia,:Image)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TenTour' => $TenTour,
                
                ':LoaiTourID' => $LoaiTourID,
                ':MoTa' => $MoTa,
                ':NgayTao' => $NgayTao,
                ':Gia' => $Gia,
                ':Image' => $Image,
            ]);
            
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getDetailTour($id)
    {
        try {
            $sql = "SELECT * FROM tour WHERE TourID=:TourID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':TourID' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function delete($id){
        try{
            $sql="DELETE FROM tour WHERE TourID=:TourID";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([':TourID'=>$id]);
            return true;
        }catch(Exception $e){
            echo "Lỗi".$e->getMessage();
        }
    }
    public function updateTour($id, $TenTour, $LoaiTourID, $MoTa, $NgayTao , $Gia, $Image)
    {
        try{
            $sql = "UPDATE tour SET 
            TenTour = :TenTour,
            LoaiTourID = :LoaiTourID,
            MoTa = :MoTa,
            NgayTao = :NgayTao,
            Gia = :Gia,
            Image = :Image
            WHERE Id=:id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TenTour' => $TenTour,
                ':LoaiTourID' => $LoaiTourID,
                ':MoTa' => $MoTa,
                ':NgayTao' => $NgayTao,
                ':Gia' => $Gia,
                ':Image' => $Image,
                ':id' => $id
            ]);
            return true;
        }catch(Exception $e){
            echo "Lỗi:" .$e->getMessage();
            return false;
        }
    }
}