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
    public function insertTour($TenTour, $LoaiTourID, $MoTa, $NgayTao, $Gia, $Image)
    {
        try {
            $sql = "INSERT INTO tour(TenTour,  LoaiTourID, MoTa, NgayTao , Gia, Image)
            VALUE (:TenTour,  :LoaiTourID , :MoTa, :NgayTao, :Gia, :Image)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TenTour' => $TenTour,

                ':LoaiTourID' => $LoaiTourID,
                ':MoTa' => $MoTa,
                ':NgayTao' => $NgayTao,
                ':Gia' => $Gia,
                ':Image' => $Image
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getDetailTour($id)
{
    try {
        $sql = "SELECT tour.*, danh_muc.ten_danh_muc 
        FROM tour 
        INNER JOIN danh_muc 
        ON tour.LoaiTourID = danh_muc.id 
        WHERE tour.TourID = :TourID"; // SỬA: Thay 'TourID;' bằng ':TourID'
        
        $stmt = $this->conn->prepare($sql);
        // SỬA: Đảm bảo key trong execute khớp với tham số trong SQL
        $stmt->execute([':TourID' => $id]); 
        return $stmt->fetch();
    } catch (Exception $e) {
        echo "Lỗi" . $e->getMessage();
    }
}

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM tour WHERE TourID=:TourID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':TourID' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function updateTour($id, $TenTour, $LoaiTourID, $MoTa, $NgayTao, $Gia, $Image)
    {
        try {
            $sql = "UPDATE tour SET 
            TenTour = :TenTour,
            LoaiTourID = :LoaiTourID,
            MoTa = :MoTa,
            NgayTao = :NgayTao,
            Gia = :Gia,
            Image = :Image
            WHERE TourID=:id";

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
        } catch (Exception $e) {
            echo "Lỗi:" . $e->getMessage();
            return false;
        }
    }
    public function insertAlbumTour($TourID, $URL)
{
    try {
        $sql = "INSERT INTO hinh_anh_tour(TourID, URL) VALUES (:TourID, :URL)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':TourID' => $TourID,
            ':URL' => $URL
        ]);
        return true;

    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

public function getListAnhTour($id)
{
    try {
        $sql = "SELECT * FROM hinh_anh_tour WHERE TourID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll();

    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

public function updateAnhTour($id, $new_url)
{
    try {
        $sql = "UPDATE hinh_anh_tour SET URL = :new_url WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':new_url' => $new_url,
            ':id' => $id
        ]);
        return true;

    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

public function deleteAnhTour($id)
{
    try {
        $sql = "DELETE FROM hinh_anh_tour WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return true;

    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

}