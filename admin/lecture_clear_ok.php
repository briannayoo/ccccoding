<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

$sql = "DELETE FROM products";
$result = $mysqli -> query($sql);
if($result){
    echo "<script>
    alert('일괄삭제 완료.');
    location.href = '/ccccoding/admin/lecture_list.php';
  </script>";
} else{
    echo "<script>
    alert('실패, 다시 시도해주세요');
    history.back();
  </script>";
}

?>