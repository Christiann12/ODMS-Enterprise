
// ACTIVE USERS CHART
document.addEventListener('DOMContentLoaded', function () {
    const chart1 = Highcharts.chart('activeUserLineChart', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 400,
                scrollPositionX: 1
            }
        },

        title: {
            text: 'Monthly Active Users'
        },

        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: {
                overflow: 'justify'
            }
        },
        yAxis: {
            type: 'logarithmic',

            title: {
                text: 'Active Users'
            }
        },

        series: [{
            name: 'Number of Active Users Monthly',
            data: [0.1, 2, 45, 1001, 200, 0.33, 10000]
        }]

    });
});

// SERVICES AND PRODUCTS COUNT
document.addEventListener('DOMContentLoaded', function () {
    const chart2 = Highcharts.chart('serviceProdCountPie', {
        chart: {
            type: 'pie',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            scrollablePlotArea: {
                minWidth: 400,
                scrollPositionX: 1
            }
        },

        title: {
            text: 'Services & Products'
        },

        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },

        series: [{
            name: 'Count',
            colorByPoint: true,
            data: [{
                name: 'Services',
                y: 61.41,
                sliced: true,
                selected: true
            }, {
                name: 'Products',
                y: 11.84
            }]
        }]

    });
});

// TRANSACTION COUNT
document.addEventListener('DOMContentLoaded', function () {
    const chart3 = Highcharts.chart('transactionCountLine', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 400,
                scrollPositionX: 1
            }
        },

        title: {
            text: 'Services & Products'
        },

        xAxis: {
            categories: ['Mon', 'Tue','Wed','Thu','Fri','Sat','Sun'],
            labels: {
                overflow: 'justify'
            }
        },
        yAxis: {
            type: 'logarithmic',

            title: {
                text: 'Transaction Count'
            }
        },

        series: [{
            name: 'Number of Transactions Daily',
            data: [0.1, 2, 45, 1001, 200, 0.33, 10000]
        }]

    });
});

// PING COUNT
document.addEventListener('DOMContentLoaded', function () {
    const chart1 = Highcharts.chart('pingCountBar', {
        chart: {
            type: 'column',
            scrollablePlotArea: {
                minWidth: 400,
                scrollPositionX: 1
            }
        },

        title: {
            text: 'Ping Count'
        },

        xAxis: {
            categories: ['Mon', 'Tue','Wed','Thu','Fri','Sat','Sun'],
            labels: {
                overflow: 'justify'
            }
        },
        yAxis: {
            type: 'linear',

            title: {
                text: 'Count'
            }
        },

        series: [{
            name: 'Number of Pings Received Daily',
            data: [0,10,20,30,40,50,60]
        }]

    });
});