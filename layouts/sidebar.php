<?php

require 'helpers.php';

$user = getLoggedUser();

?>

<!-- Sidebar -->
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">PERPUS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">PRPS</a>
    </div>
    <ul class="sidebar-menu">
      <?php if (roles(['admin'])): ?>
        <li class="<?= getPageName() == 'dashboard.php' ? 'active' : '' ?>">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dasbor</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (roles(['admin', 'staff', 'member'])): ?>
        <li class="<?= getPageName() == 'books.php' ? 'active' : '' ?>">
          <a class="nav-link" href="books.php">
            <i class="fas fa-book"></i>
            <span>Buku</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (roles(['admin', 'staff'])): ?>
        <li class="<?= getPageName() == 'borrowings.php' ? 'active' : '' ?>">
          <a class="nav-link" href="borrowings.php">
            <i class="fas fa-bookmark"></i>
            <span>Peminjaman</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (roles(['admin', 'staff'])): ?>
        <li class="<?= getPageName() == 'members.php' ? 'active' : '' ?>">
          <a class="nav-link" href="members.php">
            <i class="fas fa-users"></i>
            <span>Anggota</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="logout.php" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-sign-out-alt"></i> Keluar
      </a>
    </div>
  </aside>
</div>