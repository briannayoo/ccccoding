document.addEventListener("DOMContentLoaded", function() {
  // 데이트픽커
  const datepicker = document.querySelectorAll('.datepicker');
  for (const date of datepicker) {
    new Datepicker(date);
  }
});