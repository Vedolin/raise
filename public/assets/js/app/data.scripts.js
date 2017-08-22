window.chartColors = {
    one: '#fca130',
    two: '#41444e',
    three: '#49cc90',
    four: '#61affe',
    five: '#f93e3e',
    six: '#7d8492',
    seven: '#3b4151',
    eight: '#8385d0',
    nine: '#6f71bc'
};

function createChart(context, data) {
    var color = Chart.helpers.color, colorNames = Object.keys(window.chartColors);

    var dataSet = jQuery.each(data, function (index, value) {
        var random = Math.floor(Math.random() * 9) + 1,
            newColor = window.chartColors[colorNames[random % colorNames.length - 1]];

        value.borderColor = newColor;
        value.backgroundColor = color(newColor).alpha(0.5).rgbString();
        value.pointStyle = 'rectRot';
        value.pointRadius = 5;
        value.pointBorderColor = 'rgb(0, 0, 0)';

        jQuery.each(value.data, function (item, element) {
            element.x = moment(element.x).format('ddd, DD MMM YYYY HH:mm:ss O');
        });
    });

    var config = {
        type: 'line',
        data: {datasets: dataSet},
        options: {
            zoom: {
                enabled: true,
                drag: true,
                mode: 'xy'
            },
            responsive: true,
            title: {
                display: true,
                text: "RAISe Data Graph"
            },
            legend: {
                labels: {
                    usePointStyle: false
                }
            },
            scales: {
                xAxes: [{
                    type: "time",
                    time: {
                        tooltipFormat: 'll HH:mm'
                    },
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Date'
                    },
                    ticks: {
                        maxRotation: 0
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Amount of Data'
                    },
                    ticks: {
                        beginAtZero: true,
                        callback: function (value) {
                            if (value % 1 === 0) {
                                return value;
                            }
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }]
            }
        }
    };

    window.myLine = new Chart(context, config);
}
