<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Tài Khoản Quản Trị</title>
  <style>
    /* Tông màu nền chung theo yêu cầu */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f9;
      padding: 20px;
    }

    .form-card {
      max-width: 600px;
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      /* Shadow mềm hơn */
      overflow: hidden;
      border: 1px solid #e9ecef;
    }

    /* Tông màu TÍM cho Header, hài hòa với Gradient trong ảnh */
    .card-header-custom {
      background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
      color: #ffffff;
      padding: 20px 30px;
      border-bottom: none;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .card-title-custom {
      font-size: 24px;
      font-weight: 600;
      margin: 0;
    }

    .card-body-custom {
      padding: 30px;
    }

    .form-group-custom {
      margin-bottom: 20px;
    }

    .form-group-custom label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #495057;
    }

    .form-control-custom,
    .form-select-custom {
      width: 100%;
      padding: 12px;
      border: 1px solid #ced4da;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s, box-shadow 0.3s;
      box-sizing: border-box;
    }

    .form-control-custom:focus,
    .form-select-custom:focus {
      border-color: #667eea;
      /* Màu tím nhạt khi focus */
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.25);
      outline: none;
    }

    .text-danger-custom {
      color: #dc3545;
      margin-top: 5px;
      font-size: 14px;
    }

    .card-footer-custom {
      padding: 20px 30px;
      background-color: #f8f9fa;
      border-top: 1px solid #e9ecef;
      display: flex;
      justify-content: space-between;
      /* Để tách nút Quay lại và Submit */
      align-items: center;
    }

    /* Nút Submit - Màu xanh lá cây nổi bật */
    .btn-submit {
      padding: 10px 20px;
      background-color: #28a745;
      /* Màu xanh lá cây tương tự nút 'Thêm Tài Khoản Mới' */
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.1s;
    }

    .btn-submit:hover {
      background-color: #218838;
      transform: translateY(-1px);
    }

    /* Nút Quay Lại - Màu xám/xanh nhạt để làm nút phụ */
    .btn-back {
      padding: 10px 20px;
      background-color: #6c757d;
      /* Xám */
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .btn-back:hover {
      background-color: #5a6268;
    }
  </style>
</head>

<body>

  <div class="form-card">
    <div class="card-header-custom">
      <span>🔑</span>
      <h3 class="card-title-custom">Thêm Tài Khoản Quản Trị</h3>
    </div>

    <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST">
      <div class="card-body-custom">

        <div class="form-group-custom">
          <label for="HoTen">Họ tên</label>
          <input type="text" class="form-control-custom" id="HoTen" name="ho_ten" placeholder="Nhập họ tên">
          <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
            <p class="text-danger-custom"><?= $_SESSION['error']['ho_ten'] ?></p>
            <?php unset($_SESSION['error']['ho_ten']); ?>
          <?php } ?>
        </div>

        <div class="form-group-custom">
          <label for="Password">Mật khẩu</label>
          <input type="password" class="form-control-custom" id="Password" name="password" placeholder="Nhập mật khẩu">
          <?php if (isset($_SESSION['error']['password'])) { ?>
            <p class="text-danger-custom"><?= $_SESSION['error']['password'] ?></p>
            <?php unset($_SESSION['error']['password']); ?>
          <?php } ?>
        </div>

        <div class="form-group-custom">
          <label for="Email">Email</label>
          <input type="email" class="form-control-custom" id="Email" name="email" placeholder="Nhập email">
          <?php if (isset($_SESSION['error']['email'])) { ?>
            <p class="text-danger-custom"><?= $_SESSION['error']['email'] ?></p>
            <?php unset($_SESSION['error']['email']); ?>
          <?php } ?>
        </div>

        <div class="form-group-custom">
          <label for="VaiTro">Vai trò</label>
          <select class="form-select-custom" name="chuc_vu_id" id="VaiTro">
            <option value="1">Admin</option>
            <option value="2">Hướng Dẫn Viên</option>
          </select>
        </div>

      </div>

      <div class="card-footer-custom">
        <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="btn-back">
          &lt; Quay lại
        </a>

        <button type="submit" class="btn-submit">Thêm tài khoản</button>
      </div>
    </form>
  </div>

</body>

</html>