<?php

require 'functions/member.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <?php require 'layouts/styles.php'; ?>

  <title>PERPUS | Anggota</title>
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
                  <h4>Anggota</h4>
                  <div class="card-header-action">
                    <a href="add-member.php" class="btn btn-success">Tambah <i class="fas fa-plus"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Tanggal terdaftar</th>
                        <th>Aksi</th>
                      </tr>
                      <?php $i = 1; ?>
                      <?php foreach (getAllMembers() as $member): ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td class="font-weight-600"><?= $member['name']; ?></td>
                          <td><a href="mailto:<?= $member['email']; ?>"><?= $member['email']; ?></a></td>
                          <td><?= $member['phone']; ?></td>
                          <td><?= date('l, d F Y', $member['created_at']); ?></td>
                          <td>
                            <a href="edit-member.php?id=<?= $member['id']; ?>" class="btn btn-primary">Edit</a>
                            <a
                              href="delete-member.php?id=<?= $member['id']; ?>"
                              class="btn btn-danger"
                              onclick="return confirm('Apakah anda yakin ingin menghapus anggota ini?')"
                            >
                              Hapus
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
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