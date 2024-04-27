<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';


  $userid = trim($_POST['userid']);
  $passwd = trim($_POST['passwd']);
  $passwd = hash('sha512',$passwd);

  $sql="SELECT * FROM admins where userid='{$userid}' and passwd ='{$passwd}'";
  $result = $mysqli->query($sql);
  $rs = $result->fetch_object();


  //$rs->idx
  if($rs){
    $sql = "UPDATE admins set last_login=now() where idx = {$rs->idx}";
    $result = $mysqli->query($sql);
    $_SESSION['AUID'] = $rs -> userid;
    $_SESSION['AUNAME'] = $rs -> username;
    echo "<script>
    alert('관리자님 반갑습니다');
    location.href='/pinkping/admin/index.php';
    </script>";
  } else{
    echo "<script>
    alert('아이디 또는 비밀번호를 다시 확인해주세요');
    history.back();
    </script>";
    exit();
  }

?>