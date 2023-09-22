    // setup 

    const data2 = {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
          label: 'This Month',
          data: [18, 12, 6, 9, 12, 3, 9],
          backgroundColor: [
            '#FF6A59'
          ],
          borderColor: [
            '#FF6A59'
          ],
          categoryPercentage: 0.2
        }, {
          label: 'Last Month',
          data: [9, 3, 3, 3, 3, 3, 9],
          backgroundColor: [
            '#4CBC9A',
          ],
          borderColor: [
            '#4CBC9A',
          ],
          categoryPercentage: 0.2
        }]
      };
  
      // config 
      const legendMargin = {
        id: 'legendMargin',
        beforeInit(chart, legend, options){
          const fitValue = chart.legend.fit;
          chart.legend.fit= function fit(){
            fitValue.bind(chart,legend);
              return this.height += 20;
          }
        }
      }
      const config2 = {
        type: 'bar',
        data: data2,
        options: {
          borderRadius:10,
          plugins:{
            legend: {
                labels:{
                    usePointStyle: true,
                    pointStyle: 'circle',
                    //Chỉnh vị trí label cả đường trong sang bên tráia
                    boxWidth: 10,
                    padding: 20,
                    color: 'black',
                },
               
            },
        },
          scales: {
            y: {
              beginAtZero: true
            }
          },
        }
      };
  
      // render init block
      const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
      );