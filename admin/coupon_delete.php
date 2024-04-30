<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';

$cid = $_POST['cid'];

$sql = "DELETE FROM coupons WHERE id=$cid";

$result = $mysqli -> query($sql);
if($result){
    $data = array('result' => 'ok');
} else{
    $data = array('result' => 'fail');
}

echo json_encode($data);
?>