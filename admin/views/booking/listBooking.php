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
            <!-- <th>Tổng tiền</th>
            <th>NCC Khách sạn</th>
            <th>NCC Dịch vụ</th> -->
            <th>NCC Phương tiện</th>
        
            <th class="text-end">Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($listbooking as $key => $booking):
            //   $status_class = ''; // Khởi tạo biến để lưu lớp CSS màu

            //   if ($booking['TrangThai'] == 'Chờ xác nhận') {
            //     $status_class = 'bg-warning'; // Màu vàng cho Chờ xác nhận
            //   } elseif ($booking['TrangThai'] == 'Đã cọc') {
            //     $status_class = 'bg-primary'; // Màu xanh dương cho Đã cọc
            //   } elseif ($booking['TrangThai'] == 'Hoàn tất') {
            //     $status_class = 'bg-success'; // Màu xanh lá cho Hoàn tất
            //   } elseif ($booking['TrangThai'] == 'Hủy') {
            //     $status_class = 'bg-danger'; // Màu đỏ cho Hủy
            //   } else {
            //     // Có thể thêm một màu mặc định nếu trạng thái không khớp với bất kỳ điều kiện nào
            //     $status_class = 'bg-secondary'; // Ví dụ: màu xám mặc định
            //   }
            // ?>

              <td><?= $key + 1 ?></td>
              <td><?= $booking['TenNguoiDat'] ?><br><small class="text-muted"><?= $booking['SDT'] ?></small></td>
              <td><?= $booking['TenTour'] ?></td>
              <td><?= $booking['LoaiKhach'] ?></td>
              <td><?= $booking['NgayKhoiHanhDuKien'] ?></td>
              <td><?= $booking['NgayVe'] ?></td>
              <td><?= $booking['TongSoKhach'] ?></td>
              <td><?= $booking['Gia'] * $booking['TongSoKhach']?></td>
              <!-- <td><?= $booking['NameKS'] ?></td>
              <td><?= $booking['Name_DV'] ?></td>
              <td><?= $booking['Name_PhuongTien'] ?></td> -->
              <td><?= $booking['status'] ?></td>
              <!-- <td>
                <span class="badge <?= $status_class ?> badge-status">
                  <?= $booking['TrangThai'] ?>
                </span>
              </td> -->
             <td class="text-end">
        <a href="<?= BASE_URL_ADMIN . '?act=detail-booking&id=' . $booking['BookingID'] ?>">
         <button class="btn btn-primary">Xem</button>
        </a>
        <a href="<?= BASE_URL_ADMIN . '?act=form-edit-booking&id=' . $booking['BookingID'] ?>">
         <button class="btn btn-warning">Sửa</button>
        </a>
        <button class="btn btn-dark text-white">Khách hàng</button>
                <a href="<?= BASE_URL_ADMIN . '?act=huy-booking&id=' . $booking['BookingID'] ?>"
         onclick="return confirm('Bạn có đồng ý HỦY booking này hay không?')">
         <button class="btn btn-danger">Hủy</button>
        </a>
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