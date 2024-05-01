<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
    $pid = $_GET['pid'];
    $sql = "DELETE FROM products WHERE pid = {$pid}";
    
    if($mysqli->query($sql) === true){
    echo "<script>
    alert('삭제 완료');
    location.href='lecture_list.php';
    </script>";
  };
?>