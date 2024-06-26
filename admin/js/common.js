$(function() {
  /* ===================== 공통영역 =====================*/
  // gnb
  const url = location.pathname
  let ctgIdx = null
  let ctgIdx2dep = null

  // 1depth 카테고리 순서 찾기
  $('.gnb-list > li').filter((idx, item) => {
    if($(item).find("> a").attr('href') === url){
      ctgIdx = idx;
      sessionStorage.setItem('ctgIdx', idx); // 최근 1depth index 저장
    }
    return idx;
  })
  
  // 2depth 카테고리 순서 찾기
  $('.gnb-list > li .depth-2 > li').filter((idx, item) => {
    if($(item).find("> a").attr('href') === url){
      ctgIdx2dep = idx;
      return idx;
    }
  })

  if(ctgIdx !== null){ // 1depth 있을때
    $('.gnb-list > li').siblings().removeClass('on');
    $('.gnb-list > li').eq(ctgIdx).addClass('on');
  }else if(ctgIdx === null && ctgIdx2dep !== null){ // 1depth 있을때 && 2depth 없을때
    ctgIdx = 4 // 아코디언 인덱스 (아코디언 리스트 순서가 바뀔 경우 ctgIdx도 변경)
    $('.gnb-list > li').eq(ctgIdx).find('.accordion-header').addClass('on');
    $('.gnb-list > li .depth-2 > li').siblings().removeClass('on');
    $('.gnb-list > li').eq(ctgIdx).find('.depth-2 > li').eq(ctgIdx2dep).addClass('on');
    $('.gnb-list > li').eq(ctgIdx).find('.accordion-header > button').trigger('click')
  }else if(ctgIdx === null){ // 1depth 없을때
    ctgIdx = sessionStorage.getItem('ctgIdx');
    $('.gnb-list > li').siblings().removeClass('on');
    $('.gnb-list > li').eq(ctgIdx).addClass('on');
  }


  $('.gnb-list > li').click(function(){
    // e.preventDefault();)
    if($(this).find('> a').attr('href') == undefined){ // 아코디언 a링크 X
      $('.gnb-list > li').siblings().removeClass('on'); // 1depth 비활성화

      $(this).find('.accordion-header').siblings().removeClass('on');
      $(this).find('.accordion-header').addClass('on');
    }
  })


  // Datepicker
  if($('.date-wrap').length > 0){
    
    const datepickerBtns = $('.date-wrap .open');
    const datepickers = document.querySelectorAll('.ipt-datepicker');
    datepickerBtns.click(function(){
      let target =  $(this).closest('.ipt-wrap').find('input');
      
      target.focus();
    });

    datepickers.forEach(picker => {
      
      new Datepicker(picker, {
        onChange:function(){
                
          let dateString = picker.value;
          // 마지막 문자가 점인 경우 제거
          if (dateString.endsWith('.')) {
              dateString = dateString.slice(0, -1);
          }
          // 공백 제거 후 남은 점을 하이픈으로 변경
          let formattedDate = dateString.replace(/ /g, '').replace(/\./g, '-');
          picker.value = formattedDate;
      }
      });
      let val = picker.closest('.ipt-wrap').getAttribute('data-value');
      console.log(val);
      picker.value= val;
    });

    // $('.ipt-datepicker').val($('.date-wrap .open').attr('data-value'));
    // $('.ipt-datepicker').eq(0).val($('.date-wrap .open').eq(0).data('value'));
  }
  
  // thumbnail
  if($('.tumbnail_wrap').length > 0){
    $('#addImage').click(function(){
      $('#thumbnail').trigger('click');
    });

    let profile =$('#thumbnail');
    profile.on('change',(e)=>{
      let file = e.target.files[0];
      console.log(file)
      var reader = new FileReader(); //FileReader() : 이미지 정보를 알려주는 함수
      reader.onloadend = (e=>{
        let attachment = e.target.result;
        console.log(attachment)
        if(attachment){
          let target = $('#addedImages');
          let tag = `
          <img src="${attachment}" alt="${file.name}">
          `;
          target.html(tag);
          $('.remove').remove();
        }
      })
      reader.readAsDataURL(file); //사용자가 선택한 파일을 읽어오는 역할
    });
  }

  //파일추가 버튼
  if($('#custom-button').length > 0){
    $('#custom-button').click(function() {
      $('#file-upload').trigger('click');
    });

    $('#file-upload').change(function() {
      var fileName = $(this).val().split('\\').pop();
      $('.file-input-text').val(fileName);
    });
  }

  // 체크박스 전체선택
  if($('#all-check').length > 0){
    $("#all-check").click(function(){
      $('.form-check-input').prop('checked', $(this).prop('checked'));
    });
  }

  if($('.table-bordered thead .form-check-input').length > 0){
    $(".table-bordered thead .form-check-input").change(function(){
      if($(this).is(':checked')){
        $(".table-bordered tbody .form-check-input").prop('checked', true)
      }else{
        $(".table-bordered tbody .form-check-input").prop('checked', false)
      }
    })

    $(".table-bordered tbody .form-check-input").change(function(){
      const chkNum = $(".table-bordered tbody .form-check-input").filter((idx, item) => {
        return $(item).is(":checked") ? true : false
      }).length

      if($(".table-bordered tbody .form-check-input").length === chkNum){
        $(".table-bordered thead .form-check-input").prop('checked', true)
      }else{
        $(".table-bordered thead .form-check-input").prop('checked', false)
      }
    })
  }

  // $(".btn-secondary").click(function(){
  //   if($(".table-bordered tbody .form-check-input").is(":checked")){
  //     if($(this).text() === '삭제' && confirm("삭제 하시겠습니까?")){
  //       for(let i=0; $(".table-bordered tbody .form-check-input").length > i; i++){
  //         if($(".table-bordered tbody .form-check-input").eq(i).is(":checked")){
  //           console.log($(".table-bordered tbody > tr").eq(i))
  //           // 실행
  //           $(".table-bordered tbody > tr").eq(i).css({"display": "none"});
  //         }
  //       }
  //     }
  //   }else{
  //     alert('선택해주세요.')
  //   }
  // });

  //이미지 삭제
  if($('#all-check').length > 0){
    $('#btn-del').on('click', 'button', function() {
      let imgid = $(this).parent().attr('id');
      file_delete(imgid);
    });

    function file_delete(imgid) {
      if (!confirm('정말 삭제할까요?')) {
        return false;
      }
      let data = {
        imgid: imgid
      }
      $.ajax({
        async: false, //결과가 있으면 반영해줘
        type: 'POST',
        url: 'image_delete.php',
        data: data,
        dataType: 'json',
        error: function(error) {
          console.log('error:', error);
        },
        // success: function(return_data) {
        //   if (return_data.result === 'member') {
        //     alert('권한이 없습니다.');
        //     return;
        //   } else if (return_data.result === 'mine') {
        //     alert('본인이 등록한 이미지만 삭제할 수 있습니다.');
        //     return;
        //   } else if (return_data.result === 'fail') {
        //     alert('삭제 실패!');
        //     return;
        //   } else {
        //     $('#' + imgid).remove();
        //   }
        // }
      });
    }
  }

  //취소 체크
  if($('.del_check').length > 0){
    $('.del_check').click(function(){
      if(confirm('취소하시겠습니까?')){
        history.back();
      }
    })
  }
  if($('.logout_click').length > 0){
    $('.logout_click').click(function(){
      if(confirm('로그아웃 하시겠습니까?')){
        history.back();
      }
    })
  }
  
  //알림 팝업
  if($('.alarm').length > 0){
    $('.alarm').click(function(){
      $('.alarm-popup').toggle();
    });
  }
});