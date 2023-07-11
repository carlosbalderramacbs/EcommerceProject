<div>
    <style>
        nav svg{
        height: 10px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class ="container" style="padding:30px 0;">
        <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4> PROVEEDORES</h4>
                            </div>
                                <div class="col-md-6">
                                    <a href="/downloadprovider-pdf" class="btn btn-info mb-3 pull-right" style="margin-left:10px;">Exportar PDF</a>
                                    <a href="{{route('admin.addprovider')}}" class="btn btn-primary pull-right">Agregar Proveedor </a>
                                </div>
                            </div>
                    </div>
                            <div class="panel-body">
                                
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif 
                                <div class="col-md-4 pull-right">
                                    <input type="text" class="form-control  " style="margin-left:10px;" placeholder="Buscar..." wire:model="searchTerm" />
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>                                
                                    <tbody>
                                        @foreach ($depositos as $deposito)
                                        <tr>
                                            <td>{{$deposito->id}}</td>
                                            <td>{{$deposito->nombre}}</td>                                            
                                            <td>{{$deposito->email}}</td>
                                            <td>{{$deposito->telf}}</td>
                                            <td>
                                                <a href="{{route('admin.editprovider',['provider_id'=>$deposito->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                                <a href="#" onclick="confirm('Estas seguro que deseas eliminar este proveedor?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProvider({{$deposito->id}})"style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>                                        
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$depositos->links()}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





