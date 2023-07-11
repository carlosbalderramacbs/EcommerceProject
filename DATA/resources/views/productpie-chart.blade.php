<!DOCTYPE html>
 <html>
 <head>
     <title>Reporte de ventas</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
 </head>   
 <body>
     <div class="container mt-5">
         
         <div id="container"></div>
     </div>
 </body>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script type="text/javascript">

var p1 = 131;
var p2 = 92; 
var p3 = 93; 
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Reporte de productos mas vendidos'
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
        enabled: false
      },
      showInLegend: true
    }
  },
  series: [{
    name: 'Cantidad vendida',
    colorByPoint: true,
    data: [{
      name: 'Cemento',
      y: p1,
      sliced: true,
      selected: true
    }, {
      name: 'Taladro',
      y: p2,
    }, {
      name: 'Martillo',
      y: p3
    }]
  }]
});
 </script>
 </html>








