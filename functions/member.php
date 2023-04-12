<?php

require 'session.php';

if (!isset($_SESSION['members'])) {
  $dummy_members_json = file_get_contents('dummy/members.json');
  $dummy_members = json_decode($dummy_members_json, true);
  $_SESSION['members'] = $dummy_members;
}

function getAllMembers() {
  return $_SESSION['members'];
}

function getMemberById($id) {
  $members = getAllMembers();
  foreach ($members as $member) {
    if ($member['id'] == $id) return $member;
  }
  return null;
}

function addMember($data) {
  try {
    $newMember = [
      'id' => substr(md5(mt_rand()), 0, 7),
      'name' => $data['name'],
      'email' => $data['email'],
      'phone' => $data['phone'],
      'created_at' => time()
    ];
  
    $members = [$newMember, ...getAllMembers()];
    $_SESSION['members'] = $members;

    return true;
  } catch (Exception $error) {
    return false;
  }
}

function editMember($id, $data) {
  try {
    foreach (getAllMembers() as $i => $member) {
      if ($id == $member['id']) {
        $_SESSION['members'][$i]['name'] = $data['name'];
        $_SESSION['members'][$i]['email'] = $data['email'];
        $_SESSION['members'][$i]['phone'] = $data['phone'];
      }
    }
    return true;
  } catch (Exception $error) {
    return false;
  }
}

function deleteMember($id) {
  try {
    foreach (getAllMembers() as $i => $member) {
      if ($member['id'] == $id) {
        unset($_SESSION['members'][$i]);
        break;
      }
    }
    return true;
  } catch (Exception $error) {
    return false;
  }
}