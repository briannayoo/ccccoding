<?php
  session_start();
  $title = '이벤트등록';

  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

  $eid = isset($_GET['eid']) ? $_GET['eid'] : '';
  $sql = "SELECT * FROM event WHERE eid = {$eid}";
  $result = $mysqli -> query($sql);
  $es = $result->fetch_object();

?>

<!-- sub-page-tit-area (s) -->
<div class="page-tit-area">
  <h2 class="tit-h2">이벤트관리</h2>
</div>
<!-- sub-page-tit-area (e) -->

<div class="content">
  <form action="#" class="form-list">
    <!-- 제목 -->
    <div class="row">
      <label for="e_name" class="col-md-1 col-form-label tit-h4">이벤트 제목</label>
      <div class="col-md-11">
        <div class="input-group">
          <?=$es -> e_name?>
        </div>
      </div>
    </div>
    <!--데이트피커  -->
    <div class="row">
      <label for="datepicker-01" class="col-md-1 col-form-label tit-h4">이벤트 기한</label>
      <div class="col-md-11">
        <?=$es -> start_date?> ~ <?=$es -> end_date?>
      </div>
      <!-- <div class="col-md-11">
        <div class="input-group">
          <div class="date-wrap">
            <div class="col-md-6 ipt-wrap">
              <input type="text" class="ipt-datepicker form-control" placeholder="YYYY-MM-DD">
              <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
            </div>
            <div class="col-md-6 ipt-wrap">
              <input type="text" class="ipt-datepicker form-control" placeholder="YYYY-MM-DD">
              <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
            </div>
          </div>
        </div>
      </div> -->
    </div>
    <form action="event.php" enctype="multipart/form-data" method="POST" onsubmit="return save()">
      <input type="hidden" name="eid" id="eid">
      <input type="hidden" name="e_img" id="e_img">
      <!-- 썸네일 -->
      <div class="row tumbnail_wrap">
        <label for="event_thumbnail" class="col-md-1 col-form-label tit-h4">썸네일</label>
        <div class="col-md-11">
          <img src="<?=$es -> e_img?>" alt="">
          <!-- <input type="file" multiple name="e_img" id="event_thumbnail" class="d-none" accept="image/*">
                  <div>
                    <button type="button" class="btn btn-primary btn-sm thumb-text" id="addImage">파일 선택</button>
                    <p class="remove">*5M이하 / gif,png,jpg만 등록가능합니다.</p>
                  </div>
                  <div id="addedImages" class="d-flex gap-3">
                  </div> -->
        </div>
      </div>
    </form>
    <!-- 첨부파일 -->
    <div class="row mt-3">
      <label for="file" class="col-md-1 col-form-label tit-h4">파일첨부</label>
      <div class="col-md-11">
        <div class="input-group">
          <div class="col-md-12 ipt-wrap">
            <input class="form-control" type="file" id="file">
          </div>
        </div>
      </div>
    </div>
    <!-- 버튼 -->
    <div class="btn-area">
      <button type="button" class="btn btn-primary btn-lg">등록</button>
      <button type="button" class="btn btn-secondary btn-lg del_check">취소</button>
    </div>
  </form>
</div>
</div>
<!-- wwilsman 데이트픽커 js -->
<script src="/ccccoding/admin/js/datepicker.js"></script>
<script src="/ccccoding/admin/js/event.js"></script>
</body>

</html>