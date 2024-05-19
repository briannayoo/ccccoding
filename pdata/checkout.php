<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';


$userid = $_SESSION['UID'];
$pid = $_POST['pid'];
// $pid = $_POST['pid'];
$pidStr = implode(',',$pid);
$total_price = $_POST['total_price'];
$pname = $_POST['name'] ?? '';
$thumbnail = $_POST['thumbnail'] ?? '';
$ucid = $_POST['coupon']??'';


    $sql = "INSERT INTO payments (orders_date,pid,total_price,pname,thumbnail) VALUES (now(),'{$pidStr}',{$total_price},'{$pname}','{$thumbnail}')";
    echo $sql;
    $result = $mysqli -> query($sql);

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