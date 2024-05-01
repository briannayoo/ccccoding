<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';


//관리자 검사
// if (!isset($_SESSION['AUID'])) {
//   $result_data = array('result' => 'member');
//   echo json_encode($result_data);
//   exit;
// }

$thumbnail = $_POST['thumbnail'];
$sql = "SELECT * FROM products WHERE thumbnail = {$thumbnail}";
$result = $mysqli->query($sql);
$rs = $result->fetch_object(); //$rs->userid

if ($rs->userid !== $_SESSION['AUID']) {
  $result_data = array('result' => 'mine');
  echo json_encode($result_data);
  exit;
}
$sql = "UPDATE thumbnail SET status = 0 where thumbnail = {$thumbnail}";
$result = $mysqli->query($sql);

if ($result) {
  $delete_file = $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/upload/' . $rs->filename;
  unlink($delete_file);
  $result_data = array('result' => 'ok');
  echo json_encode($result_data);
} else {
  $result_data = array('result' => 'fail');
  echo json_encode($result_data);
}
