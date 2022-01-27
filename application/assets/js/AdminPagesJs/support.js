// TICKET OVERVIEW CHART
document.addEventListener('DOMContentLoaded', function () {
    const chart1 = Highcharts.chart('supportOverviewChart', {
        chart: {
            type: 'areaspline',
            scrollablePlotArea: {
                minWidth: 400,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Weekly Ticket Overview'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            ],
            plotBands: [{ // visualize the weekend
                from: 4.5,
                to: 6.5,
                color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'Number of tickets'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' tickets'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Open/Pending',
            data: [1, 2, 8, 4, 10, 4, 5],
            color: '#FFB36C'
        }, {
            name: 'Closed',
            data: [1, 1, 4, 2, 5, 2, 3],
            color:'#FF6C87'
        }]
    })
});
