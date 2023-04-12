<?php

require 'functions/borrowing.php';
require 'helpers.php';

checkAuthenticated();
checkAuthorized(['admin', 'staff']);

if (isset($_GET['id']) && deleteBorrowing($_GET['id'])) {
  alert('Peminjaman berhasil dihapus');
  redirect('borrowings.php');
}