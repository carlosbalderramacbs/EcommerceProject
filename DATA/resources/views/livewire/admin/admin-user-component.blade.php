
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
                                <h4>USUARIOS </h4>
                            </div>
                                <div class="col-md-6">
                                    <a href="/download-pdf" class="btn btn-info mb-3 pull-right" style="margin-left:10px;">Exportar PDF</a>
                                    <a href="{{route('admin.adduser')}}" class="btn btn-primary pull-right">Agregar Usuario </a>
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
                                            <th scope="col">Rol</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>                                
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>                                            
                                            <td>{{$user->utype}}</td>
                                            <td>{{$user->status}}</td>
                                            {{-- <td>{{$user->}}</td> --}}
                                            <td>
                                                <a href="{{route('admin.edituser',['user_id'=>$user->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                                {{-- @if($user->utype==='ADM') 
                                                @else --}}
                                                {{-- <a href="#" onclick="confirm('Estas seguro que deseas eliminar este usuario?') || event.stopImmediatePropagation()" wire:click.prevent="deleteUser({{$user->id}})"style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>                                         --}}
                                                {{-- @endif  --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$users->links()}}
                            </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

