<div class ="container" style="padding:30px 0;">
    <div class = "row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <style>
                                            #btnSearch,
                    #btnClear{
                        display: inline-block;
                        vertical-align: top;
                    }
                    </style>
                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

                    <div class = "row">
                        <div class="col-md-6">
                           <h4> Reportes del sistema</h4>                           
                        </div>
                            <div class="col-md-12">
                                
                                <a href="/chart" class="btn btn-success pull-left"  style="margin-left: 10px;">Reporte de Usuarios Linea </a>
                                <a href="/bar-chart" class="btn btn-success pull-left" style="margin-left: 10px;">Reporte de Usuarios Barras </a>
                                <a href="/order-chart" class="btn btn-success pull-left" style="margin-left: 10px;">Reporte de ingresos por ventas </a>
                                {{-- <a href="/productos-vendidos" class="btn btn-success " style="margin-left: 10px;">Reporte de ventas por producto </a> --}}
                                <a href="/product-chart" id="btnSearch" class="btn btn-success pull-left" style="margin-left: 10px; /* margin-top: 10px; */">Reporte de ventas de los productos mas vendidos </a>
                                <a href="/fechas-chart" id="btnSearch" class="btn btn-success pull-left" style="margin-left: 10px; margin-top: 10px;">Reporte de ventas por rango de fechas </a>
                                {{-- <a href="/orderbar-chart" id="btnSearch" class="btn btn-success pull-left" style="margin-left: 10px; margin-top: 10px;">Reporte de ventas en grafico de barras </a> --}}
                                {{-- <a href="/productbar-chart" id="btnSearch" class="btn btn-success pull-left" style="margin-left: 10px; margin-top: 10px;">Reporte de productos mas vendidos</a> --}}
                                <a href="/productpie-chart" class="btn btn-success pull-left"  style=" margin-top: 10px; margin-left: 10px;">Reporte de productos mas vendidos </a>

                                {{-- <a href="/productqty-chart" id="btnSearch" class="btn btn-success pull-left" style="margin-left: 10px; margin-top: 10px;">Reporte de cantidad por productos</a> --}}

                                {{-- <a href="/download-pdf" class="btn btn-primary mb-3 pull-right" style="margin-left:10px;">Exportar PDF</a>
                                <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Agregar categoria </a> --}}
                            </div>
                        </div>
                        </div>
                        
                       
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
                    