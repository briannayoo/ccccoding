<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  

    $idx = $_POST['idx'];
    $name = $_POST['r_name'];
    $content = $_POST['r_content'];
  
    
    $replySql = "INSERT INTO qna_reply (r_name,r_idx,r_content,r_date) values ('{$name}',{$idx},'{$content}',now())";
    
    // echo $replySql;
    if($mysqli->query($replySql) === true){

      $reSql = "UPDATE qna set status = 1  where qid = $idx";
      $mysqli->query($reSql);

      echo "<script>
          alert('댓글 작성 완료');
          location.href='qna.php';
          </script>";
    } else{
      echo "Error:".$sql."<br>".$mysqli->error;
    }
    $mysqli->close();
?>