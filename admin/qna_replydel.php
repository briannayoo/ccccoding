<?php
   include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

   $idx = $_POST['reply_no'];
   $replySql = "DELETE FROM qna_reply WHERE idx = {$idx}";

   if($mysqli->query($replySql) === true){
      echo "<script>
      alert('내용이 삭제되었습니다.');
      location.href='qna.php';
      </script>";
   };

?>
