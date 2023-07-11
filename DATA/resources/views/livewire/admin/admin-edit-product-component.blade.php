<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                               <h4>EDITAR PRODUCTO</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-primary pull-right">Lista de Productos</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif 
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre Producto</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nombre Producto" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="slug Producto" readonly class="form-control input-md" wire:model="slug"/>
                                    @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Breve Descripcion</label>
                                <div class="col-md-4">
                                    <textarea placeholder="Breve Descripcion" class="form-control" wire:model="descripcion_breve"></textarea>
                                    @error('descripcion_breve') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripcion</label>
                                <div class="col-md-4">
                                    <textarea placeholder="Descripcion" class="form-control" wire:model="descripcion"></textarea>
                                    @error('descripcion') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Precio</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Precio del Producto" class="form-control input-md"wire:model="precio_regular"/>
                                    @error('precio_regular') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Precio en oferta</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Precio del Producto en oferta" class="form-control input-md"wire:model="precio_oferta"/>
                                    @error('precio_oferta') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU del Producto" class="form-control input-md"wire:model="SKU"/>
                                    @error('SKU') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Estado</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="estado_producto" >
                                        <option value="disponible">Disponible</option>
                                        <option value="agotado">Agotado</option>
                                    </select>
                                </div>
                                @error('estado_producto') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Cantidad</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Cantidad" class="form-control input-md"wire:model="cantidad"/>
                                    @error('cantidad') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Medida</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="medida">
                                        <option value="">Seleccionar medida</option>                                        
                                            <option>Bolsa (s)</option>
                                            <option>Metro (s)</option>
                                            <option>Pieza (s)</option> 
                                            <option>Galon (es)</option> 
                                            <option>Libra (s)</option>
                                            <option>Unidad (es)</option>                                                                                                   
                                    </select>
                                    @error('medida') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Imagen del Producto</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file"wire:model="newimage"/>
                                    @if($newimage) 
                                        <img scr="{{$newimage->temporaryUrl()}}" width="120" />
                                    @else 
                                    <img src="{{asset('assets/images/products')}}/{{$image}}" width="120"/>                                    
                                    @endif
                                    @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Categoria</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="categoria">
                                        <option value="">Seleccionar Categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach   

                                    </select>
                                    @error('categoria') <span class="text-danger">{{$message}}</span> @enderror                                            
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a href="{{route('admin.products')}}" class="btn btn-danger">Cancelar</a> 
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>                
</div>

















