<?php

require 'functions/member.php';
require 'helpers.php';

checkAuthenticated();
checkAuthorized(['admin', 'staff']);

if (isset($_GET['id']) && deleteMember($_GET['id'])) {
  alert('Anggota berhasil dihapus');
  redirect('members.php');
}