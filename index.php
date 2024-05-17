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
              $sql = "SELECT * FROM products where 1=1 ORDER BY reg_date DESC LIMIT 0, 8";
              $result = $mysqli->query($sql);
            
              while ($rs = $result->fetch_object()) {
                $rsArr[] = $rs;
              }
              if (isset($rsArr)) {  
                foreach ($rsArr as $item) {
              ?>
              <li><a href="/ccccoding/lecture/lecture_detail.php?pid=<?= $item->pid; ?>">
                <img src="<?=$item->thumbnail;?>" alt="">
                <h3 class="tit-h4"><?=$item->name;?></h3>
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
              <li><a href="#">
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
                <img src="./image/img_best10.png" alt="">
              </a></li>
            </ul>
          </div>
          <div class="btn-area">
            <button type="button" class="btn btn-outline-secondary btn-md pm-line">더보기</button>
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
    $('.more-btn').click(function(){

      let li =  $(this).closest('li');
      let data = {
        li : li
      }
        $.ajax({
        url: "readmore.php",
        async:false,
        type: 'POST',
        data: data,
        cache: false,
        success: function(html){
        $(".new-lecture-item").append(html);
        }
      });
    });
  </script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>
  