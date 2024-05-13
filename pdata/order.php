<?php
  $title = '수강바구니';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
?>
  <!-- 우예지 (s) -->
  <main class="sub">
    <div class="section">
      <div class="container">
          <div class="page-tit-area">
            <h2 class="tit-h1">수강 바구니</h2>
          </div>
          
          <div class="order-area d-flex"> 
            <div class="order-list">
              <div>
                <input class="form-check-input" type="checkbox" id="all-check" name="check-group" value="" aria-label="checkbox"> 
                <label for="all-check">전체선택 (<span>1/1</span>)</label>
              </div>
              <hr>
              <div class="check-lecture-list d-flex gap-4">
                <input class="form-check-input" type="checkbox" id="" name="check-group" value="" aria-label="checkbox">
                <ul class="list-group d-flex">
                  <li class="lecture-item d-flex">
                    <img src="./image/img_lecture.png" alt="">
                    <div><h3>강의제목입니다</h3><p>yy-mm-dd~yy-mm-dd</p></div>
                    <i class="fa-solid fa-xmark fa-small"></i>
                  </li>
                  <li class="lecture-price">
                    <p class="p-small"><span>15%</span>300,000원</p>
                    <p class="tit-h3">255,000원</p>
                  </li>
                </ul>
              </div>
            </div>

            <!-- 결제 -->
            <div class="order-payment">
              <div class="order-infor">
                <h3 class="d-flex justify-content-between"><strong>구매자 정보</strong><a href="#" title="수정페이지 바로가기">수정</a></h3>
                <ul>
                  <li>이름 <span>우유박</span></li>
                  <li>이메일 <span>ccccoding@gmail.com</span></li>
                  <li>휴대폰 번호 <span>010-0000-0000</span></li>
                </ul>
              </div>
              <div class="order-pay">
                  <h3>쿠폰</h3>
                  <div class="d-flex justify-content-between">
                    <input type="text" name="coupon" id="coupon-select" class="form-control">
                    <label for="coupon-select" class="btn btn-outline-secondary btn-sm">쿠폰 선택</label>
                  </div>
                  <ul>
                    <li class="d-flex justify-content-between tit-h5 text-place">선택하신 상품금액 <span>300,000원</span></li>
                    <li class="d-flex justify-content-between tit-h5 text-red">할인금액 <span>45,000원</span></li>
                    <li class="d-flex justify-content-between tit-h4 mt-26">총 결제 금액 <span>255,000원</span></li>
                  </ul>
                  <button type="button" class="btn btn-primary btn-md">결제하기</button>
              </div>
            </div>

          </div>
      </div>
    </div>
  </main>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>