$(document).ready(function() {

$('#lecture_save').on('submit', save);

function save() {
  let contents = encodeURIComponent(markupStr);
  $('#contents').val(contents);

  if(!$('#thumbnail').val()){
    alert('대표 이미지를 등록하세요');       
    return false;
  }
  if(!$('#lecture_image_id').val()){
    alert('최소 하나의 추가 이미지를 등록하세요.');
    return false;
  }

}

// $("#sale_start_date").datepicker({
//   dateFormat: "yy-mm-dd"
// });
// $("#sale_end_date").datepicker({
//   dateFormat: "yy-mm-dd"
// });

//이미지 등록
$('#upfile_btn').click(function() {
    attachFile(files);
});

function attachFile(file) {
  var formData = new FormData();
  formData.append('savefile', file); //<input name="savefile" value="파일명">

  $.ajax({
    url: 'lecture_save_image.php',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    type: 'POST',
    success: function(return_data) {
      console.log(return_data);
      if (return_data.result == 'size') {
        alert('10메가 이하만 첨부할수 있습니다.');
        return; //함수 종료(빈값을 리턴);
      } else if (return_data.result == 'image') {
        alert('이미지만 첨부할 수 있습니다.');
        return;
      } else if (return_data.result == 'error') {
        alert('파일 첨부 실패, 관리자에게 문의하세요');
        return;
      } else {
        let imgid = $('#lecture_image_id').val() + return_data.imgid + ',';
        $('#lecture_image_id').val(imgid);
        let html = `
            <div class="card" style="width: 10rem;" id="${return_data.imgid}">
              <img src="/ccccoding/admin/upload/${return_data.savefile}" class="img-fluid" alt="...">
              <button type="button" class="btn btn-danger btn-sm">삭제</button>
            </div>
          `;

        $('#addedimages').append(html);
      }
    }
  });
}

$('#addedimages').on('click', 'button', function() {
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
    async: false, 
    type: 'POST',
    url: 'image_delete.php',
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
        $('#' + imgid).remove();
      }
    }
  });
}

});