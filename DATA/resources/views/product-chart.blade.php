<!DOCTYPE html>
 <html>
 <head>
     <title>Reporte de ventas</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
 </head>   
 <body>
     <div class="container mt-5">
         
         <div id="bar-chart"></div>
     </div>
 </body>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script type="text/javascript">

var users =  <?php echo json_encode($integerIDs) ?>;
     var users2 =  <?php echo json_encode($integerIDs) ?>;
    var users3 =  <?php echo json_encode($integerIDs) ?>;
    var users4 =  <?php echo json_encode($integerIDs) ?>;
    var users5 =  <?php echo json_encode($integerIDs) ?>;
    
     Highcharts.chart('bar-chart', {
         chart: {
             backgroundColor: 'white',
             color: 'red',
             type: 'column'
           },
         title: {
             text: 'REPORTE DE VENTAS DE LOS PRODUCTOS MAS VENDIDOS'
         },
         subtitle: {
             text: 'Fuente: julios.store'
         },
         xAxis: {
             categories: /* ['Enero', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'] */['martillo','tuvo PVC','sellador de paredes','cemento','martillo','Taladro','cemento parrillero','Sellador de paredes blanco 3.5L','Cemento Cola Porcelanato Redimix 25KG','Cemento Cola Parrillero Superfrak 10kg','Sellador de paredes blanco 20L','Lavaplatos simple con secador']
         },
         yAxis: {
             title: {
                 text: 'Ingresos de Ventas'
             }
         },
         legend: {
             layout: 'vertical',
             align: 'right',
             verticalAlign: 'middle'
         },
         
         plotOptions: {
             series: {
                 allowPointSelect: true
             }
         },
         series: [{
            name: ' 2021',
            data: users,
            },
            {
                name: ' 2022',
                data: users2,
            },
            {
                name: ' 2023',
                data: users3,
            },
            {
                name: ' 2024',
                data: users4,
            },
            {
                name: ' 2025',
                data: users5,
            
        }],
                 responsive: {
             rules: [{
                 condition: {
                     maxWidth: 500
                 },
                 chartOptions: {
                     legend: {
                         layout: 'horizontal',
                         align: 'center',
                         verticalAlign: 'bottom'
                     }
                 }
             }]
         }
 });   
 </script>
 </html>

 