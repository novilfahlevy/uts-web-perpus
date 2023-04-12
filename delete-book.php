<?php

require 'functions/book.php';
require 'helpers.php';

if (!role(['admin', 'staff'])) {
  redirect('books.php');
}

if (isset($_GET['id']) && deleteBook($_GET['id'])) {
  alert('Buku berhasil dihapus');
  redirect('books.php');
}