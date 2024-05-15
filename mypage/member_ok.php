<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';

// 로그인 확인
if (!isset($_SESSION['UID'])) {
    header("Location: login.php");
    exit();
}

$userid = $_SESSION['UID'];

// 프로필 이미지 업로드 처리
$profile_image = null;
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
    $allowed_extensions = ['png', 'jpg', 'jpeg'];
    $max_file_size = 1048576; // 1MB
    
    $file_name = $_FILES['profile_image']['name'];
    $file_size = $_FILES['profile_image']['size'];
    $file_tmp = $_FILES['profile_image']['tmp_name'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($file_extension, $allowed_extensions) && $file_size <= $max_file_size) {
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/mypage/uploads/';
        $upload_file = $upload_dir . basename($file_name);
        if (move_uploaded_file($file_tmp, $upload_file)) {
            $profile_image = '/ccccoding/mypage/uploads/' . basename($file_name);
        } else {
            echo "프로필 이미지 업로드 중 오류가 발생했습니다.";
            exit();
        }
    } else {
        echo "허용되지 않는 파일 형식이거나 파일 크기가 1MB를 초과합니다.";
        exit();
    }
}

// 회원 정보 업데이트
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// 비밀번호 변경 처리
$password = null;
if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // 현재 비밀번호 확인
    $sql = "SELECT passwd FROM members WHERE userid = '{$userid}'";
    $result = $mysqli->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['passwd'];
        
        // SHA-512 해시 값과 비교
        $hashed_password = hash('sha512', $current_password);
        
        if ($stored_password === $hashed_password) {
            // 새 비밀번호와 비밀번호 확인이 일치하는지 확인
            if ($new_password === $confirm_password) {
                // 새 비밀번호를 SHA-512로 해시화하여 저장
                $hashed_password = hash('sha512', $new_password);
                $password = $hashed_password;
            } else {
                echo "새 비밀번호와 비밀번호 확인이 일치하지 않습니다.";
                exit();
            }
        } else {
            echo "현재 비밀번호가 일치하지 않습니다.";
            exit();
        }
    } else {
        echo "사용자 정보를 찾을 수 없습니다.";
        exit();
    }
}

// 프로필 이미지 경로 업데이트
$update_sql = "UPDATE members SET username = ?, email = ?, phone = ?";
$params = [$username, $email, $phone];

if ($profile_image !== null) {
    $update_sql .= ", profile_image = ?";
    $params[] = $profile_image;
}

if ($password !== null) {
    $update_sql .= ", passwd = ?";
    $params[] = $password;
}

$update_sql .= " WHERE userid = ?";
$params[] = $userid;

$update_stmt = $mysqli->prepare($update_sql);
$param_types = str_repeat('s', count($params));
$update_stmt->bind_param($param_types, ...$params);

if ($update_stmt->execute()) {
  $_SESSION['success_message'] = "수정이 성공했습니다";
  
  // 세션 변수 업데이트
  $_SESSION['USERNAME'] = $username;
  $_SESSION['EMAIL'] = $email;
  
  header("Location: member.php");
  exit();
} else {
  echo "회원 정보 업데이트 중 오류가 발생했습니다: " . $mysqli->error;
}

$update_stmt->close();
$mysqli->close();
?>