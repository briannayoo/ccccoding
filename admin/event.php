<?php
session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

  $keyword = $_GET['e_keyword'] ?? '';
  $eventSql = "SELECT * FROM event WHERE 1=1 and (e_name like '%$keyword%' or e_title like '%$keyword%')";
  $eventResult = mysqli_query($mysqli, $eventSql);
  
  while ($row = mysqli_fetch_object($eventResult)) {
    $eventArr[] = $row;
  }  

?>

<div class="page-tit-area">
        <h2 class="tit-h2">이벤트관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> <!--temp-area 빼야됨-->
        <!-- 이벤트검색 -->
      <form action="" class="form-list">
        <div class="row">
          <label for="search" class="col-md-1 col-form-label tit-h4">이벤트명</label>
          <div class="col-md-11">
            <div class="input-group search">
              <div class="col-md-6 ipt-wrap">
                <input class="form-control" type="search" id="search" name="e_keyword" placeholder="이벤트명을 입력하세요..." aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- 이벤트 기한 -->
        <div class="row">
          <label for="mix-01" class="col-md-1 col-form-label tit-h4">이벤트 기한</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-4 ipt-wrap">
                <select class="form-select form-select-sm" id="mix-01" aria-label="select">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="date-wrap col-md-8">
                <div class="col-md-6 ipt-wrap">
                  <input type="text" class="ipt-datepicker form-control" id="datepicker-01" name="datepicker-01" placeholder="YYYY-MM-DD">
                  <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                </div>
                <div class="col-md-6 ipt-wrap">
                  <input type="text" class="ipt-datepicker form-control" id="datepicker-02" name="datepicker-02" placeholder="YYYY-MM-DD">
                  <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- 이벤트 상태 -->
        <div class="row">
          <label for="mix-01" class="col-md-1 col-form-label tit-h4">상태</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-4 ipt-wrap">
                <select class="form-select form-select-sm" id="mix-01" aria-label="select">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- 총건수 -->
      <div class="total">
        <span>총 <em>8</em>건</span>
        <span class="point">활성화 <em>8</em>건</span>
        <span>비활성화 <em>8</em>건</span>
      </div>

      <!-- 이벤트 리스트 -->
      <?php
      if(isset($eventArr)){
        foreach($eventArr as $ea){
          ?>
            <ul class="list-group  box-list list-3 event">
              <li class="list-group-item flex-column">
                <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
                  <img src="image/event1.jpg" alt="이미지">
                </a>
                <div class="info-area">
                  <div class="tit-event">
                    <strong class="tit-h3"><?= $ea -> e_title;?></strong>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="toggle1">
                      <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                    </div>
                  </div>
                  <div class="txt-group">
                    <p class="date">이벤트기한 YYYY-MM-DD - YYYY-MM-DD</p>
                  </div>
                  <div class="edit-btn-group">
                    <button type="button" class="btn correc">
                      <span class="visually-hidden">수정</span>
                      <i class="fa-solid fa-pen-to-square fa-small"></i>
                    </button>
                    <button type="button" class="btn del">
                      <span class="visually-hidden">삭제</span>
                      <i class="fa-solid fa-trash-can fa-small"></i>
                    </button>
                  </div>
                </div>
              </li>
            </ul>    
      <?php
        }
      }
      ?>
      </nav>
    </div>
  </div>
  <script src="/ccccoding/admin/js/datepicker.js"></script>
  <script src="/ccccoding/admin/js/event.js"></script>
</body>
</html>