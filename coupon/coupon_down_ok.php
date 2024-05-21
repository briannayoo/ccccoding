<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/coupon_func.php';

if (isset($_SESSION['AUID'])) {
    if (isset($_GET['cid']) && isset($_GET['name'])) {
        $cid = $_GET['cid'];
        $name = $_GET['name'];
        $userid = $_SESSION['UID'];

        // 회원가입 축하 쿠폰 발행
        if (issue_coupon($mysqli, $userid, $cid, $name)) {
            echo "<script>
                    alert('쿠폰이 발행되었습니다.');
                    location.href='/ccccoding/mypage/coupon.php';
                  </script>";
        } else {
            echo "<script>
                    alert('쿠폰 발행에 실패했습니다.');
                    location.href='/ccccoding/mypage/coupon.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('잘못된 접근입니다.');
                location.href='/ccccoding/mypage/coupon.php';
              </script>";
    }
} else {
    echo "<script>
            alert('로그인 후 발급받으실 수 있습니다.');
            location.href='/ccccoding/coupon/coupon_down.php';
          </script>";
}
?>