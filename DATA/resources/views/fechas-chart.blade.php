<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>


<div id="container" style="height: 400px"></div>




{{-- <script type="text/javascript">
var user = <?php echo json_encode($dateconv) ?>
var user = <?php echo json_encode($datetest) ?>

Highcharts.getJSON('https://demo-live-data.highcharts.com/aapl-c.json', function (data) {


Highcharts.stockChart('container', {


    rangeSelector: {
        selected: 1
    },

    title: {
        text: 'Ventas por mes con range filter'
    },

    navigator: {
        enabled: false
    },

    series: [{
        name: 'Ventas realizadas',
        data: user,
        tooltip: {
            valueDecimals: 2
        }
    }]
});
});
</script> --}}


<script type="text/javascript">
/* var user = <?php echo json_encode($dateconv) ?>; */
var user = <?php echo json_encode($funciona) ?>;
/* var user = <?php echo json_encode($datetest) ?>;
 */Highcharts.getJSON('https://demo-live-data.highcharts.com/aapl-v.json', function (data) {

// create the chart
Highcharts.stockChart('container', {
    chart: {
        alignTicks: false
    },

    rangeSelector: {
        selected: 1
    },

    title: {
        text: 'REPORTE DE VENTAS POR RANGO DE FECHAS'
    },
    navigator: {
        enabled: false
    },

    series: [{
        type: 'column',
        name: 'Ingreso de ventas',
        data: user,
        dataGrouping: {
            units: [[
                'week', // unit name
                [1] // allowed multiples
            ], [
                'month',
                [1, 2, 3, 4, 6]
            ]]
        }
    }]
});
});
</script>





{{-- <script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>


<div id="container" style="height: 400px"></div>


<script>
var chart = new Highcharts.Chart({
      chart: {
         renderTo: 'container'
      },
      series: [{
         data: [[1,1],2,3,4,5,6,7,]
      }]
});
</script> --}}