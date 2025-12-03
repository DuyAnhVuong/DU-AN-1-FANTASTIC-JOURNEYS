<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin - Chi Tiết Tour</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #eef0f2;
    }

    .admin-box {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .section-title {
      font-weight: 600;
      font-size: 18px;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container py-4">

    <h2 class="mb-4">📌 Admin - Chi Tiết Tour</h2>

    <div class="admin-box mb-4">
      <h4 class="section-title">Thông tin tour</h4>
      <form>
        <div class="row">
          <div class="col-lg-6 mb-3">
            <label class="form-label">Tên tour</label>
            <input type="text" class="form-control" value="<?= $tour['TenTour'] ?>" />
          </div>
          <div class="col-lg-6 mb-3">
            <label class="form-label">Giá</label>
            <input type="text" class="form-control" value="<?= $tour['Gia'] ?>" />
          </div>
          <div class="col-lg-6 mb-3">
            <label class="form-label">Ngày tạo</label>
            <input type="text" class="form-control" value="<?= $tour['NgayTao'] ?>" />
          </div>


          <div class="col-lg-6 mb-3">
            <label class="form-label">Loại tour</label>
            <input type="text" class="form-control" value="<?= $tour['LoaiTourID'] ?>" />
          </div>
          <div class="col-lg-6 mb-3">
            <label class="form-label">Mô tả</label>
            <input type="text" class="form-control" value="<?= $tour['MoTa'] ?>" />
          </div>

        </div>


        <div class="container py-4">
          <div class="mb-3">
            <label class="form-label">Chính sách</label>
            <textarea class="form-control" rows="4">Hủy trước 7 ngày: hoàn 100%
Hủy trong 7 ngày: hoàn 50%</textarea>
          </div>
          <h4 class="section-title">Hình ảnh tour</h4>
          <div class="admin-box mb-4">


            <img src="<?= BASE_URL . $tour['Image'] ?>" style="width:300px; height: 200px; border-radius: 12px;" alt="">

          </div>


          <div class="admin-box mb-4">
            <h4 class="section-title">Lịch trình tour</h4>

            <?php if (!empty($lichtrinh)): ?>
              <div class="accordion" id="accordionLichTrinh">

                <?php foreach ($lichtrinh as $index => $item): ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $index ?>">
                      <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse<?= $index ?>"
                        aria-expanded="false"
                        aria-controls="collapse<?= $index ?>">
                        📅 Ngày <?= $item['Ngay'] ?> – <?= $item['ThoiGian'] ?>
                      </button>
                    </h2>

                    <div id="collapse<?= $index ?>" class="accordion-collapse collapse"
                      aria-labelledby="heading<?= $index ?>"
                      data-bs-parent="#accordionLichTrinh">
                      <div class="accordion-body">

                        <p><strong>Điểm đến:</strong></p>
                        <p><?= nl2br($item['DiemThamQuan']) ?></p>

                        <p class="mt-2"><strong>Hoạt động:</strong></p>
                        <p><?= $item['HoatDong'] ?></p>

                        <a href="<?= BASE_URL_ADMIN . '?act=xoa-lich-trinh&id=' . $item['LichTrinhID'] ?>"
                          class="btn btn-danger btn-sm mt-2">Xoá lịch trình</a>

                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
            <?php else: ?>
              <p class="text-muted">Không có lịch trình nào cho tour này.</p>
            <?php endif; ?>
              <hr>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalThemLichTrinh">
              + Thêm lịch trình
            </button>
            <!-- MODAL THÊM LỊCH TRÌNH -->
            <div class="modal fade" id="modalThemLichTrinh" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title">Thêm lịch trình mới</h5>
                    <button type="submit"  class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <form  action="<?= BASE_URL_ADMIN . '?act=them-lich-trinh' ?>" method="POST">

                    <div class="modal-body">

                      <input type="hidden" name="TourID" value="<?= $tour['TourID'] ?>">
                      <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label>Ngày</label>
                          <input type="date" name="Ngay" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-3">
                          <label>Thời gian</label>
                          <input type="text" name="ThoiGian" class="form-control" required>
                        </div>

                        <div class="col-lg-12 mb-3">
                          <label>Điểm tham quan</label>
                          <textarea name="DiemThamQuan" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                          <label>Hoạt động</label>
                          <input type="text" name="HoatDong" class="form-control" required>
                        </div>
                      </div>

                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Lưu</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>


          </div>

          <button class="btn btn-primary">Lưu thay đổi</button>

          <a href="<?= BASE_URL_ADMIN . '?act=tour' ?>">
            <button class="btn btn-dark">Quay lại</button>
          </a>
      </form>
    </div>







    <!-- <div class="admin-box">
      <h4 class="section-title">Nhà cung cấp</h4>
      <form>
        <div class="mb-3">
          <label class="form-label">Tên công ty</label>
          <input type="text" class="form-control" value="XYZ Travel" />
        </div>
        <div class="mb-3">
          <label class="form-label">Khách sạn</label>
          <input type="text" class="form-control" value="Sunrise Hotel 4*" />
        </div>
        <div class="mb-3">
          <label class="form-label">Phương tiện</label>
          <input type="text" class="form-control" value="Xe giường nằm / Máy bay" />
        </div>
        <button class="btn btn-primary">Cập nhật</button>
      </form>
    </div> -->

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>