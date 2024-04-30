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
        file_delete(cid);
    })

    // 삭제함수
    function file_delete(cid) {
        if (!confirm('정말 삭제할까요?')) {
            return false;
        }
        let data = {
            cid: cid
        }
        $.ajax({
            async: false, //결과가 있으면 반영해줘
            type: 'POST',
            url: 'coupon_delete.php',
            data: data,
            dataType: 'json',
            error: function(error) {
                console.log('error:', error);
            },
            success: function(return_data) {
                if (return_data.result === 'member') {
                alert('권한이 없습니다.');
                return;
                } else if (return_data.result === 'mine') {
                alert('본인이 등록한 이미지만 삭제할 수 있습니다.');
                return;
                } else if (return_data.result === 'fail') {
                alert('삭제 실패!');
                return;
                } else {
                $('#' + cid).remove();
                }
            }
        });
    }
});
