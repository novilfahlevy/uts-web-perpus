<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <?php require 'layouts/styles.php'; ?>

  <title>PERPUS | Peminjaman</title>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?php require 'layouts/navbar.php'; ?>
      
      <?php require 'layouts/sidebar.php'; ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h4>Peminjaman</h4>
                  <div class="card-header-action">
                    <a href="add-borrowing.php" class="btn btn-success">Tambah <i class="fas fa-plus"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>ISBN</th>
                        <th>Nama peminjam</th>
                        <th>Tanggal dipinjam</th>
                        <th>Tanggal tenggat</th>
                        <th>Tanggal dikembalikan</th>
                        <th>Aksi</th>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td><a href="#">INV-87239</a></td>
                        <td>Novil Fahlevy</td>
                        <td>Senin, 10 April 2023</td>
                        <td>Kamis, 13 April 2023</td>
                        <td>-</td>
                        <td>
                          <a href="edit-borrowing.php?id=1" class="btn btn-primary">Edit</a>
                          <a
                            href="delete-borrowing.php?id=1"
                            class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin ingin menghapus peminjaman ini?')"
                          >
                            Hapus
                          </a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <?php require 'layouts/footer.php'; ?>
    </div>
  </div>

  <?php require 'layouts/scripts.php'; ?>
</body>
</html>