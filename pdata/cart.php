<?php
  $title = '수강바구니';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

?>
  <!-- 우예지 (s) -->
  <main class="sub">
    <div class="section">
      <div class="container">
      <?php
        $cpidArr = []; // $cpidArr을 빈 배열로 초기화
        if (isset($cartArr) && is_array($cartArr)) { // $cartArr이 설정되었고 배열인지 확인
            foreach ($cartArr as $c) {
                if (isset($c->pid)) { // $c가 pid 속성을 가지고 있는지 확인
                    $cpidArr[] = $c->pid; // $cpidArr에 pid 추가
                }
            }
        }
        ?>
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
                <input class="form-check-input" type="checkbox" id="all-check" name="check-group" value="" aria-label="checkbox" class="update-cart"> 
                <label for="all-check">전체선택 (<span><?=count($cpidArr)?>/1</span>)</label>
              </div>
              <hr>
              <div class="check-lecture-list d-flex gap-4">
                <ul class="list-group d-flex order-container">
                <?php
                    if(isset($cartArr)){
                        foreach($cartArr as $ca){
                ?>
                  <li class="d-flex justify-content-between order-item" data-id="del">
                    <div class="lecture-item d-flex">
                      <input class="form-check-input" type="checkbox" id="" name="check-group" value="" aria-label="checkbox">
                      <img src="<?= $ca-> thumbnail;?>" alt="<?= $ca-> name;?>">
                      <div><h3><?= $ca-> name;?></h3><p><?= $ca-> sale_start_date;?>~<?= $ca-> sale_end_date;?></p></div>
                    </div>
                    <div class="lecture-price d-flex">
                      <i class="fa-solid fa-xmark fa-small cart_item_del curser"></i>
                      <div>
                        <p class="p-small"><span><?= $ca-> price; ?></span><?= $ca-> sale_cnt; ?></p>
                        <p class="tit-h3 total"></p>
                      </div>
                    </div>
                  </li>
                  <?php         
                      }
                    }
                  ?>   
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
                  <?php
                    $cSql = "SELECT uc.ucid, c.coupon_name, c.coupon_price FROM user_coupons uc JOIN coupons c  ON c.cid = uc.couponid WHERE uc.status = 1 AND uc.userid = '{$userid}' AND uc.use_max_date >= now()";
                
                    $cResult = $mysqli -> query($cSql);
                    while($cRow = $cResult->fetch_object()){
                        $cpArr[] = $cRow;
                    }
                
                  ?>
                    <select aria-label="쿠폰선택" name="coupon" id="coupon-select" class="form-control">
                      <option disabled selected>쿠폰선택</option>
                      <?php
                      if(isset($cpArr)){
                        foreach($cpArr as $ca){
                      ?>
                        <option data-price="<?= $ca -> coupon_price ?>" value="<?= $ca -> ucid ?>"><?= $ca -> coupon_name ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                    <label for="coupon-select" class="btn btn-outline-secondary btn-sm">쿠폰 선택</label>
                  </div>
                  <ul>
                    <li class="d-flex justify-content-between tit-h5 text-place">선택하신 상품금액 <span id="subtotal">300,000원</span></li>
                    <li class="d-flex justify-content-between tit-h5 text-red" id="coupon-name">할인금액 <span id="coupon-price">45,000원</span></li>
                    <li class="d-flex justify-content-between tit-h4 mt-26">총 결제 금액 <span id="grandtotal">255,000원</span></li>
                  </ul>
                  <button class="btn btn-primary btn-md">결제하기</button>
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

      //카트 일괄 업데이트(전체 삭제)
      $('.update-cart').click(function(e){
        e.preventDefault();
        let cartItem = $('.order-item');
        let cartIdArr = [];
        let qtyArr = [];

        // cartItem.each(function(){
        //   let cartid = Number($(this).find('.qty-text').attr('data-id'));
        //   cartIdArr.push(cartid);

        //   let qty = Number($(this).find('.qty-text').val());
        //   qtyArr.push(qty);
        // })
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
  </script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>