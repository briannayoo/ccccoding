<?php
  session_start();
  session_unset();
  session_destroy();

  $url = '/ccccoding/admin/login.php';
  header("Location:$url");
  die();
?>