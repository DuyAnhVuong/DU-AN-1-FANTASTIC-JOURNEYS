<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Danh sách Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f4f6f8;
    }

    .card {
      border-radius: 12px;
    }

    .badge-status {
      font-size: 12px;
    }
  </style>
</head>

<body>
  <div class="container py-4">

    <h3 class="mb-3">Danh sách Booking</h3>

    <div class="card p-3 mb-3">
      <div class="row g-2">
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Tìm theo tên khách...">
        </div>
        <div class="col-md-3">
          <select class="form-select">
            <option>Tất cả trạng thái</option>
            <option>Chờ duyệt</option>
            <option>Đã xác nhận</option>
            <option>Đã hủy</option>
          </select>
        </div>
        <div class="col-md-3">
          <select class="form-select">
            <option>Tất cả loại tour</option>
            <option>Miền Bắc</option>
            <option>Miền Trung</option>
            <option>Miền Nam</option>
          </select>
        </div>
        <div class="col-md-3">
          <button class="btn btn-primary w-100">Lọc</button>
        </div>
      </div>
    </div>
    <a href="<?= BASE_URL_ADMIN . '?act=form-add-booking' ?>">
      <button class="btn btn-primary">Thêm booking</button>
    </a>
    <div class="card p-3">
      <table class="table table-hover align-middle">

        <thead class="table-light">

          <tr>
            <th>#</th>
            <th>Khách hàng</th>
            <th>Tour</th>
            <th>Loại Khách</th>
            <th>Ngày khởi hành</th>
            <th>Ngày Về</th>
            <th>Tổng số khách</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th class="text-end">Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($listbooking as $key => $booking): ?>
              <td><?= $key + 1 ?></td>
              <td><?= $booking['TenNguoiDat'] ?><br><small class="text-muted"><?= $booking['SDT'] ?></small></td>
              <td><?= $booking['TenTour'] ?></td>
              <td><?= $booking['LoaiKhach'] ?></td>
              <td><?= $booking['NgayKhoiHanhDuKien'] ?></td>
              <td><?= $booking['NgayVe'] ?></td>
              <td><?= $booking['TongSoKhach'] ?></td>
              <td><?= $booking['Gia'] ?></td>
              <td><span class="badge bg-success badge-status">Đã cọc</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-info text-white">Xem</button>
                <button class="btn btn-sm btn-danger">Hủy</button>
              </td>
            </tr>


          <?php endforeach; ?>
        </tbody>
      </table>
      
    </div>
 <a href="<?= BASE_URL_ADMIN ?>">
      <button class="btn btn-dark">Quay lại</button>
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>