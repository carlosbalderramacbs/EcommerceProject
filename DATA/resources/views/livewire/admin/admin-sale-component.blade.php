<div>
    <div class="container" style="padding: 30px 0;">
           
        <div class="panel panel-default">


            <div class="panel-heading">
                <h4>ESTABLECER FECHA DE DESCUENTO </h4>
            </div>

            <link rel="stylesheet" type="text/css" href="datetimepicker/jquery.datetimepicker.css"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
            <script>
                $(document).ready(function (){
                    /* jQuery('#fecha_oferta').datetimepicker(); */

                    jQuery('#fecha_oferta').datetimepicker({
                        format:'d.m.Y H:i',
                        inline:true,
                        lang:'ru'
                    });
                });
                
            </script>
            <div class="panel-body"> 
 



                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form class="form-horizontal"  method="POST"  wire:submit.prevent="updateSale">

                {{-- <div class="form-horizontal" method="POST" wire:submit.prevent="updateSale"> --}}
                    <div class="form-group">
                        <label class="col-md-4 control label">Estado</label>
                        <div class="col-md-4">
                            <select class="form-control" wire:model="status">
                                <option value="0">Desactivar</option>
                                <option value="1">Activar</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control label">Fecha descuento</label>
                        <div class="col-md-4">
                            {{-- <div class='input-group date' id='datetimepicker'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                </div> --}}
                            <input type="text" id="fecha_oferta" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md" wire:model="fecha_oferta"/>
                            @error('fecha_oferta') <p class="text-danger">{{$message}}</p>@enderror

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control label">Estado</label>
                       {{--  @error('nombre') <p class="text-danger">{{$message}}</p>@enderror --}}
                        <div class="col-md-4">
                            
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(function() {
           $('#datetimepicker').datetimepicker();
        });
    </script>
@push('scripts')
    <script>
        $(function() {
            $('#fecha_oferta').datetimepicker({
                format: 'Y-MM-DD h:m:s',
                

            })

            .on('dp.change',function (ev) { 
                var data =$('#fecha_oferta').val();
                @this.set('fecha_oferta',data)
            });
            
        });
    </script>
    <script>
        $(document).ready(function (){
            /* jQuery('#fecha_oferta').datetimepicker(); */

            jQuery('#fecha_oferta').datetimepicker({
                format:'d.m.Y H:i',
                inline:true,
                lang:'ru'
            });
        });
        
    </script>
@endpush
