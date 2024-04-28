<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">강의 등록</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        <form action="#" class="form-list" enctype="multipart/form-data">
          <!-- 카테고리 -->
          <div class="row">
            <label for="slect-01" class="col-md-1 col-form-label tit-h4">카테고리</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="select-01" aria-label="selectf">
                    <option selected>대분류</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="select-02"  aria-label="selectf">
                    <option selected>중분류</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="select-03"  aria-label="selectf">
                    <option selected>소분류</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
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
                  <input type="text" class="form-control" id="fm-txt03" placeholder="강의명을 입력하세요">
                </div>
              </div>
            </div>
          </div>
  
          <!-- 판매금액 / 활동교재-->
          <div class="row">
            <label for="mix-01" class="col-md-1 col-form-label tit-h4">판매금액</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="mix-01" aria-label="select">
                    <option selected value="1">유료</option>
                    <option value="2">무료</option>
                    <option value="3">부분무료</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <input type="text" class="form-control" id="mix-02" placeholder="금액을 입력하세요">
                </div>
                <!-- 활동교재 -->
                <div class="col-md-4 ipt-wrap d-flex">
                    <label for="search" class="col-md-3 col-form-label tit-h4">활동교재</label>
                    <div class="input-group search">
                        <input class="form-control" type="search" id="search" placeholder="교재명을 입력하세요" aria-label="Search">
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
                <div class="col-md-4 ipt-wrap">
                  <input type="text" class="datepicker" placeholder="YYYY-MM-DD">
                </div>
                <div class="col-md-4 ipt-wrap">
                  <input type="text" class="datepicker" placeholder="YYYY-MM-DD">
                </div>
                <div class="col-md-4 ipt-wrap row">
  
                  <div class="list-group list-group-horizontal">
                    <h4 class="tit-h4">난이도</h4>
                    <div class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chk-list-04">
                        <label class="form-check-label" for="chk-list-04">
                          상
                        </label>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chk-list-05" checked>
                        <label class="form-check-label" for="chk-list-05">
                          중
                        </label>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chk-list-06">
                        <label class="form-check-label" for="chk-list-06">
                          하
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
  
          <!-- 강의내용 -->
          <div class="row">
            <label for="txtarea" class="col-md-1 col-form-label tit-h4">강의내용</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-12 ipt-wrap">
                  <textarea class="form-control" id="txtarea" placeholder="강의의 전반적인 내용을 상세히 기술하세요."></textarea>
                </div>
              </div>
            </div>
          </div>
  
          <!-- 강의첨부 -->
          <div class="row">
            <label for="file" class="col-md-1 col-form-label tit-h4">강의URL</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-12 ipt-wrap">
                  <input class="form-control" type="file" id="file"  placeholder="강의 URL을 직접입력하거나, 동영상을 첨부하세요">
                </div>
              </div>
            </div>
          </div>
  
          <!-- 썸내일 -->
          <div class="row">
            <label for="form01" class="col-md-1 col-form-label tit-h4">썸네일</label>
            <div class="col-md-11">
              <input type="file" multiple name="upfile[]" id="upfile" class="d-none">
              <div>
                <button type="button" class="btn btn-primary btn-sm thumb-text" id="addImage">파일 선택</button>
              </div>
              <div id="addedImages" class="d-flex gap-3">
              </div>
            </div>
          </div>
  
          <!-- 강의등록 -->
          <div class="btn-area">
            <button type="button" class="btn btn-primary btn-lg">버튼</button>
            <button type="button" class="btn btn-secondary btn-lg">버튼</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
</html>