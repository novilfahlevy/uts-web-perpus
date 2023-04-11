<?php

function getPageName() {
  $segments = explode('/', $_SERVER['REQUEST_URI']);
  foreach ($segments as $segment) {
    if (str_contains($segment, '.php')) {
      return $segment;
    }
  }

  return null;
}