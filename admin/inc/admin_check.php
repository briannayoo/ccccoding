<?php
if(!isset($_SESSION['AUID'])){
    echo "<script>
      alert('권한이 없습니다.');
      location.href='/ccccoding/admin/login.php';
    </script>";
  }
?>