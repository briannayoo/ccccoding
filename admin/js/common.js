document.addEventListener("DOMContentLoaded", function() {

/*
  =====================공통영역
*/

  // Datepicker
  const datepickers = document.querySelectorAll('.datepicker');
  datepickers.forEach(picker => {
      new Datepicker(picker, {
        // 여기에 원하는 설정 옵션을 추가할 수 있습니다.
      });
  });
  
  //thumbnail
  // $('#addImage').click(function(){
  //   $('#upfile').trigger('click');
  // });
  // let profile = document.querySelector('#upfile');
  // profile.addEventListener('change',(e)=>{
  //   let file = e.target.files[0];
  //   console.log(file)
  //   var reader = new FileReader(); //FileReader() : 이미지 정보를 알려주는 함수
  //   reader.onloadend = (e=>{
  //     let attachment = e.target.result;
  //     if(attachment){
  //       let target = document.querySelector('#addedImages');
  //       target.innerHTML = `<img src="${attachment}" alt="${file.name}">`;
  //     }
  //   })
  //   reader.readAsDataURL(file); //사용자가 선택한 파일을 읽어오는 역할
  // });

  //파일추가 버튼
  $('#custom-button').click(function() {
    $('#file-upload').trigger('click');
  });

  $('#file-upload').change(function() {
    var fileName = $(this).val().split('\\').pop();
    $('.file-input-text').val(fileName);
  });

/*
  =====================대쉬보드 
*/
const lineChart = $('#line-chart');
const barChart = $('#bar-chart');
const pieChart = $('#pie-chart');
const barChart2 = $('#bar-chart2');

  new Chart(lineChart, {
    type: 'line',
    data: {
      labels: ['1월', '2월', '3월', '4월', '5월', '6월'],
      datasets: [
          {
          label: '2023',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
          },
          {
            label: '2024',
            data: [4, 12, null, 7, 10, 5],
            borderWidth: 2,
            // hoverBorderWidth:5,
            // borderColor: 'rgba(0,0,0,0.5)',
            // backgroundColor:'yellow',
            // radius:4,
            // hoverRadius:10,
            // pointBorderColor:'black',
            // pointStyle:sun,
            // showLine:true,
            spanGaps:true,
            // stepped:true
          }
      ]
    },
    options: {
      scales: {
        y: {
          // beginAtZero: true
          stacked:true
        }
      },
      maintainAspectRatio:false
    }
  });
  const data2023 = {
    label: '2023',
    data: [12, 19, 24, 7, 10, 5],
    borderWidth: 2
  }
  const data2024 = {
    label: '2024',
    data: [4, 12, 8, 7, 10, 5],
    borderWidth: 1,
    backgroundColor: [
      "rgba(242,166,54,.5)",
      "rgba(39,79,76,.5)",
      "rgba(40,161,130,.5)",
      "rgba(206,29,22,.5)",
      "rgba(242,166,54,.5)",
      "rgba(39,79,76,.5)"
    ],                
    borderColor: [
        "rgba(242,166,54,1)",
        "rgba(39,79,76,1)",
        "rgba(40,161,130,1)",
        "rgba(206,29,22,1)",
        "rgba(242,166,54,1)",
        "rgba(39,79,76,1)"
    ]
  }
  new Chart(barChart, {
    type: 'bar',
    data: {
      labels: ['1월', '2월', '3월', '4월', '5월'],
      datasets: [
        data2023,
        data2024
      ]
    },
    options: {
      indexAxis : 'y',
      scales: {
        y: {
          // beginAtZero: true
          stacked:true
        },
        x: {
          stacked:true
        }
      },
      maintainAspectRatio:false
    }
  });
  new Chart(pieChart, {
    type: 'pie',
    data: {
      labels: ['1월', '2월', '3월', '4월', '5월'],
      datasets: [
        data2024
      ]
    },
    options: {
      maintainAspectRatio:false
    }
  });
  new Chart(barChart2, {
    type: 'bar',
    data: {
      labels: ['1월', '2월', '3월', '4월', '5월'],
      datasets: [
        {
          label: '2024',
          data: [4, 12, 8, 7, 10, 5],
          borderWidth: 1,
        }
      ]
    },
    options: {
      cutout:'90%',
      maintainAspectRatio:false,
      plugins: {
        legend: {
            Position: 'bottom',
            display: true,
            labels: {
                color: '#fff',
                font: {
                  size: 20
              }
            }
        }
      }
    }
  });


});