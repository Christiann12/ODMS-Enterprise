Highcharts.chart('container', {
    chart: {
        type: 'area'
    },

    title: {
        text: ' '
    },

    xAxis: {
        labels: {
            overflow: 'justify'
        }
    },
    yAxis: {
        title: {
            text: ' '
        },
        labels: {
            formatter: function () {
                return this.value / 100 + 'k';
            }
        }
    },
    tooltip: {
        pointFormat: '<b>{point.y:,.0f}</b>'
    },
    plotOptions: {
        area: {
            pointStart: 1940,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
    series: [{
        name: 'Ticket',
        data: [
            1234, 256, 234, 786, 880, 345, 278
        ]
    },]
});

$(document).ready( function () {
    $('#supTable').DataTable({
        "responsive": true,
        // "dom": "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
        //     "<'row'<'col-sm-12'tr>>" +
        //     "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    });
    
} );