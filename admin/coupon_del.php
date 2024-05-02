<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  $cid = $_GET['cid'];
  $sql = "DELETE FROM coupons WHERE cid = '$cid'";
  
  if($mysqli->query($sql) === true){
    echo "<script>
    alert('내용이 삭제되었습니다.');
    location.href='coupon_list.php';
    </script>";
  };
?>
