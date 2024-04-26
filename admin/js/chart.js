/*
  =====================대쉬보드 
*/
const lineChart = $('#line-chart');
const barChart = $('#bar-chart');
const pieChart = $('#pie-chart');
const barChart2 = $('#bar-chart2');

// 이달의 매출
new Chart(barChart, {
  type: 'bar',
  data: {
    labels: ['html', 'css', 'javascript', 'php', 'rect'],
    datasets: [
      {
        label: '5월',
        data: [4, 12, 8, 7, 2, 5],
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
              color: '#472ea1',
              font: {
                size: 16
            }
          }
      }
    }
  }
});

// 회원관리
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

//강의관리
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

//수료관리
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
