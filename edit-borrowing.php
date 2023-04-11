<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <?php require 'layouts/styles.php'; ?>

  <title>PERPUS | Edit peminjaman</title>
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
                  <h4>Edit peminjaman</h4>
                  <div class="card-header-action">
                    <a href="borrowings.php" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                  </div>
                </div>
                <div class="card-body">
                  <form action="edit-borrowing.php" method="POST">
                    <div class="form-group">
                      <label for="id_buku">Judul buku</label>
                      <select id="id_buku" name="id_buku" class="form-control">
                        <option value="1">a</option>
                        <option value="2">b</option>
                        <option value="3">c</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="id_peminjam">Nama peminjam</label>
                      <select id="id_peminjam" name="id_peminjam" class="form-control">
                        <option value="1">a</option>
                        <option value="2">b</option>
                        <option value="3">c</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tanggal_dipinjam">Tanggal dipinjam</label>
                      <input type="date" id="tanggal_dipinjam" name="tanggal_dipinjam" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="tanggal_tenggat">Tanggal tenggat</label>
                      <input type="date" id="tanggal_tenggat" name="tanggal_tenggat" class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
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