<div>
    <div class ="container" style="padding:30px 0;">
        <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                            <H4>AGREGAR NUEVO PROVEEDOR </H4>
                            </div>                        
                            <div class="col-md-6">
                                <a href="{{route('admin.providers')}}" class="btn btn-primary pull-right">Lista de Proveedores</a> 
                            </div>
                        </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif 
                        <form class="form-horizontal"  method="POST"  wire:submit.prevent="storeProvider">
                            <div class="form-group" >                            
                                <label class="col-md-4 control-label">Nombre Proveedor</label>
                                <div class="col-md-4">
                                    <input type="text" id="name" name="name" placeholder="nombre proveedor" class="form-control input-md" wire:model="nombre"  {{-- wire:keyup="generateslug" --}}/>
                                    @error('nombre') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>                           
 
                            <div class="form-group" >                            
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="text" id="name" name="name" placeholder="email" class="form-control input-md" wire:model="email"/>
                                    @error('email') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group" >                            
                                <label class="col-md-4 control-label">Teléfono</label>
                                <div class="col-md-4">
                                    <input type="text" id="name" name="name" placeholder="teléfono 8 digitos" class="form-control input-md" wire:model="telefono"/>
                                    @error('telefono') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">                            
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success"> Guardar </button>
                                    <a href="{{route('admin.providers')}}" class="btn btn-danger">Cancelar</a> 
                                </div>
                                <div class="col-md-4">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>