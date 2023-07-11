
<div>
    <style>
        nav svg{
        height: 20px;
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
                        <div class = "row">
                            <div class="col-md-6">
                               <h4>Detalle de Ventas</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="/download-pdf" class="btn btn-primary mb-3 pull-right" style="margin-left:10px;">Exportar PDF</a>
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Agregar Producto </a>
                                
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif 
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Detalle</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>                                
                                {{-- <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" wire:click.prevent="deleteCategory({{$category->id}})"style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                            {{-- {{$categories->links()}} --}}
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>



