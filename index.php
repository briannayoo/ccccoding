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
              <!-- <li><a href="#">
                <img src="./image/img_best01.png" alt="">
              </a></li>
              <li><a href="#">
                <img src="./image/img_best02.png" alt="">
              </a></li>
              <li><a href="#">
                <img src="./image/img_best03.png" alt="">
              </a></li>
              <li><a href="#">
                <img src="./image/img_best04.png" alt="">
              </a></li>
              <li><a href="#">
                <img src="./image/img_best05.png" alt="">
              </a></li>
              <li><a href="#">
                <img src="./image/img_best06.png" alt="">
              </a></li>
              <li><a href="#">
                <img src="./image/img_best07.png" alt="">
              </a></li>
              <li><a href="#">
                <img src="./image/img_best08.png" alt="">
              </a></li> -->
            </ul>
          </div>
          <div class="btn-area">
            <button type="button" class="btn btn-outline-secondary btn-md pm-line more-btn-best">더보기</button>
          </div>
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
  