<img class="mr-1" src="/img/r1.png" alt="">
<img class="mr-1" src="/img/r2.png" alt="">
<img class="mr-1" src="/img/r3.png" alt="">
<img class="mr-1" src="/img/r4.png" alt="">

<br>
<br>

<img class="mr-1" src="/img/r.png" alt="">

<?php if (false): ?>
<?php $this->getPart('inc/widgets/rolegant') ?>


<img class="img-fluid mb-4" src="/_widgets/Screenshot_3.png" alt="">
<img class="img-fluid mb-4" src="/_widgets/Screenshot_4.png" alt="">


<?php $this->getPart('inc/widgets/task') ?>


<script src="/adminlte3/plugins/chart.js/Chart.min.js"></script>
<script>
    $(function () {
        var areaChartData = {
            labels  : ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'],
            datasets: [
                {
                    label               : '1',
                    backgroundColor     : 'rgba(8,166,82,0.9)',
                    borderColor         : 'rgba(8,166,82,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(8,166,82,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(8,166,82,1)',
                    data                : [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label               : '2',
                    backgroundColor     : 'rgba(84,179,227, 1)',
                    borderColor         : 'rgba(84,179,227, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(84,179,227, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(84,179,227,1)',
                    data                : [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label               : '3',
                    backgroundColor     : 'rgba(255,138,34,0.9)',
                    borderColor         : 'rgba(255,138,34,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(255,138,34,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(255,138,34,1)',
                    data                : [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label               : '4',
                    backgroundColor     : 'rgba(254,190,0, 1)',
                    borderColor         : 'rgba(254,190,0, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(254,190,0, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(254,190,0,1)',
                    data                : [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        var barChartData = jQuery.extend(true, {}, areaChartData)


        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = jQuery.extend(true, {}, barChartData)

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    },
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true,
                    gridLines: {
                        drawBorder: false,
                    }
                }]
            }
        }

        var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })
    })
</script>
<?php endif; ?>