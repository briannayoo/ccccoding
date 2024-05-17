<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';


// $userid = $_POST['userid'];
$pid = $_POST['pid'];
// $sql = "SELECT COUNT(sale_end_date) FROM products WHERE pid = {$pid}";
// $end_date = $mysqli -> query($sql);

$total_price = $_POST['total_price'];
$ucid = $_POST['coupon']??'';

$sql = "INSERT INTO payments (orders_date,pid,total_price) VALUES (now(),'{$pid}',{$total_price}";
$result = $mysqli -> query($sql);

//결과가 참이라고 한다면 쿠폰사용 업데이트 (staus = 0)

if(isset($ucid) && $ucid !==''){
    $sql = "UPDATE user_coupons SET status = 0 WHERE ucid = $ucid";
    $mysqli -> query($sql);
}
//카트비우기
$delsql = "DELETE FROM cart WHERE userid = '{$userid}'";
$delresult = $mysqli -> query($delsql);

if($result){
    echo "<script>
        alert('결제가 완료되었습니다.');
        location.href = '/ccccoding/index.php';
    </script>";
}