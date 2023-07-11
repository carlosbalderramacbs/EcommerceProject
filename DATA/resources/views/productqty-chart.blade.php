<!doctype html>
<html lang="en">
  <head>
    <title>Reporte de cantidad por producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
 {{-- <div class="container">
 <div id="bar-chart" style="width: 900px; height: 500px"></div> 
 </div> --}}
 <div style="text-align:center" class="container p-5" >
  <h5 >REPORTE DE VENTAS POR PRODUCTO</h5>
  <div id="bar-chart" style="width: 900px; height: 500px"></div> 

  {{-- <div id="piechart" style="width: 900px; height: 500px;"></div> --}}
</div>



 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load('current', {'packages':['bar']});
   google.charts.setOnLoadCallback(drawChart);
 
   function drawChart() {
 var data = google.visualization.arrayToDataTable([
 ['Productos','Cantidad'],
 
 @php
   foreach($products as $product) {
   echo "['".$product->name."', ".$product->quantity."],";
   }
 @endphp
 ]);
 
 var options = {
   chart: {
   /*    title: 'REPORTE DE CANTIDAD POR PRODUCTOS', */
      subtitle: 'Fuente: Julios.store',      
   },
   /* hAxis: {
        direction:-1,
        slantedText:true,
        slantedTextAngle:90 // here you can even use 180
    } */
 }
 



 
 ;
 var chart = new google.charts.Bar(document.getElementById('bar-chart'));
 chart.draw(data, google.charts.Bar.convertOptions(options));
   }
 </script>
 </body>
</html>