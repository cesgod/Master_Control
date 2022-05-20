$(document).ready(function() {
    $.ajax({
        url: "getdata.php",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
            var nombre = [];
            var stock = [];
            var color = ['rgba(192, 219, 20, 0.6)', 'rgba(219, 143, 20, 0.6)', 'rgba(219, 20, 20, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'];
            var bordercolor = ['rgba(192, 219, 20, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(219, 20, 20, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'];
            //console.log(data);
            chart_data = (data);
            //console.log(chart_data);


            nombre = chart_data[1];
            stock = chart_data[0];
             
            var chartdata = {
                labels: nombre,
 
                datasets: [{
                    label: ' ',
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: stock
                }]
            };
 
            var mostrar = $("#miGrafico");
 
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