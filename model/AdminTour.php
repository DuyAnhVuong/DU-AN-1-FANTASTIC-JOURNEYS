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
                INNER JOIN danh_muc ON tour.LoaiTourID = danh_muc.id
                INNER JOIN ncc_phuongtien ON tour.id_pt = ncc_phuongtien.id_pt
                INNER JOIN ncc_khachsan ON tour.id_ks = ncc_khachsan.id_ks
                INNER JOIN ncc_dichvu ON tour.id_dichvu = ncc_dichvu.id_dichvu";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getLichTrinhTheoTour($tourID)
    {
        $sql = "SELECT * FROM lich_trinh WHERE TourID = :id ORDER BY Ngay ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $tourID]);
        return $stmt->fetchAll();
    }

    public function insertTour($TenTour, $LoaiTourID, $MoTa, $NgayTao, $Gia, $Image, $id_pt, $id_ks, $id_dichvu)
    {
        try {
            $sql = "INSERT INTO tour(TenTour,  LoaiTourID, MoTa, NgayTao , Gia, Image, id_pt, id_ks, id_dichvu)
            VALUE (:TenTour,  :LoaiTourID , :MoTa, :NgayTao, :Gia, :Image, :id_pt, :id_ks, :id_dichvu)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TenTour' => $TenTour,

                ':LoaiTourID' => $LoaiTourID,
                ':MoTa' => $MoTa,
                ':NgayTao' => $NgayTao,
                ':Gia' => $Gia,
                ':Image' => $Image,
                ':id_pt' => $id_pt,
                ':id_ks' => $id_ks,
                ':id_dichvu' => $id_dichvu
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getDetailTour($id)
    {
        try {
            $sql = "SELECT tour.*, danh_muc.ten_danh_muc , ncc_phuongtien.Name_PhuongTien, ncc_khachsan.NameKS, ncc_dichvu.Name_DV
        FROM tour 
        INNER JOIN danh_muc 
        ON tour.LoaiTourID = danh_muc.id 
        
        INNER JOIN ncc_phuongtien ON tour.id_pt = ncc_phuongtien.id_pt
                INNER JOIN ncc_khachsan ON tour.id_ks = ncc_khachsan.id_ks
                INNER JOIN ncc_dichvu ON tour.id_dichvu = ncc_dichvu.id_dichvu
                WHERE tour.TourID = :TourID";

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
    public function updateTour($id, $TenTour, $LoaiTourID, $MoTa, $NgayTao, $Gia, $Image, $id_pt, $id_ks, $id_dichvu)
    {
        try {
            $sql = "UPDATE tour SET 
            TenTour = :TenTour,
            LoaiTourID = :LoaiTourID,
            MoTa = :MoTa,
            NgayTao = :NgayTao,
            Gia = :Gia,
            Image = :Image,
            id_pt = :id_pt,
            id_ks = :id_ks,
            id_dichvu = :id_dichvu
            WHERE TourID=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':TenTour' => $TenTour,
                ':LoaiTourID' => $LoaiTourID,
                ':MoTa' => $MoTa,
                ':NgayTao' => $NgayTao,
                ':Gia' => $Gia,
                ':Image' => $Image,
                ':id' => $id,
                ':id_pt' => $id_pt,
                ':id_ks' => $id_ks,
                ':id_dichvu' => $id_dichvu
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
    // Tổng số tour
public function countAllTours() {
    $sql = "SELECT COUNT(*) AS total FROM tour";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

// Tour trong nước
public function countDomesticTours() {
    $sql = "SELECT COUNT(*) AS total FROM tour WHERE LoaiTourID = 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

// Tour nước ngoài
public function countInternationalTours() {
    $sql = "SELECT COUNT(*) AS total FROM tour WHERE LoaiTourID = 2";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

// Tổng doanh thu
public function getTotalRevenue() {
    $sql = "SELECT SUM(Gia) AS total FROM tour";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
}

}
