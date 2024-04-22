document.addEventListener("DOMContentLoaded", function() {
  // Datepicker
  const datepickers = document.querySelectorAll('.datepicker');
  datepickers.forEach(picker => {
      new Datepicker(picker, {
        // 여기에 원하는 설정 옵션을 추가할 수 있습니다.
      });
  });
});