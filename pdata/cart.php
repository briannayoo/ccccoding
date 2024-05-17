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
          <!-- <input type="hidden" name="userid" value=""> -->
          <input type="hidden" name="pid[]" id="pidArr" value="">
          <input type="hidden" name="total_price" id="total_price" value="">

          <div class="page-tit-area">
            <h2 class="tit-h1">수강 바구니</h2>
          </div>
          
          <div class="order-area d-flex"> 
            <div class="order-list">
              <div>
                <input class="form-check-input" type="checkbox" id="all-check" name="check-group" value="" aria-label="checkbox" class="update-cart"> 
                <label for="all-check">전체선택 (<span class="li-leg"></span>/<span><?=count($cpidArr)?></span>)</label>
              </div>
              <hr>
              <div class="check-lecture-list d-flex gap-4">
                <ul class="list-group d-flex order-container">
                <?php
                    if(isset($cartArr)){
                        foreach($cartArr as $ca){
                ?>
                  <li class="d-flex justify-content-between align-items-center order-item" data-id="<?=$ca -> cartid?>">
                    <div class="lecture-item d-flex align-items-center">
                      <input class="form-check-input" type="checkbox" class="check" name="check-group" value="" aria-label="checkbox">
                      <img src="<?= $ca-> thumbnail;?>" alt="<?= $ca-> name;?>">
                      <div><h3><?= $ca-> name;?></h3><p><?= $ca-> sale_start_date;?>~<?= $ca-> sale_end_date;?></p></div>
                    </div>
                    <div class="lecture-price d-flex">
                      <i class="fa-solid fa-xmark fa-small cart_item_del curser text-c5"></i>
                      <div>
                        <p class="p-small"><span class="sale-price"><?= $ca-> sale_cnt; ?></span><span class="original-price text-place"><?= $ca-> price; ?></span></p>
                        <p class="tit-h3" id="total-price"><span class="grand-total"></span>원</p>
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
                    $cSql = "SELECT uc.ucid, c.coupon_name, c.coupon_price, c.cid
                    FROM user_coupons uc JOIN coupons c 
                    ON c.cid = uc.couponid WHERE uc.status = 1 
                    AND uc.userid = '{$userid}' AND uc.use_max_date >= now()";
                
                    $cResult = $mysqli -> query($cSql);
                    while($cRow = $cResult->fetch_object()){
                        $cpArr[] = $cRow;
                    }
                
                  ?>
                    <select aria-label="쿠폰선택" name="coupon" id="coupon" class="form-control">
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
                  </div>
                  <ul>
                    <li class="d-flex justify-content-between align-items-center tit-h5 text-place">선택하신 상품금액 <div><span id="subtotal"></span>원</div></li>
                    <li class="d-flex justify-content-between align-items-center tit-h5 text-red" id="coupon-name">할인금액 <div><span id="coupon-price"></span>원</div></li>
                    <li class="d-flex justify-content-between align-items-center tit-h4 mt-26">총 결제 금액 <div><span id="grandtotal"></span>원</div></li>
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
        let cartid =  $(this).closest('li').attr('data-id');

        let data = {
          cartid : cartid
        }
        console.log(data);
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
            alert('해당 상품이 삭제 되었습니다');  
            location.reload();                      
          }else{
            alert('오류, 다시 시도하세요');                        
            }
          }
        });
        calcTotal();
      });

      
      
      $(".check").change(function(){
        let checkedCount = $(".check:checked").length;
        $(".li-leg").text(checkedCount);
      });

      // var initialCheckedCount = $(".check:checked").length;
      // $(".li-leg").text(initialCheckedCount);

      //가격 적용
      $('.order-item').each(function(){
        let ori_price = $(this).find('.original-price').text();
        let sale_price = $(this).find('.sale-price').text();

        console.log(ori_price,sale_price)
        $(this).find('.grand-total').text(ori_price-sale_price);

      });
      
      //쿠폰적용 계산
      $('#coupon').change(function(){
        let cname = $(this).find('option:selected').text();
        let cprice = $(this).find('option:selected').attr('data-price');
        $('#coupon-name span').text(cname);
        $('#coupon-price').text('-'+cprice);
        calcTotal();
      });

      $('.order-item input').change(function(){
        calcTotal();
      })
      function calcTotal(){
        let cartItem = $('.order-item');
        let subtotal = 0;
   
        cartItem.each(function(){
          let pidArr = [];
          $('#pidArr').val('');
          if($(this).find('input').prop('checked')){
            console.log('true');
            let price = Number($(this).find('.grand-total').text());
            subtotal += price;
            // console.log(subtotal);
            let cartid =  $(this).closest('li').attr('data-id');
            pidArr.push(cartid);
            $('#pidArr').val('');
            $('#pidArr').val(pidArr);
          } 
        });        
        let discount = Number($('#coupon-price').text());
        let grand_total = subtotal+discount;
        $('#subtotal').text(subtotal);
        $('#grandtotal').text(grand_total);
        $('#total_price').val(grand_total);
    }
    calcTotal();

      // 체크박스 전체선택
      if($('#all-check').length > 0){
        $("#all-check").click(function(){
          $('.form-check-input').prop('checked', $(this).prop('checked'));
          calcTotal();
        });
      }

      if($('#all-check').length > 0){
        $(".lecture-item .form-check-input").change(function(){
          if($(this).is(':checked')){
            $(".lecture-item .form-check-input").prop('checked', true)
          }else{
            $(".lecture-item .form-check-input").prop('checked', false)
          }
        })

        $(".lecture-item .form-check-input").change(function(){
          const chkNum = $(".lecture-item  .form-check-input").filter((idx, item) => {
            return $(item).is(":checked") ? true : false
          }).length

          if($(".lecture-item .form-check-input").length === chkNum){
            $("#all-check").prop('checked', true)
          }else{
            $("#all-check").prop('checked', false)
          }
        })

      }

    });
  </script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>