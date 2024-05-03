<?php
  session_start();
  $title = '쿠폰상세';

  require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';

  $cid = isset($_GET['cid']) ? $_GET['cid'] : '';
  $sql = "SELECT * FROM coupons WHERE cid = {$cid}";
  $result = $mysqli -> query($sql);
  $rs = $result->fetch_object();
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">쿠폰상세</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> 
        <!-- form-list (s) -->
        <form action="" enctype="multipart/form-data" method="POST" class="form-list" onsubmit="return save()">
          <input type="hidden" name="cid" id="cid">
          <input type="hidden" name="coupon_image" id="coupon_image">
          <!-- input text 1/3 (s) -->
          <div class="row">
            <label for="coupon_name" class="col-md-1 col-form-label tit-h4">쿠폰명</label>
            <div class="col-md-11">
              <?=$rs -> coupon_name?>
            </div>
          </div>
          <!-- input text 1/3 (e) -->

          <!-- input text 1 (s) -->
          <div class="row">
            <label for="coupon_desc" class="col-md-1 col-form-label tit-h4">쿠폰설명</label>
            <div class="col-md-11">
              <?=$rs -> coupon_desc?>
            </div>
          </div>
          <!-- input text 1 (e) -->

          <!-- input text 단위 1/3 (s) -->
          <div class="row">
            <label for="use_min_price" class="col-md-1 col-form-label tit-h4">최소사용금액</label>
            <div class="col-md-11">
              <?=$rs -> use_min_price?>
            </div>
          </div>
          <!-- input text 단위 1/3 (e) -->

          <!-- input text 단위 1/3 (s) -->
          <div class="row">
            <label for="max_value" class="col-md-1 col-form-label tit-h4">최대할인금액</label>
            <div class="col-md-11">
              <?=$rs -> max_value?>
            </div>
          </div>
          <!-- input text 단위 1/3 (e) -->

          <!-- select + input text 혼합(s) -->

          <div class="row">
            <label for="coupon_type" class="col-md-1 col-form-label tit-h4">할인종류</label>
            <div class="col-md-11">
                <?php
                if ($rs->coupon_type == '1') {
                    echo $rs->coupon_price . '원 할인';
                } elseif ($rs->coupon_type == '2') {
                    echo $rs->coupon_ratio . '% 할인';
                }
                ?>
            </div>
          </div>
          <!-- select + input text 혼합(e) -->

          <!-- 기간설정 시 (s) -->
          <div class="row">
            <label for="use_date_type" class="col-md-1 col-form-label tit-h4">사용기한</label>
            <div class="col-md-11">
              <?=$rs -> start_date?> ~  <?=$rs -> end_date?>
            </div>
          </div>
          <!-- 기간설정 시 (e) -->

          <div class="row">
            <label for="status" class="col-md-1 col-form-label tit-h4">상태</label>
            <div class="col-md-11">
              <?php 
                if($rs->status == 1){echo '활성화';}
                if($rs->status == 2){echo '비활성화';}
              ?>
            </div>
          </div>



          <!-- thumbnail image (s) -->
          <div class="row tumbnail_wrap">
            <label for="thumbnail" class="col-md-1 col-form-label tit-h4">썸네일</label>
            <div class="col-md-11">
              <img src="<?=$rs -> coupon_image?>" alt="">
              
            </div>
          </div>
          <!-- thumbnail image (e) -->

          <!-- 하단버튼 (s) -->
          <div class="btn-area">
            <a href="coupon_list.php" class="btn btn-primary btn-lg">확인</a>
          </div>
          <!-- 하단버튼(e) -->
        </form>
        <!-- form-list (e) -->
      </div>
  </div>
  <!-- wwilsman 데이트픽커 js -->
  
  <script src="/ccccoding/admin/js/coupon.js"></script>
  <!-- <script>
    function save() {
        if (!$('#coupon_image').val()) {
            alert('썸네일을 등록하십시오.');
            return false;
        }
    }
  </script> -->
</body>
</html>