<?php
  $title = 'ccccoding';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

  $pid=$_GET['pid'];
  $sql = "SELECT * FROM products where pid={$pid}";
  $result = $mysqli->query($sql);
  $item = $result->fetch_object();

  $cateStr = $item-> cate;
  $cateArr = str_split($cateStr, 5);

?>
  <!-- 우예지 (s) -->
  <main>

      <div class="lecture-detail">
        <div class="container d-flex lecture-top">
          <div>
            <img src="<?=$item->thumbnail;?>" alt="">
            <a href="# " class="btn btn-primary btn-md">1분 미리보기</a>
          </div>
          <div>
            <div class="d-flex gap-2 page-nav">
              <span class="flag-state-incomplete">new</span>
              <?php
              $i = 1;
              $count = count($cateArr);
              $step1Name = '';
              foreach($cateArr as $cate){
                $sql ="SELECT name FROM category where code='{$cate}'";
                $result = $mysqli -> query($sql);
                $row = $result -> fetch_object();
                if($i == 1){
                  $step1Name = $row->name;
                }
              ?>
              <p class="txt-sm text-c6"><span><?=$row->name?></span>
              <?php
              if($i < $count){
              ?>
              <i class="fa-solid fa-angle-right fa-small"></i>
              <?php
              }
              ?>
            </p>
              <?php
              $i++;
            }

              ?>
            </div>
            <h2 class="tit-h2"><?= $item->name;?></h2>
            <p><i class="fa-solid fa-eye fa-small"></i><?= $item->hit;?>명의 수강생이 수강하고 있어요</p>
            <p><i class="fa-solid fa-heart fa-small"></i><?= $item->good;?>명의 수강생이 좋아해요</p>
          </div>

        </div>
      </div>
      <div class="container lecture-bottom">
        <div class="d-flex justify-content-between">
          <div>
            <div class="lecture-detail-tit">
              <h2 class="tit-h2">중급자를 위해 준비한 [<?=$step1Name;?>] 강의입니다.</h2>
              <p class="tit-h4"><?= $item->content;?></p>
              <hr>
            </div>
              <h2 class="tit-h2">이런걸 배워요</h2>
              <div class="d-flex align-items-center explan-box">
                <div class="big-ico text-center"><i class="fa-solid fa-marker fa-big"></i><span class="tit-h5">무엇을<br>배우나요?</span></div>
                <ul class="text-c4">
                  <li><i class="fa-solid fa-check fa-small"></i>수준있는 운영체제 기반 성능 프로그래밍</li>
                  <li><i class="fa-solid fa-check fa-small"></i>파이썬 실전 문법</li>
                  <li><i class="fa-solid fa-check fa-small"></i>운영체제 OS 지식</li>
                  <li><i class="fa-solid fa-check fa-small"></i>파이썬 기술 면접 대비 수준있는 지식</li>
                  <li><i class="fa-solid fa-check fa-small"></i>개발자(엔지니어)를 위한 프로그래밍 지식</li>
                  <li><i class="fa-solid fa-check fa-small"></i>기타 개발 관련 지식</li>
                </ul>
              </div>
            <h2 class="tit-h2">이런분들께 추천드려요</h2>
            <div class="d-flex align-items-center explan-box">
              <div class="big-ico text-center"><i class="fa-solid fa-chalkboard-user fa-big"></i><span class="tit-h5">학습 대상은<br>누구일까요?</span></div>
              <ul class="text-c4">
                <li><i class="fa-solid fa-check fa-small"></i>파이썬 스레딩 및 멀티프로세싱을 배우고 싶은 분</li>
                <li><i class="fa-solid fa-check fa-small"></i>파이썬을 보다 깊게 학습하고 싶은 모든 분</li>
              </ul>
            </div>
            <div class="d-flex align-items-center explan-box">
              <div class="big-ico text-center"><i class="fa-solid fa-book-open fa-big"></i><span class="tit-h5">선수 지식<br>필요한가요?</span></div>
              <ul class="text-c4">
                <li><i class="fa-solid fa-check fa-small"></i>파이썬 기초 과정을 학습 하신 분</li>
                <li><i class="fa-solid fa-check fa-small"></i>ㅋㅋㅋ코딩 파이썬 입문 과정을 학습 하신 분</li>
              </ul>
            </div>
          </div>
            <!-- 결제 영역-->
            <div class="order-payment">
              <div class="order-pay cart-box">
                <h3 class="text-center">이달의 할인! 놓칠 수 없는 기회에요</h3>
                <hr>
                <p class="text-red">15%<span class="text-c5">300,000</span></p>
                <p class="tit-h3">255,000원</p>
                <p class="text-c5"><i class="fa-solid fa-check fa-small"></i>2개월 무이자 할부 가능</p>
                <button type="button" class="btn btn-outline-secondary btn-md pm-line mb-3">수강신청 하기</button>
                <button type="button" class="btn etc-c btn-md mb-3">장바구니 담기</button>
                <ul class="list-group etc-list justify-content-end">
                  <li class="list-group-item"><a href="#"><i class="fa-solid fa-heart fa-small"></i>좋아요</a></li>
                  <li class="list-group-item"><a href="#"><i class="fa-solid fa-shuffle fa-small"></i>공유하기</a></li>
                </ul>
              </div>
              <div class="order-infor">
                <p class="d-flex justify-content-between align-items-center text-c6"><span><i class="fa-solid fa-circle-question fa-small"></i><strong>구매자 정보</strong></span><span><a href="#" title="문의하기 바로가기">문의하기</a><i class="fa-solid fa-angle-right fa-small"></i></span></p>
              </div>
            </div>
        </div>
        
          <h2 class="tit-h2">비슷한 강의를 추천드려요</h2>
          <ul class="lecture_most">
            <?php
              $items= [];
              $sql ="SELECT * FROM products where cate LIKE '%{$cateArr[1]}%' LIMIT 0,4";
              $result = $mysqli->query($sql);
              while ($row = $result->fetch_object()) {
                $items[] = $row;
            }
            foreach($items as $item){
            ?>
            <li><a href="#">
              <img src="<?=$item->thumbnail;?>" alt="">
              <h3 class="tit-h4"><?= $item->name;?></h3>
              <p><?= $item->content;?></p>
            </a></li>
            <?php
            }
            ?>
          </ul>
        
      </div>

  </main>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>
