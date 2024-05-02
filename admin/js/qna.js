//댓글 수정버튼 클릭시
$('.reply-wrapper .reply-edit').click(function(){

  console.log('click');
      let target = $(this).closest('.reply-wrapper').find('.edit_dialog');
      target.attr('open','open');
    });