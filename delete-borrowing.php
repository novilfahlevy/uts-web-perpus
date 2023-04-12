<?php

require 'functions/borrowing.php';
require 'helpers.php';

if (!role(['admin', 'staff'])) {
  redirect('errors-403.php');
}

if (isset($_GET['id']) && deleteBorrowing($_GET['id'])) {
  alert('Peminjaman berhasil dihapus');
  redirect('borrowings.php');
}