<?php

require 'functions/book.php';
require 'functions/member.php';
require 'functions/borrowing.php';
require 'helpers.php';

if (!role(['admin', 'staff'])) {
  redirect('errors-403.php');
}

if (isset($_POST['submit'])) {
  $book_id = $_POST['book_id'];
  $member_id = $_POST['member_id'];
  $borrowed_at = $_POST['borrowed_at'];
  $due_at = $_POST['due_at'];
  $price = $_POST['price'];

  $newBorrowing = compact('book_id', 'member_id', 'borrowed_at', 'due_at', 'price');

  if (addBorrowing($newBorrowing)) {
    alert('Peminjaman berhasil ditambah');
    redirect('borrowings.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <?php require 'layouts/styles.php'; ?>

  <title>PERPUS | Tambah peminjaman</title>
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
                  <h4>Tambah peminjaman</h4>
                  <div class="card-header-action">
                    <a href="borrowings.php" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                  </div>
                </div>
                <div class="card-body">
                  <form action="add-borrowing.php" method="POST">
                    <div class="form-group">
                      <label for="book_id">Judul buku</label>
                      <select id="book_id" name="book_id" class="form-control">
                        <?php foreach (getAllBooks() as $book): ?>
                          <option value="<?= $book['id'] ?>"><?= $book['title']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="member_id">Nama peminjam</label>
                      <select id="member_id" name="member_id" class="form-control">
                      <?php foreach (getAllMembers() as $member): ?>
                          <option value="<?= $member['id'] ?>"><?= $member['name']; ?> (<?= $member['email']; ?>)</option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="borrowed_at">Tanggal dipinjam</label>
                      <input type="date" id="borrowed_at" name="borrowed_at" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="due_at">Tanggal tenggat</label>
                      <input type="date" id="due_at" name="due_at" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="price">Biaya per hari</label>
                      <input type="number" id="price" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                      <p>Total biaya: <span id="borrowingPriceResult">Rp 0</span></p>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
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
  <script src="scripts/borrowing.js"></script>
</body>
</html>