<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
ini_set( 'display_errors', '1' );

$mysqli->autocommit(FALSE);//커밋이 안되도록 지정
try {
$coupon_name = $_POST['coupon_name'];
$coupon_desc = $_POST['coupon_desc']; // $coupon_name 변수를 $coupon_desc로 수정
$coupon_type = $_POST['coupon_type'];
$coupon_price = $_POST['coupon_price'] ?? 0;
$coupon_ratio = $_POST['coupon_ratio'] ?? 0;
$status = $_POST['status'] ?? 0;
$regdate = date('Y-m-d H:i:s');
$max_value = $_POST['max_value'] ?? '';
$use_min_price = $_POST['use_min_price'] ?? '';
$use_date_type = $_POST['use_date_type'] ?? '';
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$coupon_image = ""; // 쿠폰 이미지 변수 초기화

  if($_FILES['coupon_image']['size']>10240000) { // 10메가
      echo "<script>alert('10메가 이하만 첨부할 수 있습니다.');history.back();</script>";
      exit;
  }

  // if($_FILES['coupon_image']['type']!='image/jpeg' and $_FILES['coupon_image']['type']!='image/gif' and $_FILES['coupon_image']['type']!='image/png') { // 이미지가 아니면, 다른 type은 and로 추가
  //     echo "<script>alert('이미지만 첨부할 수 있습니다.');history.back();</script>";
  //     exit;
  // }

    //이미지 여부 검사
    if (strpos($_FILES['coupon_image']['type'], 'image') === false) {
      echo "<script>
        alert('이미지만 업로드해주세요');
        history.back();
      </script>";
      exit;
    }

  $save_dir = $_SERVER['DOCUMENT_ROOT']."/ccccoding/admin/c_upload/"; // 파일을 업로드할 디렉토리
  $filename = $_FILES["coupon_image"]["name"];
  $ext = pathinfo($filename,PATHINFO_EXTENSION); // 확장자 구하기
  $newfilename = date("YmdHis").substr(rand(),0,6);
  $savefile = $newfilename.".".$ext; // 새로운 파일이름과 확장자를 합친다
 
  if(move_uploaded_file($_FILES["coupon_image"]["tmp_name"], $save_dir.$savefile)) {
      $coupon_image = "/ccccoding/admin/c_upload/".$savefile;
  } else {
      echo "<script>alert('이미지를 등록할 수 없습니다. 관리자에게 문의해주십시오.');//history.back();</script>";
      exit;
  }

  $sql = "INSERT INTO coupons (
    coupon_name, 
    coupon_desc, 
    coupon_image, 
    coupon_type, 
    coupon_price, 
    coupon_ratio, 
    status, 
    regdate, 
    max_value, 
    use_min_price,
    use_date_type,
    start_date,
    end_date
  ) VALUES (
    '{$coupon_name}',
    '{$coupon_desc}',
    '{$coupon_image}',
    '{$coupon_type}',
    '{$coupon_price}',
    '{$coupon_ratio}',
    '{$status}',
    '{$regdate}',
    '{$max_value}',
    '{$use_min_price}',
    '{$use_date_type}',
    '{$start_date}',
    '{$end_date}'
  )";

//echo $sql;
  $rs = $mysqli->query($sql);
  $mysqli->commit(); // 디비에 커밋한다.

  echo "<script>alert('등록했습니다.');location.href='/ccccoding/admin/coupon_list.php';</script>";
  exit;

} catch (Exception $e) {
  $mysqli->rollback(); // 저장한 테이블이 있다면 롤백한다.
  echo "<script>alert('등록하지 못했습니다. 관리자에게 문의해주십시오.');//history.back();</script>";
  exit;
}

?>