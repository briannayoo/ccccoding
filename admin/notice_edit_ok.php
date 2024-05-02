<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

  $bno = $_POST['idx'];
  $name = $_POST['name'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = date('Y-m-d');

  $sql = "UPDATE notice set name='{$name}',title='{$title}',content='{$content}',date='{$date}'where idx = {$bno}";
  if($mysqli->query($sql)){
    echo "<script>
    alert('내용 수정되었습니다');
    location.href='notice_list.php';
    </script>";
  }else{
    echo "<script>
    history.back();
    </script>";
  }
?>