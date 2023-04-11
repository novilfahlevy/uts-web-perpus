<?php

require 'session.php';

if (!function_exists('getPageName')) {
  function getPageName() {
    $segments = explode('/', $_SERVER['REQUEST_URI']);
    foreach ($segments as $segment) {
      if (str_contains($segment, '.php')) {
        return $segment;
      }
    }
  
    return null;
  }
}

if (!function_exists('getLoggedUser')) {
  function getLoggedUser() {
    if (isset($_SESSION['logged_account'])) {
      return $_SESSION['logged_account'];
    }
    
    return null;
  }
}

if (!function_exists('role')) {
  function role($roles) {
    $user = getLoggedUser();
    return in_array($user['role'], $roles);
  }
}

if (!function_exists('getLoginMinutes')) {
  function getLoginMinutes() {
    $user = getLoggedUser();
    return floor(abs(time() - $user['logged_at']) / 60);
  }
}