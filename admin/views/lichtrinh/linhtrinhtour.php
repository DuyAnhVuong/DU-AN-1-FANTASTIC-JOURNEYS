<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin - Chi Tiết Tour</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #EEF1F6;
      font-family: "Inter", sans-serif;
    }

    .page-title {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 25px;
      color: #1f1f1f;
    }

    .box {
      background: white;
      padding: 25px;
      border-radius: 16px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
      margin-bottom: 25px;
    }

    .section-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 15px;
      color: #333;
    }

    .tour-image {
      width: 320px;
      height: 200px;
      object-fit: cover;
      border-radius: 12px;
      margin-top: 10px;
    }

    .card-header {
      background: #f5f7fb;
      font-weight: 600;
      border-bottom: 1px solid #e2e3e8;
    }

    .btn-primary {
      background: #5565fd;
      border: none;
      padding: 10px 18px;
      border-radius: 10px;
    }

    .btn-dark {
      border-radius: 10px;
      padding: 10px 18px;
    }

    .btn-danger {
      border-radius: 10px;
      padding: 8px 16px;
    }
  </style>
</head>

<body>

  <div class="container py-4">

    <h2 class="page-title">📌 Admin – Chi Tiết Tour</h2>

    <!-- ================== THÔNG TIN TOUR ===================== -->
    <div class="box">
      <h4 class="section-title">Thông tin tour</h4>

      <form>
        <div class="row">
          <div class="col-lg-6 mb-3">
            <label class="form-label">Tên tour</label>
            <input type="text" class="form-control" value="<?= $tour['TenTour'] ?>" />
          </div>

          <div class="col-lg-6 mb-3">
            <label class="form-label">Giá</label>
            <input type="text" class="form-control" value="<?= number_format($tour['Gia']) . 'đ' ?>" />
          </div>

          <div class="col-lg-6 mb-3">
            <label class="form-label">Ngày tạo</label>
            <input type="text" class="form-control" value="<?= $tour['NgayTao'] ?>" />
          </div>

          <div class="col-lg-6 mb-3">
            <label class="form-label">Loại tour</label>
            <input type="text" class="form-control" value="<?= $tour['ten_danh_muc'] ?>" />
          </div>

          <div class="col-lg-12 mb-3">
            <label class="form-label">Mô tả</label>
            <textarea class="form-control" rows="2"><?= $tour['MoTa'] ?></textarea>
          </div>
        </div>

        <!-- HÌNH ẢNH -->
        <h4 class="section-title mt-4">Hình ảnh tour</h4>
        <img src="<?= BASE_URL . $tour['Image'] ?>" class="tour-image" alt="">
      </form>
    </div>

    <!-- ================== LỊCH TRÌNH ===================== -->
    <div class="box">
      <h4 class="section-title">Lịch trình tour</h4>

      <?php if (!empty($lichtrinh)): ?>
        <?php foreach ($lichtrinh as $index => $item): ?>

          <div class="card mb-3 border-0 shadow-sm">
            <div class="card-header" data-bs-toggle="collapse" data-bs-target="#lt<?= $index ?>" style="cursor:pointer;">
              Ngày <?= $item['Ngay'] ?>
            </div>

            <div id="lt<?= $index ?>" class="collapse">
              <div class="card-body">
                <div class="row">

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Thời gian</label>
                    <input type="text" class="form-control" value="<?= $item['ThoiGian'] ?>">
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Điểm tham quan</label>
                    <textarea class="form-control"><?= $item['DiemThamQuan'] ?></textarea>
                  </div>

                  <div class="col-lg-12 mb-3">
                    <label class="form-label">Hoạt động</label>
                    <input type="text" class="form-control" value="<?= $item['HoatDong'] ?>">
                  </div>

                </div>

                <a href="<?= BASE_URL_ADMIN . '?act=xoa-lich-trinh&id=' . $item['LichTrinhID'] ?>"
                  class="btn btn-danger">Xóa</a>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-muted">Không có lịch trình cho tour này.</p>
      <?php endif; ?>

      <a href="<?= BASE_URL_ADMIN . '?act=form-them-lich-trinh' ?>" class="btn btn-primary mt-2">Thêm lịch trình</a>
    </div>

    <!-- ================== NHÀ CUNG CẤP ===================== -->
    <div class="box">
      <h4 class="section-title">Nhà cung cấp</h4>

      <div class="row">

        <div class="col-lg-6 mb-3">
          <label class="form-label">Phương tiện</label>
          <input type="text" class="form-control" value="<?= $tour['Name_PhuongTien'] ?>" />
        </div>

        <div class="col-lg-6 mb-3">
          <label class="form-label">Khách sạn</label>
          <input type="text" class="form-control" value="<?= $tour['NameKS'] ?>" />
        </div>

        <div class="col-lg-6 mb-3">
          <label class="form-label">Dịch vụ</label>
          <input type="text" class="form-control" value="<?= $tour['Name_DV'] ?>" />
        </div>

      </div>
    </div>

    <a href="<?= BASE_URL_ADMIN . '?act=tour' ?>">
      <button class="btn btn-dark">Quay lại</button>
    </a>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
