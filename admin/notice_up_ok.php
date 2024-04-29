<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

$name = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

$sql = "INSERT INTO notice (name,title,content,date) values ('{$name}','{$title}','{$content}','{$date}')";

if($mysqli -> query($sql) === true){
  echo"<script>
    alert('공지사항 등록완료');
    location.href='notice_list.php';
    </script>";
}else{
  echo "Error:".$sql."<br>".$mysqli -> error;
}

?>
