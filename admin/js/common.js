$(function() {

/*
  =====================공통영역
*/

  if($('.date-wrap').length > 0){
    // Datepicker
    const datepickers = document.querySelectorAll('.date-wrap .open');
    datepickers.forEach(picker => {
        new Datepicker(picker, {
          // 여기에 원하는 설정 옵션을 추가할 수 있습니다.
          onChange: function(){
            // $('.date-wrap .open').click(function(){
              // $('.ipt-datepicker').eq(0).val($('.date-wrap .open').eq(0).data('value'));
              $('.ipt-datepicker').eq(0).val($('.date-wrap .open').eq(0).attr('data-value'));
            // })
          }
        });
    });

    // $('.ipt-datepicker').val($('.date-wrap .open').attr('data-value'));
    // $('.ipt-datepicker').eq(0).val($('.date-wrap .open').eq(0).data('value'));
  }
  
  //thumbnail
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