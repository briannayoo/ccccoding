$(function() {

/* ===================== 공통영역 =====================*/

  // gnb
  // $('.gnb-list > li:first-child').addClass('on');
  $('.gnb-list > li').click(function(){
    // console.log($(this).find('.accordion'));
    if($(this).find('.accordion').length === 0){
      $(this).toggleClass('on');
    }
    $(this).siblings().removeClass('on');
  })
  $('.gnb-list > li .depth-2 > li').click(function(){
    $(this).closest('.acco').find('.accordion-header').toggleClass('on');
    if($(this).find('.accordion').length === 0){
      $(this).toggleClass('on');
    }
    $(this).siblings().removeClass('on');
  })

  // Datepicker
  if($('.date-wrap').length > 0){
    
    const datepickers = document.querySelectorAll('.date-wrap .open');
    datepickers.forEach(picker => {
      new Datepicker(picker, {
        toValue:  function(val){
          console.log($(picker).closest('.ipt-wrap').find('.ipt-datepicker'))
          val = $(picker).closest('.ipt-wrap').find('.ipt-datepicker').eq(0).val(val.slice(0, -1).replaceAll('.', '-'));
          return val;
        },
      });
    });

    // $('.ipt-datepicker').val($('.date-wrap .open').attr('data-value'));
    // $('.ipt-datepicker').eq(0).val($('.date-wrap .open').eq(0).data('value'));
  }
  
  // thumbnail
  // $('#addImage').click(function(){
  //   $('#upfile').trigger('click');
  // });
  // let profile = document.querySelector('#upfile');
  // profile.addEventListener('change',(e)=>{
  //   let file = e.target.files[0];
  //   console.log(file)
  //   var reader = new FileReader(); //FileReader() : 이미지 정보를 알려주는 함수
  //   reader.onloadend = (e=>{
  //     let attachment = e.target.result;
  //     if(attachment){
  //       let target = document.querySelector('#addedImages');
  //       target.innerHTML = `<img src="${attachment}" alt="${file.name}">`;
  //     }
  //   })
  //   reader.readAsDataURL(file); //사용자가 선택한 파일을 읽어오는 역할
  // });

  //파일추가 버튼
  $('#custom-button').click(function() {
    $('#file-upload').trigger('click');
  });

  $('#file-upload').change(function() {
    var fileName = $(this).val().split('\\').pop();
    $('.file-input-text').val(fileName);
  });


});