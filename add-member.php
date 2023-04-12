<?php

require 'functions/member.php';
require 'helpers.php';

checkAuthenticated();
checkAuthorized(['admin', 'staff']);

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $newMember = compact('name', 'email', 'phone');

  if (addMember($newMember)) {
    alert('Anggota berhasil ditambah');
    redirect('members.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <?php require 'layouts/styles.php'; ?>

  <title>PERPUS | Tambah anggota</title>
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
                  <h4>Tambah anggota</h4>
                  <div class="card-header-action">
                    <a href="members.php" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                  </div>
                </div>
                <div class="card-body">
                  <form action="add-member.php" method="POST">
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="phone">No Telepon</label>
                      <input type="number" id="phone" name="phone" class="form-control">
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