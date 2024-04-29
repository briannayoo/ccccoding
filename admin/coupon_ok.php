<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';

$coupon_name = $_POST['coupon_name'];
$coupon_name = $_POST['coupon_desc'];
$coupon_image = $_POST['coupon_image'] ?? NULL;
$coupon_type = $_POST['coupon_type'];
$coupon_price = $_POST['coupon_price'] ?? 0;
$coupon_ratio = $_POST['coupon_ratio'] ?? 0;
$status = $_POST['status'] ?? 0;
$regdate = date('Y-m-d H:i:s');
$userid = $_POST['userid'] ?? NULL;
$max_value = $_POST['max_value'] ?? NULL;
$use_min_price = $_POST['use_min_price'] ?? NULL;
$use_date_type = $_POST['use_date_type'] ?? NULL;
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

//파일 사이즈 검사
// if ($_FILES['coupon_image']['size'] > 10240000) {
//   echo "<script>
//     alert('10MB 이하만 업로드해주세요');
//     history.back();
//   </script>";
//   exit;
// }
//이미지 여부 검사
// if (strpos($_FILES['coupon_image']['type'], 'image') === false) {
//   echo "<script>
//     alert('이미지만 업로드해주세요');
//     history.back();
//   </script>";
//   exit;
// }
//파일 업로드
// $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/upload/';
// $fiename = $_FILES["coupon_image"]["name"]; //insta.jpg
// $ext = pathinfo($fiename, PATHINFO_EXTENSION); //jpg
// $newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
// $savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg

// if (move_uploaded_file($_FILES["coupon_image"]["tmp_name"], $save_dir . $savefile)) {
//   $coupon_image = "/ccccoding/admin/upload/" . $savefile;
// } else {
//   echo "<script>
//   alert('썸네일 등록에 실패했습니다. 관리자에게 문의해주세요');
//   history.back();
//   </script>";
//   exit;
// }

$sql = "INSERT INTO coupons (
  coupon_name, 
  coupon_desc,
  coupon_image, 
  coupon_type, 
  coupon_price, 
  coupon_ratio, 
  status, 
  regdate, 
  userid, 
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
  '{$_SESSION['AUID']}',
  '{$max_value}',
  '{$use_min_price}',
  '{$use_date_type}',
  '{$start_date}',
  '{$end_date}'
)";

  $result = $mysqli -> query($sql);
  if($result ){
      echo "<script>
      alert('쿠폰등록 완료');
      location.href = '/ccccoding/admin/coupon.php';
      </script>";
  } else{
      echo "<script>
      alert('쿠폰등록 실패');
      history.back();
      </script>";
  }