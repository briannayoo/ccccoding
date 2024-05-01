<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

$oid = $_REQUEST['oid'];
$cancel_request = $_REQUEST['cancel_request'] ?? [];
$refund_refund = $_REQUEST['refund_refund'] ?? [];

foreach($oid as $o){
  $cancel_request[$o] = $cancel_request[$o] ?? 0;
  $refund_request[$o] = $refund_request[$o] ?? 0;

  // 변수 $p 대신에 $o를 사용해야 합니다.
  $sql  = "UPDATE orders set cancel_request = '{$cancel_request[$o]}', refund_request = '{$refund_request[$o]}' WHERE oid = '{$o}'";
  $result = $mysqli->query($sql);

  // UPDATE 쿼리가 실행되었을 때 오류가 발생하지 않는지 확인합니다.
  if($result) {
    // 확인창을 출력하고, history.back() 대신에 location.href를 사용하여 이전 페이지로 이동합니다.
    echo "<script>confirm('수정되었습니다.');location.href=document.referrer;</script>";  
  } else {
    // 오류 메시지를 출력하고, history.back() 대신에 location.href를 사용하여 이전 페이지로 이동합니다.
    echo "<script>alert('오류가 발생했습니다. 다시 확인해주세요.');location.href=document.referrer;</script>";
  }
}

