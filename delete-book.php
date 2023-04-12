<?php

require 'functions/book.php';
require 'helpers.php';

if (!role(['admin', 'staff'])) {
  redirect('errors-403.php');
}

if (isset($_GET['id']) && deleteBook($_GET['id'])) {
  alert('Buku berhasil dihapus');
  redirect('books.php');
}