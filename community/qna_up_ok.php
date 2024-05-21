<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';

if(isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];
}

$userpw = password_hash($_POST['pw'],PASSWORD_DEFAULT);
$title = $_POST['title'];
$content  = rawurldecode($_POST['content']);
$date = date("Y-m-d");

$sql = "INSERT INTO qna (userid,pw,title,content,date) values ('{$userid}','{$userpw}','{$title}','{$content}','{$date}')";

if($mysqli->query($sql) === true){
  echo"<script>
    alert('질문 등록완료');
     location.href='/ccccoding/community/qna.php';
    </script>";
}else{
  echo "Error:".$sql."<br>".$mysqli -> error;
};

  

?>