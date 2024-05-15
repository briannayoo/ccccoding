<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';


$userid = $_POST['userid'];
$pid = $_POST['pid'];
$sql = "SELECT COUNT(sale_end_date) FROM products WHERE pid = {$pid}";
$end_date = $mysqli -> query($sql);

$grand_total = $_POST['grand_total'];
$ucid = $_POST['coupon']??'';

$sql = "INSERT INTO orders (userid,pid,total_price,regdate,end_date) VALUES ('{$userid}','{$pid}',{$grand_total},now(),'{$end_date}')";
$result = $mysqli -> query($sql);


if(isset($ucid) && $ucid !==''){
    $sql = "UPDATE user_coupons SET status = -1 WHERE ucid = $ucid";
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