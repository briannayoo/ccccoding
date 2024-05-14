$(function(){

  //banner 슬라이드
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
      currentSlide.css({left:0}).animate({left:'-100%'});
      nextSlide.css({left:'100%'}).animate({left:'0'});
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

  //Summer note
  /*
  $('#summernote').summernote({
  placeholder: '학습관련 질문을 입력해주세요. 서로 예의를 지키며 존중하는 문화를 만들어가요',
  tabsize: 2,
  height: 100
  });
  */

   //Main section event
  // let img_num = Math.floor(Math.random()*4+1);

  // document.getElementById('gnb_img').src='./images/gnbrandom0'+img_num+'.png';

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

  // header
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




}); // 스크립트 닫힘