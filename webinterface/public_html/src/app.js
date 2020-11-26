// import './scss/base.scss'
// import "../scss/main.scss";

// import 'bootstrap-material-design/dist/css/bootstrap-material-design.min.css';

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    window.tagcanvas = require('jquery-tagcanvas');

    // require('bootstrap');
    require('bootstrap-material-design');

} catch (e) { }



import * as d3 from 'd3';
import Sunburst from 'sunburst-chart';

const CHILDREN_PROB_DECAY = 0.15; // per level
const MAX_CHILDREN = 20;
const MAX_VALUE = 100;

function genNode(name = 'root', probOfChildren = 1) {
    if (Math.random() < probOfChildren) {
        return {
            name,
            children: [...Array(Math.round(Math.random() * MAX_CHILDREN))]
                .map((_, i) => genNode(i, probOfChildren - CHILDREN_PROB_DECAY))
        }
    } else {
        return {
            name,
            value: Math.round(Math.random() * MAX_VALUE)
        }
    }
}

const color = d3.scaleOrdinal(d3.schemePaired);
//json_sunburstchart
fetch('json_sunburstchart.json').then(res => res.json()).then(data => {

    Sunburst()
        .data(data)
        .label('name')
        .size('size')
        .color((d, parent) => color(parent ? parent.data.name : null))
        .tooltipContent((d, node) => `Size: <i>${node.value}</i>`)
        (document.getElementById('chart'));

});


$(document).ready(function() {
    if (!$('#myCanvas').tagcanvas({
        textColour: '#fff',
        outlineThickness: 0,
        maxSpeed: 0.1,
        depth: 0.75,
        bgColour: 'tag',
        padding: 10
    })) {
        // TagCanvas failed to load
        $('#myCanvasContainer').hide();
    }

    if (!$('#myCanvas2').tagcanvas({
        textColour: '#fff',
        outlineThickness: 0,
        maxSpeed: 0.1,
        depth: 0.75,
        bgColour: 'tag',
        padding: 10
    })) {
        // TagCanvas failed to load
        $('#myCanvasContainer2').hide();
    }

    if (!$('#myCanvas3').tagcanvas({
        textColour: '#fff',
        outlineThickness: 0,
        maxSpeed: 0.1,
        depth: 0.75,
        bgColour: 'tag',
        padding: 10
    })) {
        // TagCanvas failed to load
        $('#myCanvasContainer3').hide();
    }
})

window.get_info = function(id) {
    console.log(id);
    $.ajax({
        url: '/main/getinfo?id='+id
    }).then(res => {
        console.log(res)
    })
}