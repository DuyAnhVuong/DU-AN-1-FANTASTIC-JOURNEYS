<?php
require './views/layout/header.php';
?>
<?php
include './views/layout/navbar.php';
?>
<?php
include './views/layout/sidebar.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản Admin</h1>
                </div>
            </div>
        </div></section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark">
                        <div class="card-header default_cursor_land">
                            <h3 class="card-title default_cursor_land">Sửa thông tin tài khoản Admin : <?=$quanTri['TenDangNhap'];?></h3>
                        </div>
                        <form action="<?=BASE_URL_ADMIN .'?act=sua-quan-tri'; ?>" method="POST">
                            <div class="card-body default_cursor_land">
                                
                                <input type="hidden" name="id" value="<?=$quanTri['TaiKhoanID']?>"> 
                                
                                <div class="form-group">
                                    <label >Họ tên</label>
                                    <input type="text" class="form-control" name="TenDangNhap" value="<?=$quanTri['TenDangNhap']?>"  placeholder="Nhập họ tên">
                                    <?php if(isset($_SESSION['error']['TenDangNhap'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['TenDangNhap'] ?></p>
                                    <?php }?>
                                </div>


                                <div class="form-group default_cursor_land col-12">
                                    <label >Email</label>
                                    <input type="email" class="form-control" name="Email" value="<?=$quanTri['Email']?>"  placeholder="Nhập Email">
                                    <?php if(isset($_SESSION['error']['Email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['Email'] ?></p>
                                    <?php }?>
                                </div>


                                <div class="form-group default_cursor_land col-12">
                                    <label >Mật khẩu (Để trống nếu không thay đổi)</label>
                                    <input type="password" class="form-control" name="MatKhauHash" placeholder="Nhập Mật khẩu mới">
                                    <?php if(isset($_SESSION['error']['MatKhauHash'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['MatKhauHash'] ?></p>
                                    <?php }?>
                                </div>

                                
                                <div class="form-group">
                                    <label for="VaiTro">Chức vụ</label>
                                    <select id="VaiTro" name="VaiTro" class="form-control custom-select">
                                        <option <?= ($quanTri['VaiTro'] == 1) ? 'selected': ''?> value="1">Admin</option>
                                        <option <?= ($quanTri['VaiTro'] == 2) ? 'selected': ''?> value="2">HDV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer default_cursor_land">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
<?php
include './views/layout/footer.php';
?>
</body>
</html>