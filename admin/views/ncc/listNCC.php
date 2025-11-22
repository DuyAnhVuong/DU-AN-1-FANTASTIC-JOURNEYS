<!-- header -->
<?php require './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý nhà cung cấp</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=form-them-ncc' ?>">
                <button class="btn btn-success">Thêm nhà cung cấp</button>
              </a>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                   
                    <th>NCC_TourID</th>
                    <th>TourID</th>
                    <th>Loại dịch vụ</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Thông tin liên hệ</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>

                <tbody>
                  
                    <?php foreach ($listNCC as $key => $NCC): ?>
                      <tr>
                        
                        <td><?= $NCC['NCC_TourID'] ?></td>
                        <td><?= $NCC['TourID'] ?></td>
                        <td><?= $NCC['LoaiDichVu'] ?></td>
                        <td><?= $NCC['TenNCC'] ?></td>
                        <td><?= $NCC['ThongTinLienHe'] ?></td>

                        <td>
                          <a href="<?= BASE_URL_ADMIN . '?act=form-sua-ncc&id=' . $NCC['NCC_TourID'] ?>">
                            <button class="btn btn-warning">Sửa</button>
                          </a>

                          <a href="<?= BASE_URL_ADMIN . '?act=xoa-ncc&id=' . $NCC['NCC_TourID'] ?>"
                             onclick="return confirm('Bạn có chắc muốn xóa nhà cung cấp này?')">
                            <button class="btn btn-danger">Xóa</button>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                 
                </tbody>

              </table>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>
</div>

<?php include './views/layout/footer.php'; ?>
