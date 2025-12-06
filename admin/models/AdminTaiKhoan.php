<?php
class AdminTaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    //Lay danh sach 
    public function getAllTaiKhoan($vai_tro = null, $keyword = ''): array
    {

        try {
            // Câu SQL cơ bản
            $sql = "SELECT * FROM tai_khoan WHERE 1";
            $params = [];

            // 2. Lọc theo Vai trò (nếu tham số được truyền vào)
            if ($vai_tro !== null) {
                $sql .= " AND vai_tro = :VaiTro";
                $params[':VaiTro'] = $vai_tro;
            }

            // 3. Lọc theo Tên/Email (nếu có từ khóa)
            if (!empty($keyword)) {
                $sql .= " AND (LOWER(ten) LIKE :keyword OR LOWER(email) LIKE :keyword)";
                $params[':keyword'] = '%' . strtolower($keyword) . '%';
            }

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }

    public function insertTaiKhoan($TenDangNhap, $MatKhauHash, $Email, $VaiTro): bool
    {
        try {
            // Tên cột đã được sửa trong hình ảnh trước: ten, password, email, vai_tro
            $sql = "INSERT INTO tai_khoan (TenDangNhap, MatKhauHash, Email, VaiTro) 
                VALUES (:ho_ten, :password, :email, :chuc_vu_id);";

            $stmt = $this->conn->prepare(query: $sql);

            $stmt->execute(params: [
                // Ánh xạ tham số PHP ($ten) với tham số SQL (:TenDangNhap)
                ':ho_ten' => $TenDangNhap,
                ':password' => $MatKhauHash,
                ':email' => $Email,
                ':chuc_vu_id' => $VaiTro // Sửa: Dùng :VaiTro trong SQL thay vì :vai_tro
            ]);

            return true;
        } catch (Exception $err) {
            echo "Lỗi SQL: " . $err->getMessage();
            return false;
        }
    }

    public function getDetailTaiKhoan($id)
    {
        try {
            // Giả sử tên cột ID là TaiKhoanID
            $sql = "SELECT * FROM tai_khoan WHERE TaiKhoanID= :TaiKhoanID";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':TaiKhoanID' => $id,
            ]);

            // Cần fetch() để lấy chi tiết 1 bản ghi
            $result = $stmt->fetch();

            // Trả về false nếu không tìm thấy (thay vì null)
            return $result ?: false;
        } catch (Exception $e) {
            // Nên log lỗi thay vì echo trực tiếp
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function updateTaiKhoan($id, $ho_ten, $password, $email, $vaitro)
    {
        try {
            // Tên tham số trong câu SQL đã đúng. Giả sử ID là TaiKhoanID
            $sql = "UPDATE tai_khoan SET 
                TenDangNhap =:ho_ten, 
                MatKhauHash=:password, 
                Email =:email, 
                VaiTro= :vaitro 
                WHERE TaiKhoanID=:id"; // Đã sửa từ :id thành :id

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':password' => $password,
                ':email' => $email,
                ':vaitro' => $vaitro,
                ':id' => $id // Tham số ID cho WHERE
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM tai_khoan WHERE TaiKhoanID= :TaiKhoanID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':TaiKhoanID' => $id,]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


// public function getTaiKhoanFormEmail($email){
//     try{
//         $sql = "SELECT * FROM tai_khoan WHERE email = :email";
//         $stmt = $this->conn->prepare($sql);
//         $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//         if(!$stmt->execute()){
//             print_r($stmt->errorInfo());
//             return false;
//         }
//     }catch(Exception $e){
//         echo "lỗi".$e->getMessage();
//         return false;
//     }
// }

public function checkLogin($email, $mat_khau){
    try{
        $sql = "SELECT * FROM tai_khoan WHERE Email = :Email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':Email' => $email]);
        $user = $stmt->fetch();

     
        if ($user && ($mat_khau==$user['MatKhauHash'])) { 
            
           
            if ($user['VaiTro'] == 1) {
                return $user; 
            } else {
                return "Tài khoản không có quyền đăng nhập";
            }
        } else {
            return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
        }
    }catch(Exception $e){
        echo "Lỗi" . $e->getMessage();
        return false;
    }
}




public function checkLoginHDV($email, $mat_khau){
    try{
        $sql = "SELECT * FROM tai_khoan WHERE Email = :Email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':Email' => $email]);
        $user = $stmt->fetch();

     
        if ($user && ($mat_khau==$user['MatKhauHash'])) { 
            
           
            if ($user['VaiTro'] == 2) {
                return $user; 
            } else {
                return "Tài khoản không có quyền đăng nhập";
            }
        } else {
            return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
        }
    }catch(Exception $e){
        echo "Lỗi" . $e->getMessage();
        return false;
    }
}
}



?>