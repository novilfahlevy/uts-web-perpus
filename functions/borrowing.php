<?php

require 'session.php';

if (!isset($_SESSION['borrowings'])) {
  $dummy_borrowings_json = file_get_contents('dummy/borrowings.json');
  $dummy_borrowings = json_decode($dummy_borrowings_json, true);
  $_SESSION['borrowings'] = $dummy_borrowings;
}

function getAllBorrowings() {
  return $_SESSION['borrowings'];
}

function getBorrowingById($id) {
  $borrowings = getAllBorrowings();
  foreach ($borrowings as $borrowing) {
    if ($borrowing['id'] == $id) return $borrowing;
  }
  return null;
}

function addBorrowing($data) {
  try {
    $newBorrowing = [
      'id' => substr(md5(mt_rand()), 0, 7),
      'book_id' => $data['book_id'],
      'member_id' => $data['member_id'],
      'borrowed_at' => strtotime($data['borrowed_at']),
      'due_at' => strtotime($data['due_at']),
      'returned_at' => null,
      'price' => $data['price'],
    ];
  
    $borrowings = [$newBorrowing, ...getAllBorrowings()];
    $_SESSION['borrowings'] = $borrowings;

    return true;
  } catch (Exception $error) {
    return false;
  }
}

function editBorrowing($id, $data) {
  try {
    foreach (getAllBorrowings() as $i => $borrowing) {
      if ($id == $borrowing['id']) {
        $_SESSION['borrowings'][$i]['book_id'] = $data['book_id'];
        $_SESSION['borrowings'][$i]['member_id'] = $data['member_id'];
        $_SESSION['borrowings'][$i]['borrowed_at'] = $data['borrowed_at'];
        $_SESSION['borrowings'][$i]['due_at'] = $data['due_at'];
        $_SESSION['borrowings'][$i]['price'] = $data['price'];
      }
    }
    return true;
  } catch (Exception $error) {
    return false;
  }
}

function deleteBorrowing($id) {
  try {
    foreach (getAllBorrowings() as $i => $borrowing) {
      if ($borrowing['id'] == $id) {
        unset($_SESSION['borrowings'][$i]);
        break;
      }
    }
    return true;
  } catch (Exception $error) {
    return false;
  }
}