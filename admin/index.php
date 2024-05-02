<?php
  $title = '대쉬보드';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">대시보드</h2>
      </div>
      <!-- sub-page-tit-area (e) -->
      <div class="content dashboard">
        <!-- 이달의 매출 -->
        <div class="sales-area box-shadow big-box main-m">
          <h3 class="txt-title">매출관리</h3>
          <div class="chart">
            <canvas id="bar-chart"></canvas>
          </div>
        </div>
        <!-- 회원관리 -->
        <div class="member-area box-shadow big-box main-m">
          <h3 class="txt-title">회원관리</h3>
          <div class="chart">
            <canvas id="line-chart"></canvas>
          </div>
        </div>
        <!-- 강의/수료 -->
        <div class="lecture-area box-shadow big-box main-m">
          <ul class="nav nav-tabs guide d-flex" id="myTab" role="tablist">
            <li class="nav-item txt-title" role="presentation">
              <button class="nav-link" id="rules-tab" data-bs-toggle="tab" data-bs-target="#rules-tab-pane" type="button" role="tab" aria-controls="rules-tab-pane" aria-selected="true">강의관리</button>
            </li>
            <li class="nav-item txt-title" role="presentation">
              <button class="nav-link active" id="guide-tab" data-bs-toggle="tab" data-bs-target="#guide-tab-pane" type="button" role="tab" aria-controls="guide-tab-pane" aria-selected="false">수강관리</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade d-flex justify-content-between align-items-center" id="rules-tab-pane" role="tabpanel" aria-labelledby="rules-tab" tabindex="0">
              <div class="lecture-condition">
                <p><em>총 강의</em><span>N건</span></p>
                <p><em>활성화 강의</em><span>N건</span></p>
                <p><em>비활성화 강의</em><span>N건</span></p>
              </div>
              <div class="chart-2 lecture-box d-flex justify-content-between">
                <canvas id="bar-chart2"></canvas>
              </div>
            </div>
            <div class="tab-pane fade show active chart-3 Completion-box " id="guide-tab-pane" role="tabpanel" aria-labelledby="guide-tab" tabindex="0">
                <canvas id="pie-chart"></canvas>
            </div>
          </div>
        </div>
        <!-- 인기강의 best -->
        <div class="best3-area box-shadow big-box main-m">
          <div class="chaption">
            <h3 class="txt-title">인기강의 best3</h3>
            <a href="#" class="fa-solid fa-circle-plus fa-small"></a>
          </div>
          <ul>
            <li><img src="image/img_gold.png" alt=""><em>EZWEB Jquery 기초</em><span>1.5만</span><i class="fa-solid fa-heart fa-xsmall txt-m tender-color"> 4.35</i></li>
            <li><img src="image/img_silver.png" alt=""><em>Rock’s html 정복기</em><span>1.5만</span><i class="fa-solid fa-heart fa-xsmall txt-m tender-color"> 4.35</i></li>
            <li><img src="image/img_copper.png" alt=""><em>김동주 강사의 쉽게하는 코딩기초</em><span>1.5만</span><i class="fa-solid fa-heart fa-xsmall txt-m tender-color"> 4.35</i></li>
          </ul>
        </div>
        <!-- qna -->
        <div class="qna-area box-shadow small-box main-m">
          <div class="chaption">
            <h3 class="txt-title">q&a(최신순)</h3>
            <a href="#" class="fa-solid fa-circle-plus fa-small"></a>
          </div>
          <ul>
            <li class="list-stlye"><a href="#"><span>질문입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>질문입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>질문입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>질문입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>질문입니다.</span><span>2024.04.26</span></a></li>
          </ul>
        </div>
        <!-- 공지사항 -->
        <div class="notice-area box-shadow small-box main-m">
          <div class="chaption">
            <h3 class="txt-title">공지사항(최신순)</h3>
            <a href="#" class="fa-solid fa-circle-plus fa-small"></a>
          </div>
          <ul>
            <li class="list-stlye"><a href="#"><span>공지사항 입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>공지사항 입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>공지사항 입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>공지사항 입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>공지사항 입니다.</span><span>2024.04.26</span></a></li>
          </ul>
        </div>
        <!-- 이벤트 -->
        <div class="event-area box-shadow small-box main-m">
          <div class="chaption">
            <h3 class="txt-title">이벤트(최신순)</h3>
            <a href="#" class="fa-solid fa-circle-plus fa-small"></a>
          </div>
          <ul>
            <li class="list-stlye"><a href="#"><span>이벤트 입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>이벤트 입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>이벤트 입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>이벤트 입니다.</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>이벤트 입니다.</span><span>2024.04.26</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- chart.js -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/ccccoding/admin/js/dashboard.js"></script>
  <script src="/ccccoding/admin/js/chart.js"></script>
</body>
</html>