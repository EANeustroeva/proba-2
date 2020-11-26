<?php $this->getPart('inc/widgets/lk',['img'=>'/img/ivan.png','buttons'=>true]) ?>

<div id='script-warning'>
    <!--    <code>php/get-events.php</code> must be running.-->
</div>


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Работа мечты</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">График личностного роста</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5"><img class="img-fluid" src="/img/r1.png" alt=""></div>
                    <div class="col-5">
                        <canvas id="canvas"></canvas>
                        <div class="progress mt-3" style="height: 40px;border-radius: 20px;">
                            <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade p-5" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><img class="img-fluid" src="/img/graph.svg" alt=""></div>
</div>

<div class="card mb-5">
    <div class="card-body">
        <h4 class="mb-3">Курсы:</h4>
        <img class="mr-2" src="/img/a1.png" alt="">
        <img class="mr-2" src="/img/a2.png" alt="">
        <img class="mr-2" src="/img/a3.png" alt="">
        <img class="mr-2" src="/img/a4.png" alt="">
    </div>
</div>
<div class="card mb-5">
    <div class="card-body">
        <h4 class="mb-3">Пройденные курсы:</h4>
        <img class="mr-2" src="/img/a1.png" style="opacity:.6" alt="">
        <img class="mr-2" src="/img/a2.png" style="opacity:.6" alt="">
    </div>
</div>

<?php $this->getPart('inc/widgets/lk',['img'=>'/img/ivan2.png','id'=>'2']) ?>

<?php $this->getPart('inc/widgets/lk',['img'=>'/img/ivan3.png','id'=>'3']) ?>

<link rel="stylesheet" href="/adminlte3/plugins/chart.js/Chart.min.css">
<script src="/adminlte3/plugins/chart.js/Chart.min.js"></script>
<script>
    var data = {
        labels: ["x1", "x2", "x3", "x4", "x5"],
        datasets: [{
                label: "Actual",
                backgroundColor: 'rgba(0, 0, 255, 0.5)',
                borderWidth: 1,
                data: [40, 150, 50, 60, 70],
                xAxisID: "bar-x-axis1",
                stack: "background"
            },
            {
                label: "Target",
                backgroundColor: 'rgba(0, 0, 0, 0.2)',
                borderWidth: 1,
                data: [100, 100, 100, 100, 100],
                xAxisID: "bar-x-axis2"
            }
        ]
    };

    var options = {
        scales: {
            xAxes: [{
                    id: "bar-x-axis2",
                    stacked: true,
                    categoryPercentage: 0.5,
                    barPercentage: 0.5
                },
                {
                    display: true,
                    stacked: true,
                    id: "bar-x-axis1",
                    type: 'category',
                    categoryPercentage: 0.4,
                    barPercentage: 1,
                    gridLines: {
                        offsetGridLines: true
                    }
                }
            ],

            yAxes: [{
                id: "bar-y-axis1",
                stacked: false,
                ticks: {
                    beginAtZero: true
                }
            }]

        }
    };

    var ctx = document.getElementById("canvas").getContext("2d");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>
<style>
    #script-warning {
        display: none;
        background: #eee;
        border-bottom: 1px solid #ddd;
        padding: 0 10px;
        line-height: 40px;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: red;
    }

    #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    #calendar1 {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 10px;
    }

    #external-events {
        position: absolute;
        left: 20px;
        top: 20px;
        width: 150px;
        padding: 0 10px;
        border: 1px solid #ccc;
        background: #eee;
        text-align: left;
    }

    #external-events h4 {
        font-size: 16px;
        margin-top: 0;
        padding-top: 1em;
    }

    #external-events .fc-event {
        margin: 3px 0;
        cursor: move;
    }

    #external-events p {
        margin: 1.5em 0;
        font-size: 11px;
        color: #666;
    }

    #external-events p input {
        margin: 0;
        vertical-align: middle;
    }

    /* #calendar-wrap { 
        margin-left: 200px;
    } */
</style>