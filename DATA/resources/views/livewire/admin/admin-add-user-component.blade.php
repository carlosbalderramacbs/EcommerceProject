<div>
    <div class ="container" style="padding:30px 0;">
        <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>AGREGAR NUEVO USUARIO</h4>
                            </div>
                        
                            <div class="col-md-6">
                                <a href="{{route('admin.users')}}" class="btn btn-primary pull-right">Lista de Usuarios</a> 
                            </div>
                        </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif 
                        <form class="form-horizontal"  method="POST"  wire:submit.prevent="storeUser">
                            <div class="form-group" >                            
                                <label class="col-md-4 control-label">Nombre:</label>
                                <div class="col-md-4">
                                    <input type="text" id="name" name="name" placeholder="nombre usuario" class="form-control input-md" wire:model="nombre"/>
                                    @error('nombre') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">                            
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="email" class="form-control input-md" wire:model="email"/>
                                    @error('email') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">                            
                                <label class="col-md-4 control-label">Contraseña</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="password" class="form-control input-md" wire:model="password"/>
                                    @error('password') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            {{-- <div class="form-group">                            
                                <label class="col-md-4 control-label">Rol</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="rol" class="form-control input-md" wire:model="utype"/>
                                    @error('utype') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Rol</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="rol">
                                        <option value="">Seleccionar rol</option>                                        
                                            <option>ADM</option>
                                            <option>USR</option>                                                                                                    
                                    </select>
                                    @error('rol') <span class="text-danger">{{$message}}</span> @enderror 
                                </div>
                            </div>

                            <div class="form-group">                            
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success"> Guardar </button>
                                    <a href="{{route('admin.users')}}" class="btn btn-danger">Cancelar</a> 
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