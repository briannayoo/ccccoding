$(function() {
    let data = {};
    $('#cancelOrder').click(function(){
        let oids = [];
        let checkboxs = $('#orderTable').find('input[type="checkbox"]:checked');
        console.log(checkboxs.length)
        if(checkboxs.length == 0){
            alert('항목을 선택해주세요');
        } else {
            checkboxs.each(function(){
                let request = $(this).closest('tr').find('.request').text();
                if(!request){
                    alert('해당건만 선택해주세요.');
                    return false;
                } else{
                    oids.push($(this).val())
                        // 수강관리 취소,환불신청 
                        data = {
                            type : 'cancel_request',
                            oid :oids   
                        }
                }                
            });            
        }
        console.log(oids);

        $.ajax({
            url:'order_update.php',
            async:false,
            type: 'POST',
            data:data,
            dataType:'json',
            error:function(){},
            success:function(data){
            console.log(data);
            if(data.result=='ok'){
                alert('취소 환불건이 업데이트 되었습니다');  
                location.reload();                      
            }else{
                alert('오류, 다시 시도하세요');                        
                }
            }
        });

    });
    $('#refundOrder').click(function(){
        let oids = [];
        let checkboxs = $('#orderTable').find('input[type="checkbox"]:checked');
        console.log(checkboxs.length)
        if(checkboxs.length == 0){
            alert('해당건만 선택해주세요.');
        } else {
            checkboxs.each(function(){
                let request = $(this).closest('tr').find('.refund').text();
                if(!request){
                    alert('환불건이 아닙니다.');
                    return false;
                } else{
                    oids.push($(this).val())
                        // 수강관리 취소,환불신청 
                        data = {
                            type : 'refund_request',
                            oid :oids   
                        }
                }                
            });            
        }

        console.log(data);

        $.ajax({
            url:'order_update.php',
            async:false,
            type: 'POST',
            data:data,
            dataType:'json',
            error:function(){},
            success:function(data){
            console.log(data);
            if(data.result=='ok'){
                alert('취소 환불건이 업데이트 되었습니다');  
                location.reload();                      
            }else{
                alert('오류, 다시 시도하세요');                        
                }
            }
        });

    });


    // 수강관리 취소, 환불 신청  
    // $(".table-bordered thead .form-check-input").change(function(){
    // if($(this).is(':checked')){
    //     $(".table-bordered tbody .form-check-input").prop('checked', true)
    // }else{
    //     $(".table-bordered tbody .form-check-input").prop('checked', false)
    // }
    // })

    // $(".table-bordered tbody .form-check-input").change(function(){
    // const chkNum = $(".table-bordered tbody .form-check-input").filter((idx, item) => {
    //     return $(item).is(":checked") ? true : false
    // }).length

    // if($(".table-bordered tbody .form-check-input").length === chkNum){
    //     $(".table-bordered thead .form-check-input").prop('checked', true)
    // }else{
    //     $(".table-bordered thead .form-check-input").prop('checked', false)
    // }
    // })

    // $(".btn-secondary").click(function(){
    // let alertTxt = 0
    // if($(".form-check-input").is(":checked")){
    //     if($(this).text() === '취소' && confirm("취소신청 하시겠습니까?")){
    //     for(let i=0; $(".table-bordered tbody .form-check-input").length > i; i++){
    //         if($(".table-bordered tbody .form-check-input").eq(i).is(":checked")){
    //         if($(".table-bordered tbody tr").eq(i).find('.request').text() === '취소신청완료'){
    //             alertTxt += 1
    //         }else{
    //             alertTxt = 0
    //         }
    //         $(".table-bordered tbody tr").eq(i).find('.request').text('취소신청완료')
    //         $(".table-bordered tbody .form-check-input").eq(i).prop('checked', false)
    //         }
    //     };

    //     if(alertTxt > 0){
    //         alert('이미 취소 신청하셨습니다.')
    //         return
    //     };
    //     }else if($(this).text() === '환불' && confirm("환불신청 하시겠습니까?")){
    //     for(let i=0; $(".table-bordered tbody .form-check-input").length > i; i++){
    //         if($(".table-bordered tbody .form-check-input").eq(i).is(":checked")){
    //         if($(".table-bordered tbody tr").eq(i).find('.refund').text() === '환불신청완료'){
    //             alertTxt += 1
    //         }else{
    //             alertTxt = 0
    //         }
    //         $(".table-bordered tbody .form-check-input").eq(i).prop('checked', false)
    //         $(".table-bordered tbody tr").eq(i).find('.refund').text('환불신청완료')
    //         }
    //     }

    //     if(alertTxt > 0){
    //         alert('이미 환불 신청하셨습니다.')
    //         return
    //     };
    //     }
    // }else{
    //     alert('선택해주세요.')
    // }
    // })


    

});
