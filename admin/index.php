<?php
  $title = '대쉬보드';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';

  
//회원수 출력
  $sql = "SELECT
  (SELECT COUNT(*) FROM members WHERE status = 0) AS cnt1,
  (SELECT COUNT(*) FROM members WHERE status = 1) AS cnt2,
  (SELECT COUNT(*) FROM members WHERE status = 2) AS cnt3;
  ";
  $result = $mysqli->query($sql);
  $row = $result->fetch_object();
  //나는 members라는 테이블에서 status 컬럼에 담긴 내용들(3개)를 각각 cnt1.2.3이라는 별칭에 담아서 sql쿼리 만듦

  $arr = array();
  $arr[0] = $row->cnt1;
  $arr[1] = $row->cnt2;
  $arr[2] = $row->cnt3;
  //cnt 1,2,3의 수치를 각각 차트로 보여줄거라 배열로 만드는 과정

  $data = [];
  foreach($arr as $item){
    array_push($data, $item);
  }
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
                <p><em>총 강의</em><span>83건</span></p>
                <p><em>활성화 강의</em><span>60건</span></p>
                <p><em>비활성화 강의</em><span>23건</span></p>
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
            <a href="/ccccoding/admin/qna.php" class="fa-solid fa-circle-plus fa-small"></a>
          </div>
          <ul>
            <li class="list-stlye"><a href="#"><span>안돼서 짜증나요</span><span>2024.05.03</span></a></li>
            <li class="list-stlye"><a href="#"><span>공부는 어떻게 하나요</span><span>2024.04.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>리엑트 강의 있나요</span><span>2024.04.05</span></a></li>
            <li class="list-stlye"><a href="#"><span>고객센터가 전화 안받아요</span><span>2024.03.11</span></a></li>
            <li class="list-stlye"><a href="#"><span>알려주세요 제발!</span><span>2024.02.10</span></a></li>
          </ul>
        </div>
        <!-- 공지사항 -->
        <div class="notice-area box-shadow small-box main-m">
          <div class="chaption">
            <h3 class="txt-title">공지사항(최신순)</h3>
            <a href="/ccccoding/admin/notice_list.php" class="fa-solid fa-circle-plus fa-small"></a>
          </div>
          <ul>
            <li class="list-stlye"><a href="#"><span>ㅋㅋㅋ코딩 여름휴가</span><span>2024.07.06</span></a></li>
            <li class="list-stlye"><a href="#"><span>고객센터 공지</span><span>2024.05.30</span></a></li>
            <li class="list-stlye"><a href="#"><span>취업 연계 공지</span><span>2024.05.30</span></a></li>
            <li class="list-stlye"><a href="#"><span>면접비 지원 안내</span><span>2024.05.30</span></a></li>
            <li class="list-stlye"><a href="#"><span>환불,최소 안내</span><span>2024.05.30</span></a></li>
          </ul>
        </div>
        <!-- 이벤트 -->
        <div class="event-area box-shadow small-box main-m">
          <div class="chaption">
            <h3 class="txt-title">이벤트(최신순)</h3>
            <a href="/ccccoding/admin/event.php" class="fa-solid fa-circle-plus fa-small"></a>
          </div>
          <ul>
            <li class="list-stlye"><a href="#"><span>첫 만남 축하 이벤트</span><span>2024.10.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>이달의 룰렛!</span><span>2024.09.09</span></a></li>
            <li class="list-stlye"><a href="#"><span>매일 출석체크 이벤트</span><span>2024.08.25</span></a></li>
            <li class="list-stlye"><a href="#"><span>썸머 이벤트</span><span>2024.07.26</span></a></li>
            <li class="list-stlye"><a href="#"><span>수강률 TOP을 뽑아라</span><span>2024.05.29</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/ccccoding/admin/js/dashboard.js"></script>
  <!-- <script src="/ccccoding/admin/js/chart.js"></script> -->

  <script>
    document.addEventListener("DOMContentLoaded", function() {

/*
  =====================대쉬보드 
*/
const lineChart = $('#line-chart');
const barChart = $('#bar-chart');
const pieChart = $('#pie-chart');
const barChart2 = $('#bar-chart2');

// 이달의 매출
const sales2022 = {
  label: '2022년',
  data: [90, 86, 89, 93, 95,95,95,95,95,95,95,95,],
  borderWidth: 2
}
const sales2023 = {
  label: '2023년',
  data: [70, 76, 79, 73, 35,35,35,35,35,35,35,35,],
  borderWidth: 2
}
const sales2024 = {
  label: '2024년',
  data: [60, 66, 69, 63, 65,],
  borderWidth: 2
}
new Chart(barChart, {
  type: 'line',
  data: {
    labels: ['1월', '2월', '3월', '4월', '5월','6월','7월','8월','9월','10월','11월','12월'],
    datasets: [sales2022,sales2023,sales2024]
  },
  options: {
    cutout:'90%',
    maintainAspectRatio:false,
    plugins: {
      legend: {
          Position: 'bottom',
          display: true,
          labels: {
            
              color: '#222',
              font: {
                size: 16
            }
          }
      }
    }
  }
});


// 회원관리

const member1 = {
  label: '총회원수',
  data: [90, 86, 89, 93, 95, 85],
  borderWidth: 2
}
const member2 = {
  label: '신규 회원',
  data: [30, 19, 24, 50, 55, 25],
  borderWidth: 2
}
const member3 = {
  label: '탈퇴회원',
  data: [1, 1, 3, 3, 3, 4],
  borderWidth: 2
}

new Chart(lineChart, {
  type: 'line',
  data: {
    labels: ['1월', '2월', '3월', '4월', '5월', '6월'],
    datasets: [member1,member2,member3]
  },
  options: {
    scales: {
      y: {
        // beginAtZero: true
        stacked:false
      }
    },
    maintainAspectRatio:false
  }
});


//강의관리

const age20 = {
  label: '20대',
  data: [40, 50, 70, 20, 60, 65],
  borderWidth: 2
  // backgroundColor: 'rgba(255,0,0,0.5)'
}
const age30 = {
  label: '30대',
  data: [10, 10, 80, 10, 90, 95],
  borderWidth: 2
  // backgroundColor: 'rgba(255,255,0,0.5)'
}
const age40 = {
  label: '40-60대',
  data: [20, 20, 10, 30, 20, 15],
  borderWidth: 2
  // backgroundColor: 'rgba(0,0,255,0.5)'
}
new Chart(barChart2, {
  type: 'bar',
  data: {
    labels: ['html', 'css', 'javascript', 'php', 'rect','python'],
    datasets: [age20,age30,age40]
  },
  options: {
    cutout:'90%',
    maintainAspectRatio:false,
    plugins: {
      legend: {
          Position: 'bottom',
          display: true,
          labels: {
              color: '#222',
              font: {
                size: 16
            }
          }
      }
    }
  }
});

//수료관리
const pData = <?= json_encode($data) ?>;
const Completion = {
  label: '2024',
  data: [pData],
  borderWidth: 2,
}
new Chart(pieChart, {
  type: 'pie',
  data: {
    labels: ['수료완료', '진행중', '미수료'],
    datasets: [
      Completion
    ]
  },
  options: {
    maintainAspectRatio:false
    // backgroundColor: ['rgba(255,255,0,0.5)','rgba(0,0,255,0.5)','rgba(0,255,255,0.5)','rgba(255,0,0,0.5)']
  }
});

});

  </script>
</body>
</html>