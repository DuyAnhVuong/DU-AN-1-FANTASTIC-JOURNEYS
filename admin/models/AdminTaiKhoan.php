<?php
// Đảm bảo hàm connectDB() đã được định nghĩa và có thể kết nối CSDL

class AdminTaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // --- CRUD CHUNG ---

    public function getAllTaiKhoan($vai_tro = null, $keyword = ''): array
    {
        try {
            $sql = "SELECT * FROM tai_khoan WHERE 1";
            $params = [];

            if ($vai_tro !== null) {
                $sql .= " AND VaiTro = :VaiTro"; // Sửa 'vai_tro' thành 'VaiTro' (giả định tên cột)
                $params[':VaiTro'] = $vai_tro;
            }

            if (!empty($keyword)) {
                $sql .= " AND (LOWER(TenDangNhap) LIKE :keyword OR LOWER(Email) LIKE :keyword)"; // Sửa 'ten' thành 'TenDangNhap', 'email' thành 'Email' (giả định tên cột)
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
            // Sửa tên cột cho khớp với tên biến PHP và giả định tên cột trong DB
            $sql = "INSERT INTO tai_khoan (TenDangNhap, MatKhauHash, Email, VaiTro) 
                VALUES (:ho_ten, :password, :email, :vaitro);";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' => $TenDangNhap,
                // Thực tế, Mật khẩu NÊN được mã hóa bằng password_hash() trước khi insert
                ':password' => $MatKhauHash, 
                ':email' => $Email,
                ':vaitro' => $VaiTro 
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
            $sql = "SELECT * FROM tai_khoan WHERE TaiKhoanID= :TaiKhoanID"; // Giả định ID là TaiKhoanID

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':TaiKhoanID' => $id,
            ]);

            return $stmt->fetch() ?: false;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function updateTaiKhoan($id, $ho_ten, $password, $email, $vaitro)
    {
        try {
            $sql = "UPDATE tai_khoan SET 
                TenDangNhap =:ho_ten, 
                MatKhauHash=:password, 
                Email =:email, 
                VaiTro= :vaitro 
                WHERE TaiKhoanID=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                // Thực tế, Mật khẩu NÊN được mã hóa lại nếu $password không rỗng
                ':password' => $password, 
                ':email' => $email,
                ':vaitro' => $vaitro,
                ':id' => $id
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
            $stmt->execute([':TaiKhoanID' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    // --- LOGIC ĐĂNG NHẬP PHÂN QUYỀN ---

    // 1. Check Login ADMIN (VaiTro = 1)
    public function checkLogin($email, $mat_khau){
        try{
            $sql = "SELECT * FROM tai_khoan WHERE Email = :Email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':Email' => $email]);
            $user = $stmt->fetch();

            // Nếu tìm thấy người dùng VÀ mật khẩu KHÔNG được mã hóa (theo mã cũ của bạn)
            if ($user && ($mat_khau == $user['MatKhauHash'])) { 
                
                if ($user['VaiTro'] == 1) { // Chỉ cho phép Admin
                    return $user; 
                } else {
                    return "Tài khoản không có quyền đăng nhập Admin";
                }
            } else {
                return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
            }
        }catch(Exception $e){
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    // 2. Check Login HƯỚNG DẪN VIÊN (VaiTro = 2)
}