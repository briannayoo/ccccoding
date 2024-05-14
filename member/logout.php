<?php
session_start();
session_unset();
session_destroy();
$url = '/ccccoding/index.php';
header("Location:$url");
die();