<?php $this->getPart('inc/widgets/lk') ?>

<div id='script-warning'>
    <!--    <code>php/get-events.php</code> must be running.-->
</div>


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Календарь</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">График личностного роста</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="card">
            <div class="card-body p-0 position-relative">
                <div id='calendar-wrap'>
                    <div id='loading'>loading...</div>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><img class="img-fluid" src="/img/graph.svg" alt=""></div>
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
        <h4 class="mb-3">Образовательные организации:</h4>
        <img class="mr-2" src="/img/b1.png" alt="">
        <img class="mr-2" src="/img/b2.png" alt="">
        <img class="mr-2" src="/img/b3.png" alt="">
    </div>
</div>
<div class="card mb-5">
    <div class="card-body">
        <h4 class="mb-3">Наставники:</h4>
        <img class="mr-2" src="/img/c1.png" alt="">
        <img class="mr-2" src="/img/c2.png" alt="">
    </div>
</div>

<?php // $this->getPart('inc/widgets/tabs') 
?>


<link href='/js/fullcalendar/lib/main.min.css' rel='stylesheet' />
<script src='/js/fullcalendar/lib/main.min.js'></script>
<script src='/js/fullcalendar/lib/locales/ru.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // var containerEl = document.getElementById('external-events-list');
        // new FullCalendar.Draggable(containerEl, {
        //     itemSelector: '.fc-event',
        //     eventData: function(eventEl) {
        //         return {
        //             title: eventEl.innerText.trim()
        //         }
        //     }
        // });

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'ru',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            // initialDate: '2020-06-12',
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function(arg) {
                // is the "remove after drop" checkbox checked?
                if (document.getElementById('drop-remove').checked) {
                    // if so, remove the element from the "Draggable Events" list
                    arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                }
            },
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.addEvent({
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    })
                }
                calendar.unselect()
            },
            eventClick: function(arg) {
                if (confirm('Are you sure you want to delete this event?')) {
                    arg.event.remove()
                }
            },
            dayMaxEvents: true, // allow "more" link when too many events
            events: {
                url: '/js/fullcalendar/examples/php/get-events.php',
                failure: function() {
                    document.getElementById('script-warning').style.display = 'block'
                }
            },
            loading: function(bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
            }
        });

        calendar.render();
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