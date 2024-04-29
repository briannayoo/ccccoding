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

    $('.date-wrap').hide();
    $('#use_date_type').change(function(){
        const value = $(this).val();
        if(value == 'limited'){
            $('.date-wrap').show();
        }else{
            $('.date-wrap').hide();
        }
    })
});
