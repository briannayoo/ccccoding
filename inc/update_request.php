<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['order_id'];
    $requestType = $_POST['request_type'];

    $column = $requestType === 'cancel' ? 'cancel_request' : 'refund_request';

    $sql = "UPDATE payments SET $column = '신청' WHERE oid = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
    die("Error: " . $mysqli->error);
    }

    $stmt->bind_param('s', $orderId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
    echo 'success';
    } else {
    echo 'error';
    }

    $stmt->close();
}
?>