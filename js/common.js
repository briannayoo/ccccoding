$(function(){

  //banner 슬라이드 (우예지)
  if($('.slidewrapper').length > 0){
    let slideWrapper = $('.slidewrapper'),
        slides = slideWrapper.find('.slide'),
        slideCount = slides.length,
        currentIdx = 0,
        pager = slideWrapper.find('.pager'),
        timer,
        pagerHTML='';
        
    //페이저 생성
    slides.each(function(idx){
      pagerHTML += `<a href="">${idx+1}</a>`;
      $(this).css({left:`${idx*100}%`})
    });
    pager.html(pagerHTML);

    //페이저 클릭
    let pagerBtn = pager.find('a');

    pagerBtn.click(function(e){
      e.preventDefault();
      moveSlide($(this).index());
    });

    //슬라이드 이동 함수
    function moveSlide(num){
      let currentSlide = slides.eq(currentIdx);
      let nextSlide = slides.eq(num);
      currentSlide.css({left:0}).stop().animate({left:'-100%'});
      nextSlide.css({left:'100%'}).stop().animate({left:'0'});
      currentIdx = num;

      //페이저 활성화
      pagerBtn.eq(currentIdx).addClass('active');
      pagerBtn.eq(currentIdx).siblings().removeClass('active');
    }
    pagerBtn.eq(0).addClass('active');

    //자동슬라이드
    function autoSlide(){
      timer = setInterval(()=>{
        let nextIdx = (currentIdx + 1) % slideCount;
        moveSlide(nextIdx);
      }, 5000);
    }

    //slideWrapper 에 마우스가 들어오면 멈추기, 나가면 다시 자동슬라이드 시작
    slideWrapper.mouseenter(function(){
      clearInterval(timer);
    })
    .mouseleave(function(){
      autoSlide()
    });
    autoSlide()
  }


  //Main section event
  if($('#event-banner img').length > 0){
    let img_num = Math.floor(Math.random()*5+1);
    document.getElementById('gnb_img') .src='image/event_section'+img_num+'.png'; 
  }

  // submenu
  if($('.sub .sub-menu').length >0){
    $('.sub-menu .accordion-button').on('click', function() {
      $(this).closest('li').addClass('on');
      $(this).closest('li').siblings().removeClass('on');
      $('.accordion-collapse').removeClass('show');
    });

    $('.sub-menu .depth-2 a').on('click', function() {
      $(this).closest('li').addClass('on');
      $(this).closest('li').siblings().removeClass('on');
    });
  };


  // mypage submenu(박소현)
  if($('.mypage .sub-menu').length >0){
    $('.mypage .sub-menu > ul > li').click(function() {
      $('.mypage .sub-menu > ul > li').removeClass('on');
      $(this).addClass('on');
    });

    // 현재 URL을 가져오기
    const currentURL = window.location.href;

    $('.mypage .sub-menu > ul > li').each(function() {
      const link = $(this).find('a').attr('href');

      if (currentURL.includes(link)) {
        $(this).addClass('on');
      } else {
        $(this).removeClass('on');
      }
    });

    // 클릭 이벤트 리스너를 추가합니다.
    $('.mypage .sub-menu > ul > li').click(function() {
      $('.mypage .sub-menu > ul > li').removeClass('on');

      $(this).addClass('on');
    });

  };

  // header(박소현)
  if($('header').length > 0) {
    $(window).scroll(function() {
      var gnbArea = $('.gnb-area');
      var scrollPosition = $(window).scrollTop();
    
      if (scrollPosition > 0) {
        gnbArea.addClass('sticky');
      } else {
        gnbArea.removeClass('sticky');
      }
    });
  }

  // mypage 회원정보수정 -프로필변경(박소현)
  if($('.mypage .pf-area').length > 0) {
    $('#img-change-button').click(function() {
      $('#uploadImage').click();
    });

    $('#uploadImage').change(function() {
      let file = this.files[0];
      let fileType = file.type;
      let fileSize = file.size;
      let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

      // 파일 확장자 및 크기 확인
      if (!allowedExtensions.exec(file.name)) {
        alert('png, jpg, jpeg  파일만 업로드 가능합니다.');
        this.value = '';
        return false;
      } else if (fileSize > 1024 * 1024) {
        alert('파일 크기는 1MB 이하로 업로드 가능합니다.');
        this.value = '';
        return false;
      }

      if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
          $('#profileImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
      }
    });
  }

  // 프로그래스바 (박소현)
  // if($('.progress-area').length > 0) {
  //   const val = Number($('.graph').attr('data-value'));
  //   console.log(val);
	// 	let num = 0;

	// 	if(1/(100/val) !== 0){ // 0%가 아닐 때
	// 		const cntNum = setInterval(() => {
	// 			num++;
	// 			$('.count').find("> em").text(num);
	// 			$('.count').closest(".progress-area").find(".graph").css({
	// 				"width": num+"%"
	// 			});


	// 			if(num === val){ // 최종 value값 도달
	// 				$('.count').find("> em").text(val); // 최종결과 값
	// 				clearInterval(cntNum);

  //         // 조건에 따른 텍스트
  //         console.log(num >= 1 && num <= 25)
  //         switch(true){
  //           case (num === 0):
  //             $(".val-area .txt").text('새로운 시작!') 
  //             break;
  //           case (num >= 1 && num <= 25):
  //             $(".val-area .txt").text('아직 시작이에요! 조금만 더 힘내세요!')
  //             break;
  //           case (num >= 26 && num <= 50):
  //             $(".val-area .txt").text('절반 가량 왔어요! 계속해서 열심히 하세요!')
  //             break;
  //           case (num >= 51 && num <= 75):
  //             $(".val-area .txt").text('거의 다 왔어요! 마지막까지 화이팅하세요!')
  //             break;
  //           case (num >= 76 && num <= 99):
  //             $(".val-area .txt").text('거의 다 왔어요! 마지막까지 화이팅하세요!')
  //             break;
  //           case (num === 100):
  //             $(".val-area .txt").text('축하해요! 모든 강의 학습을 완료했습니다.')
  //             break;
  //           // default:
  //         }
					
	// 				if(num === 100){ // 100%일 때
	// 					$('.count').find("> em").text(parseInt(val));
	// 					$('.count').find("> em").addClass("finish");
	// 				};
	// 			};
  //     }, 20); // 시간
	// 	};
  // }

  if($('.progress-area').length > 0) {
    $('.progress-area').each(function(idx, item){
      let val = null;
      if($(item).find('.graph').attr('data-value') === ''){
        val = Math.round(100*(Math.random()));
      }else{
        val = Number($(item).find('.graph').attr('data-value'));
      }
      console.log(val);
      let num = 0;

      if(1/(100/val) !== 0){ // 0%가 아닐 때
        const cntNum = setInterval(() => {
          num++;
          $(item).find('.count > em').text(num);
          $(item).find(".graph").css({
            "width": num+"%"
          });

          if(num === val){ // 최종 value값 도달
            $(item).find(".count > em").text(val); // 최종결과 값
            clearInterval(cntNum);

            // 조건에 따른 텍스트
            switch(true){
              case (num === 0):
                $(item).find(".val-area .txt").text('새로운 시작!') 
                break;
              case (num >= 1 && num <= 25):
                $(item).find(".val-area .txt").text('아직 시작이에요! 조금만 더 힘내세요!')
                break;
              case (num >= 26 && num <= 50):
                $(item).find(".val-area .txt").text('절반 가량 왔어요! 계속해서 열심히 하세요!')
                break;
              case (num >= 51 && num <= 75):
                $(item).find(".val-area .txt").text('거의 다 왔어요! 마지막까지 화이팅하세요!')
                break;
              case (num >= 76 && num <= 99):
                $(item).find(".val-area .txt").text('거의 다 왔어요! 마지막까지 화이팅하세요!')
                break;
              case (num === 100):
                $(item).find(".val-area .txt").text('축하해요! 모든 강의 학습을 완료했습니다.')
                break;
              // default:
            }
            
            if(num === 100){ // 100%일 때
              $(item).find(".count > em").text(parseInt(val));
              $(item).find(".count > em").addClass("finish");
            };
          };
        }, 20); // 시간
      };
    })
  }
  



}); // 스크립트 닫힘