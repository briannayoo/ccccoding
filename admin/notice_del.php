<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  $bno = $_GET['idx'];
  $sql = "DELETE FROM notice WHERE idx = {$bno}";
  
  if($mysqli->query($sql) === true){
    echo "<script>
    alert('내용이 삭제되었습니다.');
    location.href='notice_list.php';
    </script>";
  };
?>
