<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

$type = $_POST['type'];
$oid = $_POST['oid'];
$oids = implode(",",$oid);



  // 변수 $p 대신에 $o를 사용해야 합니다.
  $sql  = "UPDATE orders set $type = '처리완료' WHERE oid IN ($oids)";


  $result = $mysqli->query($sql);

  // UPDATE 쿼리가 실행되었을 때 오류가 발생하지 않는지 확인합니다.
  if($result){
    $result_data = array('result' => 'ok');
    echo json_encode($result_data);
  } else{
    $result_data = array('result' => 'fail');
    echo json_encode($result_data); 
  }


