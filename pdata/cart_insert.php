<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';

$pid = $_POST['pid'];
$userid = $_POST['userid'];

// if(isset($_SESSION['UID'])){
//     $userid = $_SESSION['UID'];
//     $ssid = '';
// } else {
//     $ssid = session_id();
//     $userid = '';
// }

//pid 장바구니 중복체크
$sql = "SELECT COUNT(*) AS cnt FROM cart WHERE pid = '{$pid}' AND userid = '{$userid}'";
$result = $mysqli -> query($sql);
$row = $result -> fetch_object(); // $row->cnt


if($result){    
    if($row->cnt > 0){
        $data = array('result' => '중복');
        echo json_encode($data);
    }else {
        $cartsql = "INSERT INTO cart (pid,userid,regdate) VALUES ({$pid},'{$userid}',now())";

        $cartresult = $mysqli -> query($cartsql);
        if($cartresult){
            $data = array('result' => 'ok');
            
        } else{
            $data = array('result' => 'fail');
        }
        echo json_encode($data);
    }
}       
?>