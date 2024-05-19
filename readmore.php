<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';

// 연결 확인
if ($mysqli->connect_error) {
  die(json_encode(['error' => 'Database connection failed: ' . $mysqli->connect_error]));
}

$offset = intval($_POST['offset']);
$limit = 8;

$sql = "SELECT * FROM products ORDER BY reg_date DESC LIMIT ?, ?";
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
  die(json_encode(['error' => 'Prepare failed: ' . $mysqli->error]));
}

$stmt->bind_param("ii", $offset, $limit); // 두 개의 정수를 바인딩합니다

if ($stmt->execute()) {
  $result = $stmt->get_result();
  $items = [];
  while ($row = $result->fetch_object()) {
      $items[] = $row;
  }
  echo json_encode($items);
} else {
  echo json_encode(['error' => 'Query failed: ' . $stmt->error]);
}

$stmt->close();
$mysqli->close();