<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin - Quản lý Hướng Dẫn Viên (HDV)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: #f4f6f8;
    }

    .card {
      border-radius: 12px;
    }

    .avatar {
      width: 96px;
      height: 96px;
      object-fit: cover;
      border-radius: 8px;
    }

    .chip {
      display: inline-block;
      padding: 4px 8px;
      border-radius: 999px;
      background: #eef2ff;
      margin-right: 6px;
      margin-bottom: 6px;
    }

    .stat {
      font-weight: 700;
      font-size: 20px;
    }

    .small-muted {
      font-size: 13px;
      color: #6c757d;
    }
  </style>
</head>

<body>
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>Quản lý Danh sách Hướng Dẫn Viên (HDV)</h3>
      <div>
        <!-- <button class="btn btn-primary me-2" id="btnAdd">Thêm HDV</button> -->
        <a href="<?= BASE_URL_ADMIN . '?act=form-them-huongdanvien' ?>">
          <button class="btn btn-primary me-2">Thêm</button>
        </a>
        <!-- <button class="btn btn-outline-secondary" id="btnExport">
                    Xuất CSV
                </button> -->
      </div>
    </div>


    <div class="">
      <div class="card p-3 mb-3">
        <h5>Danh sách HDV</h5>

        <!-- <div class="mb-2 small-muted">
          Tìm kiếm / lọc theo ngôn ngữ, chuyên tuyến, trạng thái
        </div>
        <div class="input-group mb-3">
          <input id="search" type="text" class="form-control" placeholder="Tìm tên, ngôn ngữ, chứng chỉ..." />
          <button class="btn btn-outline-secondary" id="btnSearch">
            Tìm
          </button>
        </div> -->

        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>TenDangNhap</th>
                <th>HoTen</th>
                <th>Avatar</th>
                <th>NgaySinh</th>
                <th>SDT</th>
                <th>Email</th>
                <th>ChungChi</th>
                <th>NgonNgu</th>
                <th>KinhNghiem</th>
                <th>PhanLoai</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($listHuongDanVien as $key => $hdv): ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $hdv['TenDangNhap'] ?></td>

                  <td><?= $hdv['HoTen'] ?>   <?= $hdv['SDT'] ?></td>
                  <td>
                    <img src="<?= BASE_URL . $hdv['Avatar'] ?>" style="width:150px; height: 100px;" alt="">
                  </td>
                  <td><?= $hdv['NgaySinh'] ?></td>

                  <td><?= $hdv['Email'] ?></td>
                  <td><?= $hdv['ChungChi'] ?></td>
                  <td><?= $hdv['NgonNgu'] ?></td>
                  <td><?= $hdv['KinhNghiem'] ?></td>
                  <td><?= $hdv['PhanLoai'] ?></td>
                  <td>
                    <a href="<?= BASE_URL_ADMIN . '?act=form-sua-huongdanvien&id=' . $hdv['HDVID'] ?>">
                      <button class="btn btn-warning">Sửa</button>
                    </a>
                    <a href="<?= BASE_URL_ADMIN . '?act=xoa-huongdanvien&id_huongdanvien=' . $hdv['HDVID'] ?>"
                      onclick="return confirm('Bạn có đồng ý xóa hay không')">
                      <button class="btn btn-danger">Xóa</button>
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <a href="<?= BASE_URL_ADMIN ?>">
            <button class="btn btn-dark">Quay lại</button>
          </a>
        </div>
      </div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>