<?php 
require './views/layout/header.php';
include './views/layout/navbar.php';
include './views/layout/sidebar.php';

// $errors được Controller truyền vào khi có lỗi validation
$errors = $errors ?? [];
// $yeuCauDetail được Controller truyền vào, chứa thông tin chi tiết Yêu Cầu
$yc = $yeuCauDetail;

// Lấy thêm trạng thái đáp ứng (TrangThaiDapUng) từ DB
$trangThaiHienTai = $yc['TrangThaiDapUng'] ?? 'Chờ xử lý';
$trangThaiOptions = ['Chờ xử lý', 'Đã xử lý'];

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Yêu Cầu Đặc Biệt:<?= $yc['YeuCauID'] ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-yeu-cau' ?>" method="post">
                        <input type="hidden" name="YeuCauID" value="<?= $yc['YeuCauID'] ?>">
                        
                        <div class="form-group">
                            <label>Khách hàng:</label>
                            <input type="text" class="form-control" value="ID Khách: <?= $yc['KhachID'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Mã Booking:</label>
                            <input type="text" class="form-control" value="ID Booking: <?= $yc['BookingID'] ?>" disabled>
                        </div>

                        <hr>
                        <h4>Thông tin có thể sửa đổi</h4>

                        <div class="form-group">
                            <label for="LoaiYeuCau">Loại Yêu Cầu</label>
                            <input type="text" name="LoaiYeuCau" id="LoaiYeuCau" class="form-control" 
                                value="<?= htmlspecialchars($yc['LoaiYeuCau']) ?>">
                            <?php if (isset($errors['LoaiYeuCau'])): ?>
                                <small class="text-danger"><?= $errors['LoaiYeuCau'] ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="ChiTiet">Chi Tiết Yêu Cầu</label>
                            <textarea name="ChiTiet" id="ChiTiet" class="form-control" rows="4"><?= htmlspecialchars($yc['ChiTiet']) ?></textarea>
                            <?php if (isset($errors['ChiTiet'])): ?>
                                <small class="text-danger"><?= $errors['ChiTiet'] ?></small>
                            <?php endif; ?>
                        </div>
                        
                        <button type="submit" class="btn btn-warning">Cập nhật Yêu Cầu</button>
                        <a href="<?= BASE_URL_ADMIN . '?act=yeu-cau' ?>" class="btn btn-secondary">Quay lại danh sách</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
include './views/layout/footer.php';
?>