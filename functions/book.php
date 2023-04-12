<?php

require 'session.php';

if (!isset($_SESSION['books'])) {
  $dummy_books_json = file_get_contents('dummy/books.json');
  $dummy_books = json_decode($dummy_books_json, true);
  $_SESSION['books'] = $dummy_books;
}

function getAllBooks() {
  return $_SESSION['books'];
}

function getBookById($id) {
  $books = getAllBooks();
  foreach ($books as $book) {
    if ($book['id'] == $id) return $book;
  }
  return null;
}

function addBook($data) {
  try {
    $newBook = [
      'id' => substr(md5(mt_rand()), 0, 7),
      'isbn' => $data['isbn'],
      'title' => $data['title'],
      'numbers' => $data['numbers']
    ];
  
    $books = [$newBook, ...getAllBooks()];
    $_SESSION['books'] = $books;

    return true;
  } catch (Exception $error) {
    return false;
  }
}

function editBook($id, $data) {
  try {
    foreach (getAllBooks() as $i => $book) {
      if ($id == $book['id']) {
        $_SESSION['books'][$i]['isbn'] = $data['isbn'];
        $_SESSION['books'][$i]['title'] = $data['title'];
        $_SESSION['books'][$i]['numbers'] = $data['numbers'];
      }
    }
    return true;
  } catch (Exception $error) {
    return false;
  }
}

function deleteBook($id) {
  try {
    foreach (getAllBooks() as $i => $book) {
      if ($book['id'] == $id) {
        unset($_SESSION['books'][$i]);
        break;
      }
    }
    return true;
  } catch (Exception $error) {
    return false;
  }
}