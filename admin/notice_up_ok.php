<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

$name = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
// $clean_string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $content);
$escaped_string = mysqli_real_escape_string($mysqli, $content);
// $content = urlencode($content);
// $content = rawurldecode($content);
$date = date('Y-m-d');
$attach_name = $_FILES['file']['name'];
$attach_temp_path = $_FILES['file']['name'];
$upload_pate = "../../upload/".$attach_name;


move_uploaded_file($attach_temp_path,$upload_pate);
if(strpos($_FILES['file']['type'], 'image') !== false){
  $is_img = 1;
}else{
  $is_img = 0;
}
//이미지 추가



$sql = "INSERT INTO notice (name,title,content,date,file,is_img) values ('{$name}','{$title}','{$escaped_string}','{$date}','{$attach_name}','{$is_img}')";
// echo $sql;
if($mysqli -> query($sql) === true){
  echo"<script>
    alert('공지사항 등록완료');
    location.href='notice_list.php';
    </script>";
}else{
  echo "Error:".$sql."<br>".$mysqli -> error;
}

?>
