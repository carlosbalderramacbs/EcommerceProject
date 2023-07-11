<!DOCTYPE html>
<html>
<head>
    <title>Reporte grafica de linea</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
</head>   
<body>
    <div class="container mt-5">
{{--         <h2 class="text-center"><strong>Grafica de linea</strong></h2>
 --}}        <div id="bar-chart"></div>
    </div>
</body>


{{-- <div class="row">
    <div class="col-md-6">
    <form action="" id="filtersForm">
        <div class="input-group">
        <input type="text" name="from-to" class="form-control mr-2" id="date_filter">
        <span class="input-group-btn">
            <input type="submit" class="btn btn-primary" value="Filter">
        </span> 
        </div>
    </form>
    </div>
</div>
<div class="row my-2" id="chart">
    <div class="{{ $chart->options['column_class'] }}">
        <h3>{!! $chart->options['chart_title'] !!}</h3>
        {!! $chart->renderHtml() !!}
    </div>
</div> --}}

{{-- <script>
    let searchParams = new URLSearchParams(window.location.search)
  let dateInterval = searchParams.get('from-to');
  let start = moment().subtract(29, 'days');
  let end = moment();

  if (dateInterval) {
      dateInterval = dateInterval.split(' - ');
      start = dateInterval[0];
      end = dateInterval[1];
  }

  $('#date_filter').daterangepicker({
      "showDropdowns": true,
      "showWeekNumbers": true,
      "alwaysShowCalendars": true,
      startDate: start,
      endDate: end,
      locale: {
          format: 'YYYY-MM-DD',
          firstDay: 1,
      },
      ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
          'This Year': [moment().startOf('year'), moment().endOf('year')],
          'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
          'All time': [moment().subtract(30, 'year').startOf('month'), moment().endOf('month')],
      }
  });
</script> --}}

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var users =  <?php echo json_encode($datas) ?>;
    
    var users2 =  <?php echo json_encode($datas1) ?>;
    var users3 =  <?php echo json_encode($datas2) ?>;
    var users4 =  <?php echo json_encode($datas3) ?>;
    var users5 =  <?php echo json_encode($datas4) ?>;
   
    Highcharts.chart('bar-chart', {
		chart: {
			backgroundColor: 'white',
			color: 'red',
    		type: 'areaspline'
 		 },
        title: {
            text: 'REGISTRO DE NUEVOS USUARIOS'
        },
        subtitle: {
            text: 'Fuente: julios.store'
        },
        xAxis: {
            categories: ['Enero', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
        },
        yAxis: {
            title: {
                text: 'Nuevos usuarios'
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
            name: 'Usuarios 2021',
            data: users,
            },
            {
                name: 'Usuarios 2022',
                data: users2,
            },
            {
                name: 'Usuarios 2023',
                data: users3,
            },
            {
                name: 'Usuarios 2024',
                data: users4,
            },
            {
                name: 'Usuarios 2025',
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