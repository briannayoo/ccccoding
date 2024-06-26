<?php
  session_start();
  $title = '강의등록';

  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

  $sql = "SELECT * FROM category where step = 1";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate1[] = $row;
  };
  $sql = "SELECT * FROM category where step = 2";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate2[] = $row;
  };
  $sql = "SELECT * FROM category where step = 3";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate3[] = $row;
  };

?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">강의 등록</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        <form action="lecture_ok.php" method="POST" class="form-list" enctype="multipart/form-data" id="lecture_save">
        <input type="hidden" name="product_image" id="lecture_image_id">
        <input type="hidden" name="contents" id="contents">
          <!-- 카테고리 -->
          <div class="row">
            <label for="slect-01" class="col-md-1 col-form-label tit-h4">카테고리</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate1"  name="cate1" aria-label="대분류">
                    <option selected>대분류</option>
                  <?php
                    foreach ($cate1 as $c1) {
                  ?>
                    <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>
                  <?php
                    }
                  ?>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate2"  name="cate2" aria-label="중분류">
                  <option selected disabled>중분류</option>
                      <?php
                      foreach ($cate2 as $c2) {
                    ?>
                      <option value="<?= $c2->code; ?>"><?= $c2->name; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate3" name="cate3" aria-label="소분류">
                  <option selected disabled>소분류</option>
                      <?php
                      foreach ($cate3 as $c3) {
                    ?>
                      <option value="<?= $c3->code; ?>"><?= $c3->name; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
  
          <!-- 강의명 -->
          <div class="row">
            <label for="txt03" class="col-md-1 col-form-label tit-h4">강의명</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-12 ipt-wrap">
                  <input type="text" class="form-control" name="name" id="name" placeholder="강의명을 입력하세요">
                </div>
              </div>
            </div>
          </div>
  
          <!-- 판매금액 / 활동교재 (작성중 - 테이블 만들어서! ex 쿠폰 테이블)-->
          <div class="row">
            <label for="price" class="col-md-1 col-form-label tit-h4">판매금액</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" name="price_select" id="price_select" aria-label="판매금액">
                    <option selected value="1">유료</option>
                    <option value="2">무료</option>
                    <option value="3">부분무료</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <input type="text" class="form-control" name="price" id="price" placeholder="금액을 입력하세요">
                </div>
                <!-- 활동교재 -->
                <div class="col-md-4 ipt-wrap d-flex">
                    <label for="textbook" class="col-md-3 col-form-label tit-h4">활동교재</label>
                    <div class="input-group search">
                        <input class="form-control" type="search" name="textbook" id="textbook" placeholder="활동 교재를 검색하세요" aria-label="Search">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
  
          <!-- 수강신청 / 난이도 -->
          <div class="row">
            <label for="datepicker-01" class="col-md-1 col-form-label tit-h4">수강신청</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="date-wrap col-md-8">
                  <div class="col-md-5 ipt-wrap">
                    <div style="position: relative;" class="datepicker"><input type="text" name="sale_start_date" id="sale_start_date" class="ipt-datepicker" placeholder="YYYY-MM-DD"><div class="datepicker__wrapper" style="z-index: 9999; position: absolute; display: none;"></div></div>
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                  <div class="col-md-5 ipt-wrap">
                    <div style="position: relative;" class="datepicker"><input type="text" name="sale_end_date" id="sale_end_date" class="ipt-datepicker" placeholder="YYYY-MM-DD"><div class="datepicker__wrapper" style="z-index: 9999; position: absolute; display: none;"></div></div>
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                </div>
                <div class="col-md-4 ipt-wrap ml-2">
                  <div class="list-group list-group-horizontal">
                    <label class="tit-h4">난이도</label>
                    <div class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="isgold" id="isgold">
                        <label class="form-check-label" for="isgold">
                          상
                        </label>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="issilver" id="issilver" checked="">
                        <label class="form-check-label" for="issilver">
                          중
                        </label>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="iscopper" id="iscopper">
                        <label class="form-check-label" for="iscopper">
                          하
                        </label>
                        </div>
                      </div>
                    </div>
                  </div></div>
              </div>
            </div>

          <!-- 강의내용 -->
          <div class="row">
            <label for="txtarea" class="col-md-1 col-form-label tit-h4">강의내용</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-12 ipt-wrap">
                  <textarea class="form-control" name="content" id="txtarea" placeholder="강의의 전반적인 내용을 상세히 기술하세요."></textarea>
                </div>
              </div>
            </div>
          </div>
  
          <!-- 강의첨부 -->
          <div class="row">
            <label for="url" class="col-md-1 col-form-label tit-h4">강의URL</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-12 ipt-wrap file-input-container">
                  <input type="text" class="form-control file-input-text" name="url" id="url" placeholder="강의 URL을 직접입력하거나, 동영상을 첨부하세요">
                  <button type="button" class="btn btn-primary btn-sm" id="custom-button">파일추가</button>
                  <input type="file" id="file-upload">
                </div>
              </div>
            </div>
          </div>
          <!-- 썸내일 -->
          <div class="row tumbnail_wrap">
            <label for="thumbnail" class="col-md-1 col-form-label tit-h4">썸네일</label>
            <div class="col-md-11">
              <input type="file" multiple name="thumbnail" id="thumbnail" class="d-none" accept="image/*">
              <div>
                <button type="button" class="btn btn-primary btn-sm thumb-text" id="addImage">파일 선택</button>
                <p class="remove">*5M이하 / gif,png,jpg만 등록가능합니다.</p>
              </div>
              <div id="addedImages"></div>
              
            </div>
          </div>
          <!-- 강의등록 -->
          <div class="btn-area">
            <button class="btn btn-primary btn-lg" id="upfile_btn">등록</button>
            <button class="btn btn-secondary btn-lg">삭제</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- 데이터피커.js / common.js-->
  <!-- <script src="/ccccoding/admin/js/lecture.js"></script>  -->
</body>
</html>