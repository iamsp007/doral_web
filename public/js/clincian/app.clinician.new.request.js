$(function () {
    var ctx = document.getElementById('myChart');
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