<?php

require 'functions/member.php';
require 'helpers.php';

if (!role(['admin', 'staff'])) {
  redirect('errors-403.php');
}

if (isset($_GET['id']) && deleteMember($_GET['id'])) {
  alert('Anggota berhasil dihapus');
  redirect('members.php');
}