<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
ini_set( 'display_errors', '1' );

$mysqli->autocommit(FALSE);//커밋이 안되도록 지정
$eid = $_POST['eid'];
$e_name = $_POST['e_name'];
 // $coupon_name 변수를 $coupon_desc로 수정
$e_file = $_POST['e_file'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$regdate = date('Y-m-d H:i:s');
$max_value = $_POST['max_value'] ?? '';
$event_date = $_POST['event_date'] ?? '';
$status = $_POST['status'] ?? '';

$e_img = $_FILES['e_img'];
  if($_FILES['e_img']['size']>10240000) { // 10메가
      echo "<script>alert('10메가 이하만 첨부할 수 있습니다.');history.back();</script>";
      exit;
  }

  // if($_FILES['coupon_image']['type']!='image/jpeg' and $_FILES['coupon_image']['type']!='image/gif' and $_FILES['coupon_image']['type']!='image/png') { // 이미지가 아니면, 다른 type은 and로 추가
  //     echo "<script>alert('이미지만 첨부할 수 있습니다.');history.back();</script>";
  //     exit;
  // }

    //이미지 여부 검사
    if (strpos($_FILES['e_img']['type'], 'image') === false) {
      echo "<script>
        alert('이미지만 업로드해주세요');
        history.back();
      </script>";
      exit;
    }

  $save_dir = $_SERVER['DOCUMENT_ROOT']."/ccccoding/admin/image/"; // 파일을 업로드할 디렉토리
  $filename = $_FILES["e_img"]['name'];
  $ext = pathinfo($filename,PATHINFO_EXTENSION); // 확장자 구하기
  $newfilename = date("YmdHis").substr(rand(),0,6);
  $savefile = $newfilename.".".$ext; // 새로운 파일이름과 확장자를 합친다
 
  if(move_uploaded_file($_FILES["e_img"]["tmp_name"], $save_dir.$savefile)) {
      $e_img = "/ccccoding/admin/image/".$savefile;
  } else {
      echo "<script>alert('이미지를 등록할 수 없습니다. 관리자에게 문의해주십시오.');//history.back();</script>";
      exit;
  }

  $sql = "INSERT INTO event (
    e_name, 
    e_img, 
    e_file, 
    event_time, 
    start_date, 
    end_date, 
    status
  ) VALUES (
    '{$e_name}',
    '{$e_img}',
    '{$e_file}',
    '{$event_date}',
    '{$start_date}',
    '{$end_date}',
    '{$status}'
  )";

// echo $sql;

try{
  $rs = $mysqli->query($sql);
  $mysqli->commit(); // 디비에 커밋한다.

  // echo $mysqli;

  echo "<script>alert('등록했습니다.'); 
  location.href='/ccccoding/admin/event.php';
  </script>";
  exit;

} catch (Exception $e) {
  $mysqli->rollback(); // 저장한 테이블이 있다면 롤백한다.
  echo "<script>alert('등록하지 못했습니다. 관리자에게 문의해주십시오.');//history.back();</script>";
  exit;
}

?>