<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/coupon_func.php';

$cid = $_GET['cid'];
$name = $_GET['name'];
$userid = $_SESSION['UID'];

//회원가입 축하 쿠폰 발행
if(isset($_SESSION['UID'])){
  issue_coupon($mysqli, $userid, $cid, $name);
  echo "<script> alert('쿠폰이 발행되었습니다.'); location.href='/ccccoding/mypage/coupon.php'; </script>";
}else {
  echo "<script> alert('로그인 후 발급받으실 수 있습니다.'); location.href='/ccccoding/login.php'; </script>";
}
?>