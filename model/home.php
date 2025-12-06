<?php
class Home
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    //Lay danh sach 

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