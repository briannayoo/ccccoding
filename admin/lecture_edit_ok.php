<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

  $pid = $_POST['pid'];

  $cate1 = $_POST['cate1'] ?? '';
  $cate2 = $_POST['cate2'] ?? '';
  $cate3 = $_POST['cate3'] ?? '';
  $cate = $cate1 . $cate2 . $cate3;

  $name  = $_POST['name'];
  $content  = rawurldecode($_POST['content']);
  // $thumbnail  = $_POST['thumbnail'];
  $price = $_POST['price'] ?? 0;
  $price_select = $_POST['price_select'] ?? 1;
  $sale_ratio = $_POST['sale_ratio'] ?? 0;
  $cnt = $_POST['cnt'] ?? 0;
  $textbook = $_POST['textbook'] ?? 0;

  $isgold = $_POST['isgold'] ?? 0;  
  $issilver = $_POST['issilver'] ?? 0;
  $iscopper = $_POST['iscopper'] ?? 0;
  $isrecom = $_POST['isrecom'] ?? 0;

  $locate = $_POST['locate'] ?? 0;
  $userid = $_SESSION['AUID'];
  $sale_start_date = $_POST['sale_start_date'];
  $sale_end_date = $_POST['sale_end_date'];

  $sale_start_date = str_replace(" ", "", $sale_start_date);

  // DateTime 객체를 생성하고, MySQL DATETIME 형식으로 포맷
  $startTime = new DateTime($sale_start_date);
  $startDateTime = $startTime->format('Y-m-d H:i:s');

  $sale_end_date = str_replace(" ", "", $sale_end_date);

  // DateTime 객체를 생성하고, MySQL DATETIME 형식으로 포맷
  $endTime = new DateTime($sale_end_date);
  $endDateTime = $endTime->format('Y-m-d H:i:s');

  $status = $_POST['status'] ?? 1;
  $delivery_fee = $_POST['delivery_fee'] ?? 0;
  $url = $_POST['url'] ?? '';
  $addedImg_id = rtrim($_POST['product_image'], ',');

  if(strlen($_FILES['thumbnail']['tmp_name']) > 0){
  //파일 사이즈 검사
  if ($_FILES['thumbnail']['size'] > 10240000) {
    echo "<script>
      alert('10MB 이하만 업로드해주세요');
      history.back();
    </script>";
    exit;
  }
  //이미지 여부 검사
  if (strpos($_FILES['thumbnail']['type'], 'image') === false) {
    echo "<script>
      alert('이미지만 업로드해주세요');
      history.back();
    </script>";
    exit;
  }
  //파일 업로드
  $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/upload/';
  $filename = $_FILES["thumbnail"]["name"]; //insta.jpg
  $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
  $newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
  $savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg

  if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $save_dir . $savefile)) {
    $thumbnail = "/ccccoding/admin/upload/" . $savefile;
  } else {
    echo "<script>
    alert('썸네일 등록에 실패했습니다. 관리자에게 문의해주세요');
    //history.back();
    </script>";
    exit;
  }
  
  $sql = "UPDATE products SET
    name ='{$name}',
    cate ='{$cate}',
    content ='{$content}',
    thumbnail ='{$thumbnail}',
    price ='{$price}',
    price_select ='{$price_select}',
    sale_ratio ='{$sale_ratio}',
    cnt ='{$cnt}',
    textbook ='{$textbook}',
    isgold ='{$isgold}',
    issilver ='{$issilver}',
    iscopper = '{$iscopper}',
    isrecom = '{$isrecom}',
    locate = '{$locate}',
    userid = '{$userid}',
    sale_start_date ='{$startDateTime}',
    sale_end_date ='{$endDateTime}',
    reg_date =now(),
    status ='{$status}',
    delivery_fee ='{$delivery_fee}',
    url ='{$url}'
    WHERE pid={$pid}
  ";
  } else {
    $sql = "UPDATE products SET
    name ='{$name}',
    cate ='{$cate}',
    content ='{$content}',
    price ='{$price}',
    price_select ='{$price_select}',
    sale_ratio ='{$sale_ratio}',
    cnt ='{$cnt}',
    textbook ='{$textbook}',
    isgold ='{$isgold}',
    issilver ='{$issilver}',
    iscopper = '{$iscopper}',
    isrecom = '{$isrecom}',
    locate = '{$locate}',
    userid = '{$userid}',
    sale_start_date ='{$startDateTime}',
    sale_end_date ='{$endDateTime}',
    reg_date =now(),
    status ='{$status}',
    delivery_fee ='{$delivery_fee}',
    url ='{$url}'
    WHERE pid={$pid}
  ";
  }

  // echo $sql;
  $result = $mysqli->query($sql);
  
  if($result) { //상품 등록 하면
    echo "<script>
    alert('수정 완료');
    location.href = '/ccccoding/admin/lecture_list.php';
    </script>";
  } else {
    echo "<script>
    alert('수정 실패');
    history.back();
    </script>";
}
