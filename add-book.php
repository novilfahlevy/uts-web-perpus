<?php

require 'functions/book.php';
require 'helpers.php';

if (!role(['admin', 'staff'])) {
  redirect('books.php');
}

if (isset($_POST['submit'])) {
  $isbn = $_POST['isbn'];
  $title = $_POST['title'];
  $numbers = $_POST['numbers'];

  $newBook = compact('isbn', 'title', 'numbers');

  if (addBook($newBook)) {
    alert('Buku berhasil ditambah');
    redirect('books.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <?php require 'layouts/styles.php'; ?>

  <title>PERPUS | Tambah buku</title>
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
                  <h4>Tambah buku</h4>
                  <div class="card-header-action">
                    <a href="books.php" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                  </div>
                </div>
                <div class="card-body">
                  <form action="add-book.php" method="POST">
                    <div class="form-group">
                      <label for="isbn">ISBN</label>
                      <input type="text" id="isbn" name="isbn" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="title">Judul</label>
                      <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="numbers">Jumlah</label>
                      <input type="number" id="numbers" name="numbers" class="form-control">
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
</body>
</html>