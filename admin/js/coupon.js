$(function() {
    // 할인금액/ 할인율 선택
    $('.dc-wrap').hide();
    $('#coupon_type').change(function(){
        const val = $(this).val();
        if(val == 'amount'){
            $('.dc-wrap.amount').show();
            $('.dc-wrap.percent').hide();
        }else if(val == 'rate'){
            $('.dc-wrap.amount').hide();
            $('.dc-wrap.percent').show();
        }else{
            $('.dc-wrap').hide();
        }
    });

    // 기간설정
    $('.date-wrap').hide();
    $('#use_date_type').change(function(){
        const value = $(this).val();
        if(value == 'limited'){
            $('.date-wrap').show();
        }else{
            $('.date-wrap').hide();
        }
    })

    // 쿠폰 취소버튼 클릭
    $('.cancel').click(function(){
        if(confirm('취소하시겠습니까?')){
            location.href='coupon.php';
        }
    })

    // 쿠폰관리 
    $('.edit-btn-group .del').click(function(){
      
    })
});
