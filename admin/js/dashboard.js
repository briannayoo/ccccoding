document.addEventListener('DOMContentLoaded',function(){
  const tabMenu = $('.lecture-area a');
  const tabContent = $('#tab-content > div');

  tabMenu.click(function(e) {
    e.preventDefault(); 
    tabMenu.removeClass('on');
    $(this).addClass('on');

    tabContent.removeClass('on');
    tabContent.eq(tabMenu.index(this)).addClass('on');
    });
  });
