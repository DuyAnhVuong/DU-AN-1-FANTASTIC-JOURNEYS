<?php 
require './views/layout/header.php';
include './views/layout/navbar.php';
include './views/layout/sidebar.php';

// Lấy biến $errors và $yc (dữ liệu cũ) từ Controller
$errors = $errors ?? [];
$yc = $yc ?? ['KhachID' => '', 'BookingID' => '', 'LoaiYeuCau' => '', 'ChiTiet' => ''];
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Yêu Cầu Đặc Biệt Mới</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL_ADMIN . '?act=them-yeu-cau' ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="KhachID">Khách Hàng ID (*)</label>
                            <input type="number" name="KhachID" id="KhachID" class="form-control" 
                                value="<?= htmlspecialchars($yc['KhachID']) ?>" 
                                placeholder="Nhập KhachID">
                            <?php if (isset($errors['KhachID'])): ?>
                                <small class="text-danger"><?= $errors['KhachID'] ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="BookingID">Booking ID (*)</label>
                            <input type="number" name="BookingID" id="BookingID" class="form-control" 
                                value="<?= htmlspecialchars($yc['BookingID']) ?>" 
                                placeholder="Nhập BookingID">
                            <?php if (isset($errors['BookingID'])): ?>
                                <small class="text-danger"><?= $errors['BookingID'] ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="LoaiYeuCau">Loại Yêu Cầu (*)</label>
                            <input type="text" name="LoaiYeuCau" id="LoaiYeuCau" class="form-control" 
                                value="<?= htmlspecialchars($yc['LoaiYeuCau']) ?>"
                                placeholder="Ví dụ: Ăn kiêng, Hỗ trợ xe lăn...">
                            <?php if (isset($errors['LoaiYeuCau'])): ?>
                                <small class="text-danger"><?= $errors['LoaiYeuCau'] ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="ChiTiet">Chi Tiết Yêu Cầu (*)</label>
                            <textarea name="ChiTiet" id="ChiTiet" class="form-control" rows="4"
                                placeholder="Mô tả chi tiết yêu cầu..."><?= htmlspecialchars($yc['ChiTiet']) ?></textarea>
                            <?php if (isset($errors['ChiTiet'])): ?>
                                <small class="text-danger"><?= $errors['ChiTiet'] ?></small>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm Yêu Cầu</button>
                        <a href="<?= BASE_URL_ADMIN . '?act=yeu-cau' ?>" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
include './views/layout/footer.php';
?>