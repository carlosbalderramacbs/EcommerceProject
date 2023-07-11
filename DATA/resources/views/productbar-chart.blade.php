{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Laravel 8 Google Bar Chart Example From Scratch - XpertPhp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
 <div class="container">
 <div id="bar-chart" style="width: 900px; height: 500px"></div> 
 </div>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load('current', {'packages':['bar']});
   google.charts.setOnLoadCallback(drawChart);
 
   function drawChart() {
 var data = google.visualization.arrayToDataTable([
 ['Producto','Cantidad'],
 
 @php
   foreach($products as $product) {
   echo "['".$product->name."'/* , ".$product->sales." */, ".$product->quantity."],";
   }
 @endphp
 ]);
 
 var options = {
   chart: {
 title: 'Reporte de cantidad de productos en grafica de barras',
 subtitle: 'Sales, and Quantity: @php echo $products[0]->created_at @endphp',
   },
   bars: 'vertical'
 };
 /* var chart = new google.charts.Bar(document.getElementById('bar-chart'));
 chart.draw(data, google.charts.Bar.convertOptions(options));


 var chart = new google.charts.Bar(document.getElementById('bar-chart'));
 chart.draw(data, google.charts.Bar.convertOptions(options)); */
 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
   }
 </script>
 </body>
</html> --}}


<!doctype html>
<html lang="en">
  <head>
    <title>Google Pie Chart | LaravelCode</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container p-5">
        <h5>REPORTE DE VENTAS POR PRODUCTO</h5>

        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
    
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Nombre Producto','Ventas'],

               /*  @php
                foreach($products as $product) {
                    echo "['".$product->name."',".$product->quantity."],";
                }
                @endphp */

                @php
                foreach($orderitems as $item) {
                    echo "['".$item->product->name."',".$item->quantity."],";
                    
                }

                @endphp
        ]);

          var options = {
            title: 'Ventas por producto',
            is3D: false,
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
      </script>
</body>
</html>