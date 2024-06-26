<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

  $cid = $_POST['cid'];

  $cid = $_POST['cid'];
  $coupon_name = $_POST['coupon_name'];
  $coupon_desc = $_POST['coupon_desc'];
  $use_min_price = $_POST['use_min_price'];
  $max_value = $_POST['max_value'];
  $coupon_type = $_POST['coupon_type'] ?? 1;
  $coupon_price = $_POST['coupon_price'] ?? 0;
  $coupon_ratio = $_POST['coupon_ratio'] ?? 0;
  $use_date_type = $_POST['use_date_type'] ?? 1;
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $coupon_image = $_FILES['coupon_image'] ?? '';

  $start_date = str_replace(" ", "", $start_date);
  $end_date = str_replace(" ", "", $end_date);

  $status = $_POST['status'] ?? 1;

 
  if(strlen($_FILES['coupon_image']['name']) > 0){

     //파일 사이즈 검사
    if($_FILES['coupon_image']['size'] > 10240000) {
      echo "<script>
        alert('10MB 이하만 업로드해주세요');
        history.back();
      </script>";
      exit;
    }
    //이미지 여부 검사
    if (strpos($_FILES['coupon_image']['type'], 'image') === false) {
      echo "<script>
        alert('이미지만 업로드해주세요');
        // history.back();
      </script>";
      exit;
    }
    //파일 업로드
    $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/upload/';
    $filename = $_FILES["coupon_image"]["name"]; //insta.jpg
    $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
    $newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
    $savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg

    if (move_uploaded_file($_FILES["coupon_image"]["tmp_name"], $save_dir . $savefile)) {
      $coupon_image = "/ccccoding/admin/c_upload/" . $savefile;
    } else {
      echo "<script>
      alert('썸네일 등록에 실패했습니다. 관리자에게 문의해주세요');
      //history.back();
      </script>";
      exit;
    }
    
    $sql = "UPDATE coupons SET
      coupon_name = '$coupon_name',
      coupon_desc = '$coupon_desc',
      use_min_price = $use_min_price,
      max_value = $max_value,
      coupon_type = $coupon_type,
      coupon_price = $coupon_price,
      coupon_ratio = $coupon_ratio,
      use_date_type = $use_date_type,
      start_date = '$start_date',
      end_date = '$end_date',
      status = $status,
      coupon_image ='{$coupon_image}'
      WHERE cid = $cid";
  }else{
    $sql = "UPDATE coupons SET
      coupon_name = '$coupon_name',
      coupon_desc = '$coupon_desc',
      use_min_price = $use_min_price,
      max_value = $max_value,
      coupon_type = $coupon_type,
      coupon_price = $coupon_price,
      coupon_ratio = $coupon_ratio,
      use_date_type = $use_date_type,
      start_date = '$start_date',
      end_date = '$end_date',
      status = $status
      WHERE cid = $cid";
  }
  

  $result = $mysqli->query($sql);

  if($result) { // 쿠폰정보 수정하면
    echo "<script>
    alert('수정 완료');
    location.href = '/ccccoding/admin/coupon_list.php';
    </script>";
  } else {
    echo "<script>
    alert('수정 실패');
    history.back();
    </script>";
}