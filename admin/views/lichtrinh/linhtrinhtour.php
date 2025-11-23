<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin - Chi Tiết Tour</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #eef0f2; }
    .admin-box { background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .section-title { font-weight: 600; font-size: 18px; margin-top: 20px; }
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
            <input type="text" class="form-control" value="Tour Du Lịch ABC - 3N2Đ" />
          </div>
          <div class="col-lg-6 mb-3">
            <label class="form-label">Giá người lớn</label>
            <input type="text" class="form-control" value="3.490.000" />
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 mb-3">
            <label class="form-label">Giá trẻ em</label>
            <input type="text" class="form-control" value="1.990.000" />
          </div>
          <div class="col-lg-6 mb-3">
            <label class="form-label">Phụ thu lễ</label>
            <input type="text" class="form-control" value="20%" />
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Lịch trình</label>
          <textarea class="form-control" rows="4">Ngày 1: Tham quan A
Ngày 2: Vui chơi B
Ngày 3: Mua sắm - Trở về</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Chính sách</label>
          <textarea class="form-control" rows="4">Hủy trước 7 ngày: hoàn 100%
Hủy trong 7 ngày: hoàn 50%</textarea>
        </div>

        <button class="btn btn-primary">Lưu thay đổi</button>
        <button class="btn btn-danger ms-2">Xóa tour</button>
      </form>
    </div>

    <div class="admin-box mb-4">
      <h4 class="section-title">Hình ảnh tour</h4>
      <div class="row g-2 mb-3">
        <div class="col-4"><img src="https://picsum.photos/300/200" class="img-fluid rounded"></div>
        <div class="col-4"><img src="https://picsum.photos/301/200" class="img-fluid rounded"></div>
        <div class="col-4"><img src="https://picsum.photos/302/200" class="img-fluid rounded"></div>
      </div>
      <button class="btn btn-secondary">Thêm hình ảnh</button>
    </div>

    <div class="admin-box">
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
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
