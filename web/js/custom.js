          var rupiah = [];
          var tanggal = [];
          $.ajax({
            type : "GET",
            data : "",
            url : "http://localhost/ayambejan.id/admin/backend/web/php/getGraph.php",
            success : function(result){
              var resultObj = JSON.parse(result);
              $.each(resultObj, function(key, value){
                console.log(value.jumlah);
                rupiah.push(value.jumlah);
              });
              tanggal.push("2015");
              tanggal.push("2016");
              tanggal.push("2017");
              tanggal.push("2018");
              // lakukan disini
              var ctx = document.getElementById("myChart").getContext('2d');
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: tanggal,
                      datasets: [{
                          label: 'Jumlah Penjualan',
                          data: rupiah,
                          backgroundColor: [
                              'rgba(0, 133, 203, 0.4)',
                              'rgba(0, 133, 203, 0.4)',
                              'rgba(0, 133, 203, 0.4)',
                              'rgba(0, 133, 203, 0.4)'
                          ],
                          borderColor: [
                              'rgba(0, 133, 203, 1)',
                              'rgba(0, 133, 203, 1)',
                              'rgba(0, 133, 203, 1)',
                              'rgba(0, 133, 203, 1)'
                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                    responsive: true,
                    maintainAspectRatio: false,
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
            }
          });

          var ctx = document.getElementById("myChart").getContext('2d');
