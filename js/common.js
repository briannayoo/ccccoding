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




}); // 스크립트 닫힘