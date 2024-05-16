  // //Summer note
  $(document).ready(function() {
  $('#summernote').summernote({
  placeholder: '학습관련 질문을 입력해주세요.서로 예의를 지키며 존중하는 문화를 만들어가요',
  tabsize: 2,
  height: 800
  });
  $('#content_save').on('submit', save);
    
    function save() {
      let markupStr = $('#summernote').summernote('code');
      let contents = encodeURIComponent(markupStr);
      $('#contents').val(contents);
    }

  });
