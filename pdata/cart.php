<?php
  $title = '수강바구니';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
?>
  <!-- 우예지 (s) -->
  <main class="sub">
    <div class="section">
      <div class="container">
        <form action="checkout.php" method="POST">
          <input type="hidden" name="userid" value="<?= $userid; ?>">
          <input type="hidden" name="pid" id="pidArr" value="<?php echo implode(",", $cpidArr);?>">
          <input type="hidden" name="grand_total" id="grand_total_final" value="">

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
                  <li class="lecture-item d-flex" data-id="">
                    <img src="./image/img_lecture.png" alt="">
                    <div><h3>강의제목입니다</h3><p>yy-mm-dd~yy-mm-dd</p></div>
                    <i class="fa-solid fa-xmark fa-small cart_item_del"></i>
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
        </form>
      </div>
    </div>
  </main>
  <script>
document.addEventListener('DOMContentLoaded', ()=>{

  $('.cart_item_del').click(function(){
    let cartid =  $(this).parent().attr('data-id');



    let data = {
      cartid :cartid
    }
    $.ajax({
      url:'cart_del.php',
      async:false,
      type: 'POST',
      data:data,
      dataType:'json',
      error:function(){},
      success:function(data){
      console.log(data);
      if(data.result=='ok'){
        alert('장바구니가 업데이트 되었습니다');  
        location.reload();                      
      }else{
        alert('오류, 다시 시도하세요');                        
        }
      }
    });
  });

  //쿠폰적용 계산
  $('#coupon').change(function(){
    let cname = $(this).find('option:selected').text();
    let cprice = $(this).find('option:selected').attr('data-price');
    $('#coupon-name').text(cname);
    $('#coupon-price').text('-'+cprice);
    calcTotal();
  });
  function calcTotal(){
    // let cartItem = $('.list-group li');
    let subtotal = 0;
    // cartItem.each(function(){
    //   let price = Number($(this).find('.price span').text());
    //   let qty =  Number($(this).find('.qty-text').val());
    //   let total_price = $(this).find('.total_price span');
    //   total_price.text(price*qty);            
    //   subtotal = subtotal+(price * qty);
    // });        
    let discount = Number($('#coupon-price').text());
    let grand_total = subtotal+discount;
    $('#subtotal').text(subtotal);
    $('#grandtotal').text(grand_total);
    $('#grand_total_final').val(grand_total);
  }
  calcTotal();

  //카트 일괄 업데이트
  $('#updateCart').click(function(e){
    e.preventDefault();
    let cartItem = $('.cart-table tbody tr');
    let cartIdArr = [];
    let qtyArr = [];

    cartItem.each(function(){
      let cartid = Number($(this).find('.qty-text').attr('data-id'));
      cartIdArr.push(cartid);

      let qty = Number($(this).find('.qty-text').val());
      qtyArr.push(qty);
    })
    console.log(cartIdArr, qtyArr);
    data = {
        cartid:cartIdArr,
        qty:qtyArr
    }
    $.ajax({
      url:'cart_update.php',
      async:false,
      type: 'POST',
      data:data,
      dataType:'json',
      error:function(){},
      success:function(data){
      console.log(data);
      if(data.result=='ok'){
          alert('장바구니가 업데이트 되었습니다');                        
      }else{
          alert('오류, 다시 시도하세요');                        
          }
      }
    });

  });

});  
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>