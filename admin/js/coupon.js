$(function() {
  $('#discount').change(function(){
    let value = $(this).val();
    $('#coupon_price, #coupon_ratio').prop('disabled', false);
    if(value == 1){
        $('#coupon_ratio').prop('disabled', true);
    }else{
        $('#coupon_price').prop('disabled', true);
    }
});
});