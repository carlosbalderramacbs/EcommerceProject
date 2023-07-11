<!DOCTYPE html>
 <html>
 <head>
     <title>Reporte grafica de linea</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
 </head>   
 <body>
     <div class="container mt-5">

         <div id="bar-chart"></div>
     </div>
 </body>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script type="text/javascript">
     var datas =  <?php echo json_encode($integerIDs) ?>;
     var datas2 =  <?php echo json_encode($integerID2s) ?>;
     var datas3 =  <?php echo json_encode($integerID3s) ?>;
     var datas4 =  <?php echo json_encode($integerID4s) ?>;
     var datas5 =  <?php echo json_encode($integerID5s) ?>;
    
     Highcharts.chart('bar-chart', {
         chart: {
             backgroundColor: 'white',
             color: 'red',
             type: 'line'
           },
         title: {
             text: 'REPORTE DE INGRESOS DE VENTAS'
         },
         subtitle: {
             text: 'Fuente: julios.store'
         },
         xAxis: {
             categories: ['Enero', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
         },
         yAxis: {
             title: {
                 text: 'Ingresos por ventas'
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
            name: 'Ingresos 2021',
            data: datas,
            },
            {
                name: 'Ingresos 2022',
                data: datas2,
            },
            {
                name: 'Ingresos 2023',
                data: datas3,
            },
            {
                name: 'Ingresos 2024',
                data: datas4,
            },
            {
                name: 'Ingresos 2025',
                data: datas5,
            
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