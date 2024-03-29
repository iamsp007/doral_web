$(function () {
    // Chart for Services Base Request Start
    var ctx = document.getElementsByClassName('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'VBP',
                    backgroundColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [15, 5, 50, 45, 80, 20, 35, 66, 11, 23, 77, 33]
                },
                {
                    label: 'MD ORDER',
                    backgroundColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [5, 15, 1, 22.5, 65, 35, 66.8, 44.2, 0.5, 88, 12, 18]
                },
                {
                    label: 'Employee Pre-Physical',
                    backgroundColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [8, 9, 12, 25, 15, 35, 66, 44, 0.5, 22, 2, 18]
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                position: "bottom",
                display: true,
                labels: {
                    fontColor: '#00756B',
                    fontSize: 12
                }
            }
        }
    });
    // Chart for Services Base Request End
    // Chart for Total No Of Accepted Patients Files Start
    var _char1 = document.getElementsByClassName('accepted');
    var ch1 = new Chart(_char1, {
        type: 'line',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'VBP',
                    backgroundColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [15, 5, 50, 45, 80, 20, 35, 66, 11, 23, 77, 33],
                    fill: false
                },
                {
                    label: 'MD ORDER',
                    backgroundColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [5, 15, 1, 22.5, 65, 35, 66.8, 44.2, 0.5, 88, 12, 18],
                    fill: false
                },
                {
                    label: 'Employee Pre-Physical',
                    backgroundColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [8, 9, 12, 25, 15, 35, 66, 44, 0.5, 22, 2, 18],
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                position: "bottom",
                display: true,
                labels: {
                    fontColor: '#00756B',
                    fontSize: 12
                }
            },
        }
    });
    // Chart for Total No Of Accepted Patients Files End
    // Chart for Total No Of Accepted Patients Files Start
    var _char2 = document.getElementsByClassName('pending');
    var ch2 = new Chart(_char2, {
        type: 'line',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'VBP',
                    backgroundColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [15, 5, 50, 45, 80, 20, 35, 66, 11, 23, 77, 33],
                    fill: false
                },
                {
                    label: 'MD ORDER',
                    backgroundColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [5, 15, 1, 22.5, 65, 35, 66.8, 44.2, 0.5, 88, 12, 18],
                    fill: false
                },
                {
                    label: 'Employee Pre-Physical',
                    backgroundColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [8, 9, 12, 25, 15, 35, 66, 44, 0.5, 22, 2, 18],
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    beginAtZero: true,
                    gridLines: {
                        drawBorder: false,
                        color: ['#FF6557', '#0363FF', '#00756B', '#FF6557', '#0363FF', '#00756B', '#FF6557', '#0363FF', '#00756B', '#FF6557', '#0363FF', '#00756B']
                    },
                    ticks: {
                        min: 0,
                        max: 100,
                        stepSize: 10
                    }
                }]
            },
            legend: {
                position: "bottom",
                display: true,
                labels: {
                    fontColor: '#00756B',
                    fontSize: 12
                }
            },
        }
    });
    // Chart for Total No Of Accepted Patients Files End
    // Chart for Total No Of Accepted Patients Files Start
    var _char3 = document.getElementById('cancel');
    var ch3 = new Chart(_char3, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'VBP',
                    backgroundColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [15, 5, 50, 45, 80, 20, 35, 66, 11, 23, 77, 33]
                },
                {
                    label: 'MD ORDER',
                    backgroundColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [5, 15, 1, 22.5, 65, 35, 66.8, 44.2, 0.5, 88, 12, 18]
                },
                {
                    label: 'Employee Pre-Physical',
                    backgroundColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [8, 9, 12, 25, 15, 35, 66, 44, 0.5, 22, 2, 18]
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                position: "bottom",
                display: true,
                labels: {
                    fontColor: '#00756B',
                    fontSize: 12
                }
            }
        }
    });
    // Chart for Total No Of Accepted Patients Files End
    // Chart for Total No Of Accepted Patients Files Start
    var _char4 = document.getElementsByClassName('scheduled');
    var ch4 = new Chart(_char4, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'VBP',
                    backgroundColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [15, 5, 50, 45, 80, 20, 35, 66, 11, 23, 77, 33]
                },
                {
                    label: 'MD ORDER',
                    backgroundColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [5, 15, 1, 22.5, 65, 35, 66.8, 44.2, 0.5, 88, 12, 18]
                },
                {
                    label: 'Employee Pre-Physical',
                    backgroundColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [8, 9, 12, 25, 15, 35, 66, 44, 0.5, 22, 2, 18]
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                position: "bottom",
                display: true,
                labels: {
                    fontColor: '#00756B',
                    fontSize: 12
                }
            }
        }
    });
    // Chart for Total No Of Accepted Patients Files End
    // Chart for Total No Of Accepted Patients Files Start
    var _char5 = document.getElementsByClassName('oncall');
    var ch5 = new Chart(_char5, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'VBP',
                    backgroundColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderColor: [
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557',
                        '#FF6557'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [15, 5, 50, 45, 80, 20, 35, 66, 11, 23, 77, 33]
                },
                {
                    label: 'MD ORDER',
                    backgroundColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderColor: [
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF',
                        '#0363FF'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [5, 15, 1, 22.5, 65, 35, 66.8, 44.2, 0.5, 88, 12, 18]
                },
                {
                    label: 'Employee Pre-Physical',
                    backgroundColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderColor: [
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B',
                        '#00756B'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.8,
                    minBarLength: 2,
                    data: [8, 9, 12, 25, 15, 35, 66, 44, 0.5, 22, 2, 18]
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                position: "bottom",
                display: true,
                labels: {
                    fontColor: '#00756B',
                    fontSize: 12
                }
            }
        }
    });
    // Chart for Total No Of Accepted Patients Files End
    var start = moment().subtract(29, 'days');
    var end = moment();
    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    cb(start, end);
});