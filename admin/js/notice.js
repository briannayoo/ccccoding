    // 쿠폰 취소버튼 클릭
    $('.n-cancel').click(function(){
      if(confirm('취소하시겠습니까?')){
          location.href='notice_list.php';
      }
  })