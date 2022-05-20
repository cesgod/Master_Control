$(document).ready(function() {
    $.ajax({
        url: "getstatus.php",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
            var nombre = [];
            var stat1 = [];
            var stat2 = [];
            var stat3 = [];
            var color = ['rgba(192, 219, 20, 0.6)','rgba(192, 219, 20, 0.6)','rgba(192, 219, 20, 0.6)'];
            var color1 = ['rgba(219, 143, 20, 0.6)','rgba(219, 143, 20, 0.6)','rgba(219, 143, 20, 0.6)'];
            var color2 = ['rgba(219, 20, 20, 0.6)','rgba(219, 20, 20, 0.6)','rgba(219, 20, 20, 0.6)'];
            var bordercolor = ['rgba(192, 219, 20, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(219, 20, 20, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'];
            console.log(data);
            chart_data = (data);
            //console.log(chart_data);


            nombre = chart_data[3];
            stat1 = chart_data[0];
            stat2 = chart_data[1];
            stat3 = chart_data[2];
            console.log('A: ',stat1);
            console.log('B: ',stat2);
            console.log('C: ',stat3);
             
            var chartdata = {
                labels: nombre,
                datasets: [{
                    label: 'SIN INICIAR',
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: stat1
                },{
                    label: 'EN PROCESO',
                    backgroundColor: color1,
                    borderColor: color1,
                    borderWidth: 2,
                    hoverBackgroundColor: color1,
                    hoverBorderColor: bordercolor,
                    data: stat2
                },{
                    label: 'FINALIZADO',
                    backgroundColor: color2,
                    borderColor: color2,
                    borderWidth: 2,
                    hoverBackgroundColor: color2,
                    hoverBorderColor: bordercolor,
                    data: stat3
                }]
            };
 
            var mostrar = $("#status_bar");
 
            var grafico = new Chart(mostrar, {
                type: 'bar',
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    datalabels: {
                        align: 'end',
                        anchor: 'start'
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});