<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  

    $idx = $_POST['reply_no'];
    $content = $_POST['r_content'];

    $replySql = "UPDATE qna_reply SET r_content ='{$content}',r_date = now() where idx = {$idx}";
    
    $replyResult = $mysqli->query($replySql);
    

    if($replyResult){
      echo "<script>
          alert('댓글 작성 완료');
          location.href='qna.php';
          </script>";
    } else{
      echo "Error:".$sql."<br>".$mysqli->error;
    }
    $mysqli->close();
?>