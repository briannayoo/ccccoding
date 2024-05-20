<?php
  $title = 'ccccoding';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

  $sql = "SELECT * FROM products where 1=1";
  $result = $mysqli->query($sql);

  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }
  
?>
    <main>
      <!-- 풀배너,섹션2~4 우예지(s) -->
      <div class="section" id="banner">
        <div class="slidewrapper">
          <ul class="slidecontainer animated">
            <li class="slide">
              <a href="#"><img src="./image/img_banner01.png" alt="배너1"></a>
            </li>
            <li class="slide">
              <a href="#"><img src="./image/img_banner02.png" alt="배너2"></a>
            </li>
            <li class="slide">
              <a href="#"><img src="./image/img_banner03.png" alt="배너3"></a>
            </li>
            <li class="slide">
              <a href="#"><img src="./image/img_banner04.png" alt="배너4"></a>
            </li>
          </ul>
          <p class="pager">
          </p>
        </div>
      </div>

      <div class="section">
        <div class="container">
          <div class="main-tit-area">
            <h2 class="tit-h1">분야별 강의</h2>
          </div>

          <div class="lecture-list">
            <ul class="d-flex justify-content-center">
              <li><a href="/ccccoding/lecture/lecture.php?cate=A0002"><img src="./image/ico_design.png" alt=""><span>디자인</span></a></li>
              <li><a href="#"><img src="./image/ico_programming.png" alt=""><span>프로그래밍 언어</span></a></li>
              <li><a href="/ccccoding/lecture/lecture.php?cate=A0005"><img src="./image/ico_git.png" alt=""><span>컴퓨터 사이언스</span></a></li>
              <li><a href="/ccccoding/lecture/lecture.php?cate=A0003"><img src="./image/ico_web.png" alt=""><span>웹개발</span></a></li>
              <li><a href="/ccccoding/lecture/lecture.php?cate=A0004"><img src="./image/ico_data.png" alt=""><span>데이터 사이언스</span></a></li>
              <li><a href="/ccccoding/lecture/lecture.php?cate=A0006"><img src="./image/ico_book.png" alt=""><span>프로그래밍 언어</span></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="container">
          <div class="main-tit-area">
            <span class="tag">new</span>
            <h2 class="tit-h1">신규 런칭 강의</h2>
          </div>

          <div class="new-lecture">
            <ul class="new-lecture-item">
            <?php
              $sql = "SELECT * FROM products ORDER BY reg_date DESC LIMIT 0,8";
              $result = $mysqli->query($sql);
              $rsArr = [];
              while ($rs = $result->fetch_object()) {
                $rsArr[] = $rs;
              }
              if (isset($rsArr)) {  
                foreach ($rsArr as $item) {
              ?>
              <li><a href="/ccccoding/lecture/lecture_detail.php?pid=<?= $item->pid; ?>">
                <img src="<?=$item->thumbnail;?>" alt="">
                <h3 class="tit-h4 text-over"><?=$item->name;?></h3>
                <p><?=$item->content;?></p>
              </a></li>
            <?php
              }}
            ?>
            </ul>
          </div>
          <div class="btn-area">
            <button type="button" class="btn btn-outline-secondary btn-md pm-line more-btn">더보기</button>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="container">
          <div class="main-tit-area">
            <span class="tag">new</span>
            <h2 class="tit-h1">인기강의 BEST</h2>
            <p class="desc">ㅋㅋㅋ 코딩의 인기 강의를 만나보세요</p>
          </div>

          <div class="best-lecture">
            <ul class="best-lecture-item">

            </ul>
          </div>
          <div class="btn-area">
            <button type="button" class="btn btn-outline-secondary btn-md pm-line more-btn-best">더보기</button>
          </div>
        </div>
      </div>
      <!-- 풀배너,섹션2~4 우예지(e) -->

      <!-- 섹션5~6 유부현(s) -->
      <div class="section">
        <div class="container">
          <div class="main-tit-area">
            <span class="tag">EVENT</span>
            <h2 class="tit-h1">프로모션 &amp; 이벤트</h2>
          </div>

          <div class="event-section" id="event-banner">
            <a href=""><img src="image/event_section1.png" alt=""></a>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="container">
          <div class="main-tit-area">
            <span class="tag">MEDIA</span>
            <h2 class="tit-h1">코딩입문을 위한 컨텐츠</h2>
          </div>
          
          <div class="main-content">
            <div class="d-flex justify-content-between">
              <div>
                <img src="image/main_section_content1.png" alt="컨텐츠 이미지">
              </div>
              <div>
                <img src="image/main_section_content2.png" alt="컨텐츠 이미지">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- 섹션5~6 유부현(e) -->
    </main>
    <div class="info-modal">
    <div class="modal_wrapper">
    <img src="/ccccoding/admin/image/logo.png" alt="포트폴리오페이지안내" class="login_logo">
      <h2>LMS 유저 페이지 제작 프로젝트</h2>
      <br>
      <p>본 사이트는 <em>구직용 포트폴리오 웹사이트</em>이며, <br> 실제로 운영되는 사이트가 아닙니다.</p>
      <hr>
      <p><em>시크릿 쥬쥬:</em> 유*현(팀장),박*현, 우*지</p>
      <p><em>제작기간:</em> 2024.05.04 ~ 2024.05.22</p>
      <p><em>기획서:</em> <a href="https://www.figma.com/design/yIwo11tJX1epVXVyCZwkfm/%EC%8B%9C%ED%81%AC%EB%A6%BF-%EC%A5%AC%EC%A5%AC-2?node-id=7%3A4974&t=nKSynrLmUluX4UL1-1" title="기획서바로가기" target="_blank">figma</a> <em>버전관리:</em> <a href="https://github.com/briannayoo/ccccoding.git" title="ccccoding 깃허브 바로가기" target="_blank">Github</a></p>
      <p><em>개발환경:</em> HTML5, CSS3, Jquery,bootstrap,php,mysql</p>
      <hr>
      <span><em>업무분장</em></span>
      <p><em>기획:</em> 팀원 전체</p>
      <p><em>디자인:</em> 구현 담당자</p>
      <p>	&#45; 구현 완료 페이지	&#45; </p>
      <p class="color"><em>유*현: 메인(이벤트, 미디어) &#44; <a href="/ccccoding/community/qna.php">QnA</a>&#44; <a href="/ccccoding/event/event.php">이벤트</a>&#44; 이벤트 상세 &#44; <a href="/ccccoding/community/notice.php">공지사항</a></em></p>
      <p class="color"><em>박*현: 헤더, 푸터&#44; <a href="/ccccoding/coupon_down.php">쿠폰</a>&#44; <a href="/ccccoding/mypage/mypage.php">마이페이지(전체)</a>&#44; <a href="/ccccoding/guide/guide.html">공통 가이드</a></em></p>
      <p class="color"><em>우*지: 메인(풀베너, 분야별강의, 신규강의,인기강의)&#44; <br> <a href="/ccccoding/member/login.php">로그인</a> &#44; <a href="/ccccoding/member/signup.php">회원가입</a> &#44; <a href="/ccccoding/lecture/lecture.php">카테고리(전체)</a> &#44; 강의상세 &#44; <a href="/ccccoding/pdata/cart.php">수강바구니</a> &#44; 결제</em></p>
    </div>
    <p class="modal_input">
      <input type="checkbox" id="checkbox" name="checkbox">
      <label for="checkbox">오늘하루 열지 않음</label> 
      <a href="#" class="modal_close">close</a>
    </p>
  </div>
  <script src="/ccccoding/admin/js/cookie.js"></script>
  <script>
    let offset = 8;

    $('.more-btn').click(function() {
      $.ajax({
        url: 'readmore.php',
        type: 'POST',
        data: { offset: offset },
        dataType: 'json',
        success: function(response) {
          console.log(response);
        if (response.length > 0) {
            response.forEach(item => {
              const newItem = `
                <li>
                  <a href="/ccccoding/lecture/lecture_detail.php?pid=${item.pid}">
                    <img src="${item.thumbnail}" alt="">
                    <h3 class="tit-h4 text-over">${item.name}</h3>
                    <p>${item.content}</p>
                  </a>
                </li>`;
              $('.new-lecture-item').append(newItem);
            });
            offset += 8;
          } else {
            alert('더 이상 항목이 없습니다.');
            $('.more-btn').hide();
          }
        },
        error: function(xhr, status, error) {
          console.error('Status:', status);
          console.error('Error:', error);
          console.error('Response:', xhr.responseText);
          alert('데이터를 불러오는 중 오류가 발생했습니다. 콘솔에서 자세한 내용을 확인하세요.');
        }
      });
    });

    let bestOffset = 8; // 처음 8개는 이미 로드됨
            const limit = 8; // 한 번에 추가로 로드할 이미지 수
            let allData = [];

            function loadMoreData() {
                $.getJSON('data.json', function(data) {
                    allData = data;
                    appendItems();
                }).fail(function() {
                    alert("JSON 데이터를 불러오는 중 오류가 발생했습니다.");
                });
            }

            function appendItems() {
                const items = allData.slice(bestOffset - 8, bestOffset - 8 + limit);
                items.forEach(item => {
                    const newItem = `<li><a href="#"><img src="${item.thumbnail}" alt=""></a></li>`;
                    $('.best-lecture-item').append(newItem);
                });
                bestOffset += limit;
                if (bestOffset - 8 >= allData.length) {
                    $('.more-btn-best').hide();
                }
            }

            $('.best-lecture-item a').click(function(e) {
                e.preventDefault();
            });

            $('.more-btn-best').click(function() {
                appendItems();
            });

            loadMoreData();
  </script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>
  