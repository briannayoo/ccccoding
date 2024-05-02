document.addEventListener("DOMContentLoaded", function() {

  /*
    =====================대쉬보드 
  */
  const lineChart = $('#line-chart');
  const barChart = $('#bar-chart');
  const pieChart = $('#pie-chart');
  const barChart2 = $('#bar-chart2');

  // 이달의 매출
  const sales2022 = {
    label: '2022년',
    data: [90, 86, 89, 93, 95,95,95,95,95,95,95,95,],
    borderWidth: 2,
    backgroundColor: 'rgba(255,0,0,0.5)',
    borderColor:'rgba(255,0,0,0.5)'
  }
  const sales2023 = {
    label: '2023년',
    data: [70, 76, 79, 73, 35,35,35,35,35,35,35,35,],
    borderWidth: 2,
    backgroundColor: 'rgba(0,255,0,0.5)',
    borderColor:'rgba(0,255,0,0.5)'
  }
  const sales2024 = {
    label: '2024년',
    data: [60, 66, 69, 63, 65,],
    borderWidth: 2,
    backgroundColor: 'rgba(0,0,255,0.5)',
    borderColor:'rgba(0,0,255,0.5)'
  }
  new Chart(barChart, {
    type: 'line',
    data: {
      labels: ['1월', '2월', '3월', '4월', '5월','6월','7월','8월','9월','10월','11월','12월'],
      datasets: [sales2022,sales2023,sales2024]
    },
    options: {
      cutout:'90%',
      maintainAspectRatio:false,
      plugins: {
        legend: {
            Position: 'bottom',
            display: true,
            labels: {
              
                color: '#222',
                font: {
                  size: 16
              }
            }
        }
      }
    }
  });

  // 회원관리
  const member1 = {
    label: '총회원수',
    data: [90, 86, 89, 93, 95, 85],
    borderWidth: 2,
    backgroundColor: 'rgba(255,0,0,0.5)',
    borderColor:'rgba(255,0,0,0.5)'
  }
  const member2 = {
    label: '신규 회원',
    data: [30, 19, 24, 50, 55, 25],
    borderWidth: 2,
    backgroundColor: 'rgba(0,255,0,0.5)',
    borderColor:'rgba(0,255,0,0.5)'
  }
  const member3 = {
    label: '탈퇴회원',
    data: [1, 1, 3, 3, 3, 4],
    borderWidth: 2,
    backgroundColor: 'rgba(0,0,255,0.5)',
    borderColor:'rgba(0,0,255,0.5)'
  }

  new Chart(lineChart, {
    type: 'line',
    data: {
      labels: ['1월', '2월', '3월', '4월', '5월', '6월'],
      datasets: [member1,member2,member3]
    },
    options: {
      scales: {
        y: {
          // beginAtZero: true
          stacked:false
        }
      },
      maintainAspectRatio:false
    }
  });


  //강의관리

  const age20 = {
    label: '20대',
    data: [40, 50, 70, 20, 60, 65],
    borderWidth: 2,
    backgroundColor: 'rgba(255,0,0,0.5)'
  }
  const age30 = {
    label: '30대',
    data: [10, 10, 80, 10, 90, 95],
    borderWidth: 2,
    backgroundColor: 'rgba(255,255,0,0.5)'
  }
  const age40 = {
    label: '40-60대',
    data: [20, 20, 10, 30, 20, 15],
    borderWidth: 2,
    backgroundColor: 'rgba(0,0,255,0.5)'
  }
  new Chart(barChart2, {
    type: 'bar',
    data: {
      labels: ['html', 'css', 'javascript', 'php', 'rect','python'],
      datasets: [age20,age30,age40]
    },
    options: {
      cutout:'90%',
      maintainAspectRatio:false,
      plugins: {
        legend: {
            Position: 'bottom',
            display: true,
            labels: {
                color: '#222',
                font: {
                  size: 16
              }
            }
        }
      }
    }
  });

  //수료관리
  const Completion = {
    label: '2024',
    data: [75, 80, 15, 5],
    borderWidth: 2,
  }
  new Chart(pieChart, {
    type: 'pie',
    data: {
      labels: ['수료완료', '진행중', '미수료', '중도취소'],
      datasets: [
        Completion
      ]
    },
    options: {
      maintainAspectRatio:false,
      backgroundColor: ['rgba(255,255,0,0.5)','rgba(0,0,255,0.5)','rgba(0,255,255,0.5)','rgba(255,0,0,0.5)']
    }
  });
  
});
